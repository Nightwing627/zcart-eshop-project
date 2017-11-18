<?php namespace App\Http\Controllers\Admin;

use App\EmailTemplate;
use Illuminate\Http\Request;
use App\Common\Authorizable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreateEmailTemplateRequest;
use App\Http\Requests\Validations\UpdateEmailTemplateRequest;

class EmailTemplateController extends Controller
{
    use Authorizable;

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

        return back()->with('success', trans('messages.created', ['model' => $this->model_name]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  EmailTemplate $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(EmailTemplate $emailTemplate)
    {
        return view('admin.email-template._edit', compact('emailTemplate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  EmailTemplate $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmailTemplateRequest $request, EmailTemplate $emailTemplate)
    {
        $emailTemplate->update($request->all());

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * Trash the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  EmailTemplate $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request, EmailTemplate $emailTemplate)
    {
        $emailTemplate->delete();

        return back()->with('success', trans('messages.trashed', ['model' => $this->model_name]));
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
        EmailTemplate::onlyTrashed()->where('id', $id)->restore();

        return back()->with('success', trans('messages.restored', ['model' => $this->model_name]));
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

        return back()->with('success',  trans('messages.deleted', ['model' => $this->model_name]));
    }

}
