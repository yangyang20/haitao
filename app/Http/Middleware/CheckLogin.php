<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;


class CheckLogin
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
        if (empty(session('user_info'))){
            return redirect('admin/login')->with('errors','请先登录');
        }
        $userInfo = session('user_info');
        View::share('userName', $userInfo['user_name']);
        return $next($request);

    }
}
