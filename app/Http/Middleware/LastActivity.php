<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Carbon\Carbon;
use App\User;

class LastActivity
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
        if(Auth::check())
        {
            $expiresAt = Carbon::now();
            $user = Auth::user();
            $user->lastActivity = $expiresAt;
            $user->save();
        }
        return $next($request);
    }
}
