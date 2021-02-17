<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class RoleAuth
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
        if (Auth::check()) {
            $role = Role::findOrFail(Auth::user()->role->id);
            $routeController = $request->route()->getName();
            $permission = Permission::where('permission','LIKE',$routeController)->first();
            if($permission != null){
                $cek = Auth::user()->role->permissions()->where('permission_id',$permission->id)->get();
                if( count($cek)>0){
                    return $next($request);
                }
            }
        }
        return abort(403);
    }
}
