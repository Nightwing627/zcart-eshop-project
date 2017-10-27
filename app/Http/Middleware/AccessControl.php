<?php

namespace App\Http\Middleware;

use Closure;
// use App\Common\Authorizable;
use Illuminate\Support\Facades\Auth;

class AccessControl
{
    // use Authorizable;

    private $abilities = [
        'index' => 'view',
        'show' => 'view',
        'staffs' => 'view',
        'edit' => 'edit',
        'update' => 'edit',
        'create' => 'add',
        'store' => 'add',
        'trash' => 'delete',
        'restore' => 'delete',
        'destroy' => 'delete'
    ];


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // return $next($request); //Temporary. Will be removed

        if (Auth::check())
        {
            if ($request->user()->isSuperAdmin())
                return $next($request);

            if ($this->getAbilities($request)) {
                return $next($request);
            }else{
                return back()->with('error', trans('messages.permission.denied'));
            }
        }

        return $request->ajax ? response('Unauthorized.', 401) : redirect('/login');
    }

    private function getAbilities($request)
    {
        $temp1 = explode('.', $request->route()->getName());
        $module = array_slice($temp1, -2, 1)[0];
        $action = array_slice($temp1, -1, 1)[0];

        if ($action == 'dashboard')
            return TRUE;

        $slug = $this->abilities[$action] . '_' . $module;
        $permissions = $request->user()->role->permissions()->pluck('slug')->toArray();

        return in_array($slug, $permissions);
    }

}
