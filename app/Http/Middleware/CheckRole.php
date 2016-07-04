<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if ($request->user() === null){
            return response('Доступ запрещен',401);
        }
        $actions = $request->route()->getAction();
        $role = isset($actions['role']) ? $actions['role'] : null;

        if ($request->user()->hasAnyRole($role) || !$role) {
            return $next($request);
        }
        return response('Доступ запрещен',401);
    }

}
