<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModeratorCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $userId = Auth::id();
        if ($userId && (Role::isUserModerator($userId) || Role::isUserAdmin($userId))){
            return $next($request);
        }
        return redirect(route('home_page'));
    }
}
