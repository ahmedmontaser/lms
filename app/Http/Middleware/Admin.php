<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
		$user = auth()->user();

		if($user->admin == 1 || $user->admin == 2) {
			return $next($request);
		}else {
			return redirect('mysubjects');
		}
    }
}
