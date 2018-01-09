<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Common\Authorizable;
use App\Http\Controllers\Controller;
use App\Repositories\Ticket\TicketRepository;
use App\Http\Requests\Validations\ReplyTicketRequest;
use App\Http\Requests\Validations\CreateTicketRequest;
use App\Http\Requests\Validations\UpdateTicketRequest;

class TicketController extends Controller
{
    use Authorizable;

    private $model_name;

    private $ticket;

    /**
     * construct
     */
    public function __construct(TicketRepository $ticket)
    {
        $this->model_name = trans('app.model.ticket');

        $this->ticket = $ticket;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = $this->ticket->open();

        $closed = $this->ticket->closed();

        $myTickets = $this->ticket->createdByMe();

        $assigned = $this->ticket->assignedToMe();

        return view('admin.ticket.index', compact('tickets', 'assigned', 'myTickets', 'closed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ticket._create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTicketRequest $request)
    {
        $this->ticket->store($request);

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
        $ticket = $this->ticket->find($id);

        return view('admin.ticket.show', compact('ticket'));
    }

    /**
     * Display the reply form.
     *
     * @param int id
     * @return \Illuminate\Http\Response
     */
    public function reply($id)
    {
        $ticket = $this->ticket->find($id);

        return view('admin.ticket._reply', compact('ticket'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int id
     * @return \Illuminate\Http\Response
     */
    public function storeReply(ReplyTicketRequest $request, $id)
    {
        $this->ticket->storeReply($request, $id);

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * Display the assign form.
     *
     * @param int id
     * @return \Illuminate\Http\Response
     */
    public function showAssignForm($id)
    {
        $ticket = $this->ticket->find($id);

        return view('admin.ticket._assign', compact('ticket'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int id
     * @return \Illuminate\Http\Response
     */
    public function assign(Request $request, $id)
    {
        $this->ticket->assign($request, $id);

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * Display the edit form.
     *
     * @param int id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = $this->ticket->find($id);

        return view('admin.ticket._edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, $id)
    {
        $this->ticket->update($request, $id);

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * Reopen the ticket.
     *
     * @param int id
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Http\Response
     */
    public function reopen(Request $request, $id)
    {
        $this->ticket->reopen($request, $id);

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }
}
