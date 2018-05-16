<?php

namespace App\Http\Controllers\Selling;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellingController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('index');
    }
}
