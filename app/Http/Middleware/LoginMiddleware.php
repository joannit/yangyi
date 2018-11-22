<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        //return $next($request);
        if($request->session()->has('user')){
			return $next($request);
		}else{
//跳转到登录界面
			return back()->with('error','请先登录');
		}
    }
}
