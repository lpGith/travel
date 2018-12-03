<?php

namespace App\Http\Middleware;

use Closure;

class OrderMiddleware
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
        //判断是否没有登陆
        if(empty(session("user"))){
            //跳转到登陆
			echo "<script>alert('请您先登录才能订票！点击确定后将跳往登录界面！');</script>";
			
            return redirect('Web/denglu');
        }
        return $next($request);
    }
}
