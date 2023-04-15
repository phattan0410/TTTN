<?php

namespace App\Http\Middleware;

use App\Models\NhanVien;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminLoginMiddleware
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
        if(Session::has('loginId')){
            $user = NhanVien::where('MaNV',Session::get('loginId'))->get()->first();
            if($user->MaLoaiNV=='AD'){
                return $next($request);
            }
            else
                return redirect('admin')->with('fail','Tài khoản không thể truy cập vào trang');
        }
        else
            return redirect('admin');
    }
}
