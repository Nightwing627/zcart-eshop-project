<?php

namespace App\Http\Controllers\Admin;

use App\System;
use Illuminate\Http\Request;
use App\Common\Authorizable;
use App\Http\Controllers\Controller;
use App\Events\Ticket\TicketCreated;
use App\Events\Ticket\TicketUpdated;
use App\Events\Ticket\TicketReplied;
use App\Events\Ticket\TicketAssigned;
use App\Repositories\Ticket\TicketRepository;
use App\Http\Requests\Validations\ReplyTicketRequest;
use App\Http\Requests\Validations\CreateTicketRequest;
use App\Http\Requests\Validations\UpdateTicketRequest;
use App\Notifications\SuperAdmin\TicketCreated as TicketCreatedNotification;

class TicketController extends Controller
{
    use Authorizable;

    private $model;

    private $ticket;

    /**
     * construct
     */
    public function __construct(TicketRepository $ticket)
    {
        $this->model = trans('app.model.ticket');

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
        $ticket = $this->ticket->store($request);

        // Send notification to Admin
        if(config('system_settings.notify_new_ticket')){
            $system = System::orderBy('id', 'asc')->first();

            $system->superAdmin()->notify(new TicketCreatedNotification($ticket));
        }

        event(new TicketCreated($ticket));

        return back()->with('success', trans('messages.created', ['model' => $this->model]));
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
        $reply = $this->ticket->storeReply($request, $id);

        event(new TicketReplied($reply));

        return back()->with('success', trans('messages.updated', ['model' => $this->model]));
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
        $ticket = $this->ticket->assign($request, $id);

        event(new TicketAssigned($ticket));

        return back()->with('success', trans('messages.updated', ['model' => $this->model]));
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
        $ticket = $this->ticket->update($request, $id);

        event(new TicketUpdated($ticket));

        return back()->with('success', trans('messages.updated', ['model' => $this->model]));
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
        $ticket = $this->ticket->reopen($request, $id);

        event(new TicketUpdated($ticket));

        return back()->with('success', trans('messages.updated', ['model' => $this->model]));
    }
}
