<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         #Kiểm Tra trạng thái đăng nhập của admin
         $adminlogin=session()->get('admin_login');

         if(empty($adminlogin)){
             return redirect()->route('login.dang_nhap'); 
         }
        return $next($request);
    }
}
