<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginMiddleware
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
        // 检测有没有用户名的session信息

        // dd($request->session()->has('admin_name'));
        if($request->session()->has('admin_name')){

        // // 获取模块控制器的方法
            //$actions=\Route::current()->getActionName();
           $actions=explode('\\', \Route::current()->getActionName());
            // dd($actions);
            // var_dump($actions);
            $modeName=$actions[count($actions)-2]=='Controller'?null:$actions[count($actions)-2];
            //dd($modeName);
            // 获取控制器和方法
            $func=explode('@', $actions[count($actions)-1]);
            // 控制器
            $controllerName=$func[0];
            // 方法
            $actionName=$func[1];
            // dd($func,$controllerName,$actionName);

            // 权限对比

            $nodelist=session('nodelist');
            // dd($nodelist);
        if (empty($nodelist[$controllerName]) || !in_array($actionName,$nodelist[$controllerName])) {

                //return redirect('/admin')->with('error','抱歉，您没有权限访问该模块，请联系超级管理员');
            }

            return $next($request);
        }else {

            // return $next($request);

       return redirect('/adminlogin');
        //return $next($request);
        }
    }
}
