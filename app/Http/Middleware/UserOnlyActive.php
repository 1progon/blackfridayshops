<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserOnlyActive
{
    /**
     * Only active users can go to the Admin panel
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (!$request->user()->active) {
            return redirect()->route('homepage');
        }
        return $next($request);
    }
}
