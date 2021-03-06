<?php

namespace App\TCG\Voyager\Src\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\TCG\Voyager\Src\Facades\Voyager;

class VoyagerAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::guest()) {
            $user = Voyager::model('User')->find(Auth::id());

            return $user->hasPermission('browse_admin') ? $next($request) : redirect('/');
        }

        $urlLogin = route('voyager.login');
        $urlIntended = $request->url();
        if ($urlIntended == $urlLogin) {
            $urlIntended = null;
        }

        return redirect($urlLogin)->with('url.intended', $urlIntended);
    }
}
