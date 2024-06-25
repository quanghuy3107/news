<?php

namespace App\Http\Middleware;

use App\Enums\TaskSoftDelete;
use App\Enums\TaskUserStatus;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Gate::allows('hasRole','ADMIN') or Gate::allows('hasRole','SUPPERADMIN')){
            return $next($request);
        }else{
            return redirect()->route('/');
        }

    }
}
