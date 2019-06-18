<?php namespace Avl\SiteRegistrations\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CabinetMiddleware
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null)
	{
		if (Auth::guard($guard)->check()) {
			if (Auth::user()->good == 1) {
				if (Auth::user()->role) {
					if (Auth::user()->role->name == 'guest') {
						return $next($request);
					}
				}
			}
		}
		return redirect()->route('cabinet.auth');
	}
}
