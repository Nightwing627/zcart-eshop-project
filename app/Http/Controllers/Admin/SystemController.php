<?php

namespace App\Http\Controllers\Admin;

use DB;
use Hash;
use App\System;
// use App\Http\Requests;
use Illuminate\Http\Request;
use App\Common\Authorizable;
use App\Http\Controllers\Controller;
use App\Jobs\ResetDbAndImportDemoData;
use App\Events\System\SystemIsLive;
use App\Events\System\SystemInfoUpdated;
use App\Events\System\DownForMaintainace;
use App\Http\Requests\Validations\SaveEnvFileRequest;
use App\Http\Requests\Validations\UpdateSystemRequest;
use App\Http\Requests\Validations\ResetDatabaseRequest;
use App\Http\Requests\Validations\UpdateBasicSystemConfigRequest;

class SystemController extends Controller
{
    use Authorizable;

    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        parent::__construct();

        $this->model_name = trans('app.model.config');
    }

   /**
     * Display the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $system = System::orderBy('id', 'asc')->first();

        return view('admin.system.general', compact('system'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBasicSystemConfigRequest $request)
    {
        if( env('APP_DEMO') == true )
            return back()->with('warning', trans('messages.demo_restriction'));

        $system = System::orderBy('id', 'asc')->first();

        $this->authorize('update', $system); // Check permission

        $system->update($request->except('image', 'delete_image'));

        event(new SystemInfoUpdated($system));

        if ($request->hasFile('icon'))
            $request->file('icon')->storeAs('','icon.png');

        if ($request->hasFile('logo'))
            $request->file('logo')->storeAs('','logo.png');

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * Show the .env file editor.
     *
     * @return \Illuminate\Http\Response
     */
    public function modifyEnvFile(UpdateSystemRequest $request)
    {
        $envContents = file_get_contents(base_path('.env'));

        return view('admin.system.modify_env_file', compact('envContents'));
    }

    /**
     * Reset the database and import demo data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveEnvFile(SaveEnvFileRequest $request)
    {
        if( env('APP_DEMO') == true )
            return back()->with('warning', trans('messages.demo_restriction'));

        if(Hash::check($request->password, $request->user()->password)) {
            try {

                file_put_contents(base_path('.env'), $request->env);

            } catch(\Exception $e){

                \Log::error('.env modification failed: ' . $e->getMessage());

                // add your error messages:
                $error = new \Illuminate\Support\MessageBag();
                $error->add('errors', trans('responses.failed'));

                return back()->withErrors($error);
            }

            $system = System::orderBy('id', 'asc')->first();

            event(new SystemInfoUpdated($system));

            return back()->with('success', trans('messages.env_saved'));
        }

        abort(403, 'Unauthorized action.');
    }

    /**
     * Show confirmation page to import demo contents.
     *
     * @return \Illuminate\Http\Response
     */
    public function importDemoContents()
    {
        return view('admin.system.import_demo_contents');
    }

    /**
     * Reset the database and import demo data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resetDatabase(ResetDatabaseRequest $request)
    {
        if( env('APP_DEMO') == true )
            return back()->with('warning', trans('messages.demo_restriction'));

        if(Hash::check($request->password, $request->user()->password)) {
            // Start transaction!
            DB::beginTransaction();

            try {

                ResetDbAndImportDemoData::dispatch();

            } catch(\Exception $e){

                // rollback the transaction and log the error
                DB::rollback();
                \Log::error('Database Reset Failed: ' . $e->getMessage());

                // add your error messages:
                $error = new \Illuminate\Support\MessageBag();
                $error->add('errors', trans('responses.failed'));

                return back()->withErrors($error);
            }

            // Everything is fine. Now commit the transaction
            DB::commit();

            return back()->with('success', trans('messages.imported'));
        }

        abort(403, 'Unauthorized action.');
    }

    /**
     * Toggle Maintenance Mode of the given id, Its uses the ajax middleware
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toggleMaintenanceMode(UpdateSystemRequest $request)
    {
        if( env('APP_DEMO') == true )
            return response('error', 444);

        $system = System::orderBy('id', 'asc')->first();

        $this->authorize('update', $system); // Check permission

        $system->maintenance_mode = !$system->maintenance_mode;

        if($system->save()){
            if($system->maintenance_mode)
                event(new DownForMaintainace($system));
            else
                event(new SystemIsLive($system));

            return response("success", 200);
        }

        return response('error', 405);
    }
}
