<?php

namespace App\Http\Middleware;

use Closure;

class ActiveAccountVerification
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
        if($request->session()->get('profile_id')){
            return redirect()->route('profile', ['profile_id' => $request->session()->get('profile_id')]);
        } else {
            return $next($request);
        }
    }
}
