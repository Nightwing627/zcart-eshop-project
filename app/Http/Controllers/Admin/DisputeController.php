<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Common\Authorizable;
use App\Http\Controllers\Controller;
use App\Repositories\Dispute\DisputeRepository;
use App\Http\Requests\Validations\ResponseDisputeRequest;
use App\Http\Requests\Validations\CreateDisputeRequest;

class DisputeController extends Controller
{
    use Authorizable;

    private $model_name;

    private $dispute;

    /**
     * construct
     */
    public function __construct(DisputeRepository $dispute)
    {
        $this->model_name = trans('app.model.dispute');

        $this->dispute = $dispute;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disputes = $this->dispute->open();

        return view('admin.dispute.index', compact('disputes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dispute._create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDisputeRequest $request)
    {
        $this->dispute->store($request);

        return back()->with('success', trans('messages.created', ['model' => $this->model_name]));
    }

    /**
     * Display the specified resource.
     *
     * @param int id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dispute = $this->dispute->find($id);

        return view('admin.dispute.show', compact('dispute'));
    }

    /**
     * Display the response form.
     *
     * @param int id
     * @return \Illuminate\Http\Response
     */
    public function response($id)
    {
        $dispute = $this->dispute->find($id);

        return view('admin.dispute._response', compact('dispute'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int id
     * @return \Illuminate\Http\Response
     */
    public function storeResponse(ResponseDisputeRequest $request, $id)
    {
        $this->dispute->storeResponse($request, $id);

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }
}
