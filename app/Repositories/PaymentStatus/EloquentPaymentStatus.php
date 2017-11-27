<?php

namespace App\Repositories\PaymentStatus;

use App\PaymentStatus;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentPaymentStatus extends EloquentRepository implements BaseRepository, PaymentStatusRepository
{
	protected $model;

	public function __construct(PaymentStatus $paymentStatus)
	{
		$this->model = $paymentStatus;
	}
}