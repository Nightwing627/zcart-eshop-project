<?php

namespace App\Repositories\Refund;

use Illuminate\Http\Request;

interface RefundRepository{

    public function open();

    public function statusOf($status);

    public function opened($refund);

    public function approve($refund);

    public function decline($refund);
}