<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Charts\LatestSales;
use App\Charts\ResourcesUse;
use Illuminate\Http\Request;
use App\Common\Authorizable;
use App\Http\Controllers\Controller;
use App\Http\Requests\SecretLoginRequest;

class DashboardController extends Controller
{
    use Authorizable;

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
        if(Auth::user()->isFromPlatform()){
            return view('admin.dashboard.platform');
        }

        $chart = new LatestSales;
        $chart->dataset('Sale', 'column', [100, 65, 84, 45, 90,0, 65, 44, 45, 90,20, 65, 84, 45, 110])->color('#d3d3d3');

        return view('admin.dashboard.merchant', compact('chart'));

        // return view('admin.dashboard.index');
    }

    /**
     * Display the secret_login.
     *
     * @return \Illuminate\Http\Response
     */
    public function secretLogin(SecretLoginRequest $request, $id)
    {
        session(['impersonated' => $id, 'secretUrl' => \URL::previous()]);

        return redirect()->route('admin.admin.dashboard')->with('success', trans('messages.secret_logged_in'));
    }

    /**
     * Display the secret_login.
     *
     * @return \Illuminate\Http\Response
     */
    public function secretLogout()
    {
        $secret_url = Request::session()->get('secretUrl');

        Request::session()->forget('impersonated', 'secretUrl');

        return $secret_url ?
            redirect()->to($secret_url)->with('success', trans('messages.secret_logged_out')) :
            redirect()->route('admin.admin.dashboard');
    }
}
