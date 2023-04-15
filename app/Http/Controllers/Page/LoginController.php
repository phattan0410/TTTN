<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Cart;
use Directory;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(){
        return view('page.users.login');
    }
    public function register(){
        return view('page.users.register');
    }
    public function add(Request $request){
        $data = array();
        $data['username']=$request->email;
        $data['password']=md5($request->password);
        $data['ho_ten']=$request->name;
        $data['sdt']=$request->phone;
        $data['dia_chi']=$request->address;
        $id_khach_hang=DB::table('khachhangs')->insertGetId($data);
        Session::put('customer_id',$id_khach_hang);
        Session::put('customer_name',$request->name);
        return Redirect('/');
    }
    public function show(Request $request){
        $id_cs = $request->email;
        $cs = DB::table('khachhangs')->where('username',$id_cs)->get()->first();
        Session::put('customer_id',$cs->id_khach_hang);
        Session::put('customer_name',$cs->ho_ten);
        return Redirect('/');
    }
    public function logout(){
        Session::put('customer_id',null);
        Session::put('customer_name',null);
        Cart::destroy();
        return Redirect('/');
    }
}
