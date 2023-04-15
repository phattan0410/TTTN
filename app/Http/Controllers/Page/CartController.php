<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function show(){
        // $sp=DB::table('sanphams')->where('id_sp',$id)->get();
        return view('page.cart.list',[
            'title'=>'Chí Duy Mobile',
        ]);
    }
    public function add(Request $request){
        $id=$request->product_id;
        $sp=DB::table('sanphams')->where('id_sp',$id)->get()->first();
        $sl=$request->num_product;
        $data['id']=$sp->id_sp;
        $data['qty']=$sl;
        $data['name']=$sp->ten_sp;
        $data['price']=$sp->gia_sp;
        $data['weight']='0';
        $data['options']['image']=$sp->hinh_anh;
        Cart::add($data);
        // Cart::destroy();
        return Redirect::to('/cart');
    }
    public function delete($id){
        Cart::remove($id);
        return Redirect::to('/cart');
    }
    public function update(Request $request){
        $id=$request->id;
        $sl=$request->num_product;
        Cart::update($id,$sl);
        return Redirect::to('/cart');
    }
}
