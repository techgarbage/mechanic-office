<?php

namespace App\Http\Middleware;

use Closure;
use Caffeinated\Shinobi\Middleware\UserHasRole as UserHasRoleOriginal;
use Illuminate\Support\Facades\Auth;

class UserHasRole extends UserHasRoleOriginal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $guard = null)
    {

            /*if (!$this->auth->user()->can('access.admin')) {
                if ($request->ajax()) {
                    return response('Unauthorized.', 401);
                }
                return response( view('errors.unauthorized'), 401);
            }*/

        if (!$this->auth->user()->isRole($role)) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            }

            return response( view('errors.unauthorized'), 401);
        }

        return $next($request);
    }
}
