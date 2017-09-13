<?php

namespace App\Http\Middleware;

use Closure;

class ManagementTeacher
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
        if($request->user()->role  == 'manager')
            return $next($request);

        return redirect('/home');
    }
}
