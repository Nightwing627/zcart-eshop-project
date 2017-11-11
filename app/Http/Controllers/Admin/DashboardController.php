<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
// use App\Common\Authorizable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // use Authorizable;

    /**
     * construct
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display Dashboard of the logged in users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.index');
    }
}
