<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login');
    }

    public function show()
    {
        return view('admin.main', [
            'title' => 'Trang Admin'
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Chưa nhập tài khoản',
            'password.required' => 'Chưa nhập mật khẩu'
        ]);
        $user = NhanVien::where('TenDangNhap', 'like', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->MatKhau)) {
                $request->session()->put('loginId', $user->MaNV);
                return Redirect('/admin/customer/list');
            } else {
                return back()->with('fail', 'Mật khẩu không chính xác');
            }
        } else {
            return back()->with('fail', 'Tên đăng nhập không chính xác');
        }
    }
    public function logout()
    {
        Session::put('loginId', null);
        return Redirect::to('/admin/users/login');
    }
}
