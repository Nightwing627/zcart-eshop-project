<?php

namespace App\Repositories\Ticket;

use Auth;
use App\Ticket;
use Carbon\Carbon;
use App\Attachment;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentTicket extends EloquentRepository implements BaseRepository, TicketRepository
{
	protected $model;

	public function __construct(Ticket $ticket)
	{
		$this->model = $ticket;
	}

    public function open()
    {
        if (Auth::user()->isFromPlatform())
            return $this->model->open()->with('user', 'shop')->withCount('replies')->get();

        return $this->model->mine()->open()->with('user', 'shop')->withCount('replies')->get();
    }

    public function closed()
    {
        if (Auth::user()->isFromPlatform())
            return $this->model->closed()->with('user', 'shop')->withCount('replies')->get();

        return $this->model->mine()->closed()->with('user', 'shop')->withCount('replies')->get();
    }

    public function unAssigned()
    {
        return $this->model->unAssigned()->get();
    }

    public function assignedToMe()
    {
        return $this->model->assignedToMe()->with('user', 'shop')->withCount('replies')->get();
    }

    public function createdByMe()
    {
        return $this->model->createdByMe()->with('user', 'shop')->withCount('replies')->get();
    }

    public function store(Request $request)
    {
        $ticket = $this->model->create($request->all());

        if ($request->hasFile('attachment'))
            Attachment::storeAttachmentFromRequest($request, $ticket, attachment_storage_dir());

        return $ticket;
    }

    public function show($id)
    {
        return $this->model->with(['replies' => function($query){
            $query->with('attachments', 'user')->orderBy('id', 'desc');
        }])->find($id);
    }

    public function storeReply(Request $request, $id)
    {
        $ticket = $this->model->find($id);

        $ticket->update($request->all());

        $reply = $ticket->replies()->create($request->all());

        if ($request->hasFile('attachment'))
            Attachment::storeAttachmentFromRequest($request, $reply, attachment_storage_dir());

        return $reply;
    }

    public function assign(Request $request, $id)
    {
        return $this->model->find($id)->update($request->all());
    }

    public function update(Request $request, $id)
    {
        return $this->model->find($id)->update($request->all());
    }

    public function reopen(Request $request, $id)
    {
        return $this->model->find($id)->update(['status' => Ticket::STATUS_OPEN]);
    }

    public function recentlyUpdated()
    {
        return $this->model->whereRaw("tickets.updated_at > '".Carbon::parse('-1 days')->toDateTimeString()."'")->get();
    }

    public function search($text)
    {
        return $this->model->where(function ($query) use ($text) {
            $query->where('subject', 'like', "%{$text}%")->orWhere('message', 'like', "%{$text}%");
        })->get();
    }
}