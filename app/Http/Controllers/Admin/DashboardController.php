<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Request;
use App\User;
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
        return view('admin.dashboard.index');
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
