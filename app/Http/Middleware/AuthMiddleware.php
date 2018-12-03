<?php

namespace App\Http\Middleware;

use Closure;

class AuthMiddleware
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
        if(empty(session("adminuser"))){
            //跳转到登陆
            return redirect('admin');
        }
        //判断是否是超级用户
        if (session("adminuser")->state==0) {
            return $next($request);
        }
        //判断权限
        $nodelist = session("nodelist");
        foreach ($nodelist as $v) {
            # 判断权限
            if ($request->is($v['url']) && $request->isMethod($v['method'])) {
                return $next($request);
            }
        }
        /*
        if ($request->is('admin/users') && $request->isMethod('get')) {
            # code...
            echo "get:admin/users";
        }
        if ($request->is('admin/users') && $request->isMethod('post')) {
            # code...
            echo "post:admin/users";
        }
        if ($request->is('admin/users/*') && $request->isMethod('delete')) {
            # code...
            echo "delete:admin/users";
        }
        if ($request->is('admin/users/* /edit') && $request->isMethod('get')) {
            # code...
            echo "get:admin/users/* /edit";
        }
        */
         return back()->with("err","抱歉你没有此操作权限!");
    }
}
