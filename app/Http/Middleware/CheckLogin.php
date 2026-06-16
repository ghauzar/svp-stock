<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(
        Request $request,
        Closure $next
    )
    {
        if(!session()->has('user_id'))
        {
            return redirect('/login');
        }

        if(session('role') != 'admin')
        {
            abort(403);
        }

        return $next($request);
    }
}
