<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClientOnlyReadOwnInvoices
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $invoice = \App\Invoice::find($request->route()->parameters()['id']);
        $dni = $invoice->vehicle->client['dni'];
        $user = \App\User::where('email', '=', $dni)->get()->first();
        if($user['id'] != Auth::id()) return response( view('errors.unauthorized'), 403);
        return $next($request);
    }
}
