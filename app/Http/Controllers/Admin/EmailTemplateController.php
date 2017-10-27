<?php

namespace App\Http\Controllers\Admin;

use App\EmailTemplate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreateEmailTemplateRequest;
use App\Http\Requests\Validations\UpdateEmailTemplateRequest;

class EmailTemplateController extends Controller
{

    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.email_template');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['templates'] = EmailTemplate::all();

        $data['trashes'] = EmailTemplate::onlyTrashed()->get();

        return view('admin.email-template.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.email-template._create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmailTemplateRequest $request)
    {
        $email_template = new EmailTemplate($request->all());

        $email_template->save();

        $request->session()->flash('success', trans('messages.created', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['template'] = EmailTemplate::findOrFail($id);

        return view('admin.email-template._edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmailTemplateRequest $request, $id)
    {
        $template = EmailTemplate::findOrFail($id);

        $template->update($request->all());

        $request->session()->flash('success', trans('messages.updated', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Trash the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request, $id)
    {
        EmailTemplate::find($id)->delete();

        $request->session()->flash('success', trans('messages.trashed', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Restore the specified resource from soft delete.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        EmailTemplate::onlyTrashed()->where('id',$id)->restore();

        $request->session()->flash('success', trans('messages.restored', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        EmailTemplate::onlyTrashed()->find($id)->forceDelete();

        $request->session()->flash('success',  trans('messages.deleted', ['model' => $this->model_name]));

        return back();
    }

}
