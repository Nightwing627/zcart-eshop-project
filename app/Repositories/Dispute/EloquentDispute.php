<?php

namespace App\Repositories\Dispute;

use Auth;
use App\Dispute;
use Carbon\Carbon;
use App\Attachment;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentDispute extends EloquentRepository implements BaseRepository, DisputeRepository
{
	protected $model;

	public function __construct(Dispute $dispute)
	{
		$this->model = $dispute;
	}

    public function open()
    {
        if (Auth::user()->isFromPlatform())
            return $this->model->appealed()->with('dispute_type', 'customer', 'shop')->withCount('replies')->get();

        return $this->model->mine()->open()->with('dispute_type', 'customer')->withCount('replies')->get();
    }

    public function closed()
    {
        if (Auth::user()->isFromPlatform())
            return $this->model->closed()->with('dispute_type', 'customer', 'shop')->withCount('replies')->get();

        return $this->model->mine()->closed()->with('customer', 'dispute_type')->withCount('replies')->get();
    }

    public function store(Request $request)
    {
        $dispute = $this->model->create($request->all());

        if ($request->hasFile('attachment')) {
            Attachment::storeAttachmentFromRequest($request, $dispute);
        }

        return $dispute;
    }

    public function show($id)
    {
        return $this->model->with(['replies' => function($query){
            $query->with('attachments', 'user')->orderBy('id', 'desc');
        }])->find($id);
    }

    public function storeResponse(Request $request, $id)
    {
        $dispute = $this->model->find($id);

        $dispute->update($request->all());

        $response = $dispute->replies()->create($request->all());

        if ($request->hasFile('attachment')) {
            Attachment::storeAttachmentFromRequest($request, $response);
        }

        return $response;
    }

    public function recentlyUpdated()
    {
        return $this->model->whereRaw("disputes.updated_at > '".Carbon::parse('-1 days')->toDateTimeString()."'")->get();
    }
}