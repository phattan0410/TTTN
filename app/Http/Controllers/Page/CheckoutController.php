<?php

namespace App\Http\Controllers\Page;
use Cart;
Use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class CheckoutController extends Controller
{
    public function checkout(){
        $data =Cart::content();
        $id_khach_hang=Session::get('customer_id');
        if($id_khach_hang!=null){
        $kh=DB::table('khachhangs')->where('id_khach_hang',$id_khach_hang)->get()->first();
        $date=date('Y-m-d H:i:s');
        $sp = array();
        $sp['id_khach_hang']=$kh->id_khach_hang;
        $sp['ten_khach_hang']=$kh->ho_ten;
        $sp['sdt']=$kh->sdt;
        $sp['dia_chi']=$kh->dia_chi;
        $sp['id_trang_thai']=1;
        $sp['created_at']=$date;
        $id_dhh=DB::table('dondathangs')->insertGetId($sp);
        foreach($data as $k => $v){
            $ctdh = array();
            $ctdh['id_dat_hang']=$id_dhh;
            $ctdh['id_san_pham']=$v->id;
            $ctdh['gia']=$v->price;
            $ctdh['so_luong']=$v->qty;
            $ctdh['tong_tien']=$v->price*$v->qty;
            $ctdh['created_at']=$date;
            DB::table('chitietdathangs')->insert($ctdh);
        }
        Cart::destroy();
        return Redirect::to('/');
    }
        return view('page.users.register');
    }
    public function show(){
        $id_khach_hang=Session::get('customer_id');
        if($id_khach_hang!=null){
        $dh =DB::table('dondathangs')->where('id_khach_hang',$id_khach_hang)->get();
        $kh=DB::table('khachhangs')->where('id_khach_hang',$id_khach_hang)->get()->first();
            return view('page.checkout.show')->with('kh',$kh)->with('dh',$dh);
        }
    }
    public function detail($id_dh){
        // Cart::destroy();
        $dh =DB::table('chitietdathangs')->where('id_dat_hang',$id_dh)->get();
        foreach($dh as $k => $v){
            $sp =DB::table('sanphams')->where('id_sp',$v->id_san_pham)->get()->first();
            $data['id']=$sp->id_sp;
            $data['qty']=$v->so_luong;
            $data['name']=$sp->ten_sp;
            $data['price']=$sp->gia_sp;
            $data['weight']='0';
            $data['options']['image']=$sp->hinh_anh;
            Cart::add($data);
        }
        return view('page.checkout.detail');
    }
}
