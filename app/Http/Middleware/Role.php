<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ... $roles): Response
    {
        if(!auth()->check()){
            return redirect()->route('login');
        }

        // Show a 403 Error if an user tries to access an unauthorized page
        if(!in_array(auth()->user()->role,$roles)){
            abort(403,'Unauthorize');
        }

        return $next($request);
    }
}
