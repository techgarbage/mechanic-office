<?php

namespace App\Http\Middleware;

use Closure;
use Caffeinated\Shinobi\Middleware\UserHasPermission as UserHasPermissionOriginal;

class UserHasPermission extends UserHasPermissionOriginal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permissions)
    {
        if ($this->auth->check()) {
            if (!$this->auth->user()->can($permissions)) {
                if ($request->ajax()) {
                    return response('Unauthorized.', 403);
                }

                return response( view('errors.unauthorized'), 403);
            }
        } else {
            $guest = Role::whereSlug('guest')->first();

            if ($guest) {
                if (!$guest->can($permissions)) {
                    if ($request->ajax()) {
                        return response('Unauthorized.', 403);
                    }

                    return response( view('errors.unauthorized'), 403);
                }
            }
        }
        return $next($request);
    }
}
