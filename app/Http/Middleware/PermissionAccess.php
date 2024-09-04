<?php

namespace App\Http\Middleware;

use App\Models\Account;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class PermissionAccess
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
        $id_account = Cookie::get('id_account');
        if(isset($id_account) && $id_account){
            $user = Account::find($id_account);
            if(!empty($user) && $user->id_role == 1){
                return $next($request);
            }else{
                return redirect()->route('admin.login');
            }
        }else{
            return redirect()->route('admin.login');
        }
    }
}
