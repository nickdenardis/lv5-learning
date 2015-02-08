<?php namespace Incremently\Http\Middleware;

use Closure;

class RedirectIfNotAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        // If not an admin in the system
        if ( ! $request->user()->isAdmin() ) {
            return redirect('/');
        }

		return $next($request);
	}

}
