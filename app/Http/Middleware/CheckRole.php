<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next)
    {
        if($request->user() == null){
            return response('insufficient permesion', 401);
        }

        $actions = $request->route()->getAction();
        //dd($actions);
        $roles = isset($actions['roles']) ? $actions['roles'] : null;
        //dd(!$roles);
        if($request->user()->hasAnyRole($roles) || !$roles){
            return $next($request);
        }

        return response('insufficient permesion', 401);

    }
}
