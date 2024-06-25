<?php

namespace App\Http\Middleware;

use App\Enums\TaskSoftDelete;
use App\Enums\TaskUserStatus;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(empty(Auth::user())){
            return $next($request);
        }
        if (Auth::user()->status != TaskUserStatus::Activity->value or Auth::user()->is_deleted != TaskSoftDelete::NotDeleted->value)
        {
            Auth::logout();
            return redirect()->route('/');
        }
        return $next($request);
    }
}
