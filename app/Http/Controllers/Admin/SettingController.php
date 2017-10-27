<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Setting;
use App\Http\Requests;
// use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\UpdateSettingRequest;

class SettingController extends Controller
{

    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.setting');
    }

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $data['title'] = trans('app.settings');

        // $data['data_title'] = trans('app.settings');

        // $data['settings'] = Setting::all();

        // $data['trashes'] = Setting::onlyTrashed()->get();

        // return view('admin.setting.index', $data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
       // return view('admin.setting._show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data['taxes'] = Tax::mine()->active()->orderBy('name', 'asc')->pluck('name', 'id');

        // $data['setting'] = Setting::findOrFail($id);

        // return view('admin.setting._edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request, $id)
    {
        // $setting = Setting::findOrFail($id);

        // $setting->update($request->except('image', 'delete_image'));

        // if ($request->hasFile('image'))
        //     ImageHelper::UploadImages($request, 'settings', $setting->id);

        // if ($request->input('delete_image') == 1)
        //     ImageHelper::RemoveImages('settings', $setting->id);

    // When the settings have been updated, clear the cache for the key 'settings':
    // $cache->forget('settings');


        // $request->session()->flash('success', trans('messages.updated', ['model' => $this->model_name]));

        // return back();

    }

    /**
     * [ajaxGetFromPHPHelper description]
     *
     * @param  str $funcName name of the PHP helper fucntion
     * @param  mix $args     arguments will need to pass to the helper function
     *
     * @return mix         results from PHP Helper fucntion
     */
    public function ajaxGetFromPHPHelper(Request $request)
    {
        if ($request->ajax()) {
            $funcName = $request->input('funcName');
            $args = $request->input('args');

            if(is_array($args))
            {
                return call_user_func_array($funcName, $args);
            }
            $results = call_user_func($funcName, $args);

            return $results;
        }
        return false;
    }

}
