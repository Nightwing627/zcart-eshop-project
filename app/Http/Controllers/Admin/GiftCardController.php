<?php namespace App\Http\Controllers\Admin;

use App\GiftCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreateGiftCardRequest;
use App\Http\Requests\Validations\UpdateGiftCardRequest;

class GiftCardController extends Controller
{
    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.gift_card');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['gift_cards'] = GiftCard::all();

        $data['trashes'] = GiftCard::onlyTrashed()->get();

        return view('admin.gift-card.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gift-card._create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGiftCardRequest $request)
    {
        $gift_card = new GiftCard($request->all());

        $gift_card->save();

        return back()->with('success', trans('messages.created', ['model' => $this->model_name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  GiftCard  $giftCard
     * @return \Illuminate\Http\Response
     */
    public function show(GiftCard $giftCard)
    {
        return view('admin.gift-card._show', compact('giftCard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  GiftCard $giftCard
     * @return \Illuminate\Http\Response
     */
    public function edit(GiftCard $giftCard)
    {
        return view('admin.gift-card._edit', compact('giftCard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  GiftCard $giftCard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGiftCardRequest $request, GiftCard $giftCard)
    {
        $giftCard->update($request->all());

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * Trash the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  GiftCard $giftCard
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request, GiftCard $giftCard)
    {
        $giftCard->delete();

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
        GiftCard::onlyTrashed()->where('id',$id)->restore();

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
        GiftCard::onlyTrashed()->find($id)->forceDelete();

        return back()->with('success',  trans('messages.deleted', ['model' => $this->model_name]));
    }
}
