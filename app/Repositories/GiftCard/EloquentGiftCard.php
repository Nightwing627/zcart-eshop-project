<?php

namespace App\Repositories\GiftCard;

use App\GiftCard;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentGiftCard extends EloquentRepository implements BaseRepository, GiftCardRepository
{
	protected $model;

	public function __construct(GiftCard $giftCard)
	{
		$this->model = $giftCard;
	}

	public function valid()
	{
		return $this->model->valid()->get();
	}

	public function invalid()
	{
		return $this->model->invalid()->get();
	}
}