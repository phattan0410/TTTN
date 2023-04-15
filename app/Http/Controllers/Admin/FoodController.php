<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MonAn;
use Illuminate\Http\Request;
use DB;

class FoodController extends Controller
{
    public function show(){
        $lcs=MonAn::all();
        return view('admin.food.list',[
            'title'=>'Danh Sách Món Ăn'
        ])->with('data',$lcs);
    }
    public function show2(){
        return view('admin.food.add',[
            'title'=>'Thêm Món Ăn'
        ]);
    }
    public function index(){
        return view('admin.customer.add',[
            'title'=>'Thêm Nhân Viên'
        ]);
    }
    public function add(Request $request){
        $this->validate($request,[
            'ma' => 'required',
            'ten' => 'required',
            'lma' => 'required',
        ],[
            'ma.required'=>'Chưa nhập mã',
            'ten.required'=>'Chưa nhập tên',
            'lma.required'=>'Chưa nhập thành phần',
        ]); 
        $nv = new MonAn();
        $nv->MaMon=$request->ma;
        $nv->TenMon=$request->ten;
        $nv->LoaiMA=$request->lma;
        $nv->save();
        return Redirect('/admin/food/list')->with('success','Thêm thành công');
    }
    public function edit($id){
        $nv = MonAn::where('MaMon',$id)->first();
        return view('admin.food.edit',[
            'title'=>'Sửa Món Ăn'
        ])->with('data',$nv);
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'ten' => 'required',
            'lma' => 'required',
        ],[
            'ten.required'=>'Chưa nhập tên',
            'lma.required'=>'Chưa nhập thành phần',
        ]); 
        $data = array();
        $data['TenMon']=$request->ten;
        $data['LoaiMA']=$request->lma;
        DB::table('monan')->where('MaMon',$id)->update($data);
        return Redirect('/admin/food/list')->with('success','Sửa thành công');
    }
    public function delete($id)
    {
        MonAn::where('MaMon',$id)->delete();
        return Redirect('/admin/food/list')->with('success','Xóa thành công');
    }
}
