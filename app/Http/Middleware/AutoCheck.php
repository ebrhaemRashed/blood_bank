<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class AutoCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $routeName = $request->route()->getName();
        $per = Permission::whereRaw("FIND_IN_SET('$routeName', routes)")->first();

        if(!auth()->user()->hasPermissionTo($per->name))
        {
            abort(403);
        }

        return $next($request);
    }
}
