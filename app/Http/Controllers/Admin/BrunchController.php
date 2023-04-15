<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BuaAn;
use Illuminate\Http\Request;
use DB;

class BrunchController extends Controller
{
    public function show(){
        // $this->AuthLogin();
        $lcs=BuaAn::all();
        return view('admin.brunch.list',[
            'title'=>'Danh Sách Bữa Ăn'
        ])->with('data',$lcs);
    }
    public function show2(){
        return view('admin.brunch.add',[
            'title'=>'Thêm Bữa Ăn'
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
            'stba' => 'required|numeric',
        ],[
            'ma.required'=>'Chưa nhập mã',
            'ten.required'=>'Chưa nhập tên',
            'stba.required'=>'Chưa nhập số tiền',
            'stba.numeric'=>'Số tiền bữa ăn phải là số',
        ]); 
        $nv = new BuaAn();
        $nv->MaBA=$request->ma;
        $nv->TenBA=$request->ten;
        $nv->SoTienBA=$request->stba;
        $nv->save();
        return Redirect('/admin/brunch/list')->with('success','Thêm thành công');
    }
    public function edit($id){
        $nv = BuaAn::where('MaBA',$id)->first();
        return view('admin.brunch.edit',[
            'title'=>'Sửa Bữa Ăn'
        ])->with('data',$nv);
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'ten' => 'required',
            'stba' => 'required|numeric',
        ],[
            'ten.required'=>'Chưa nhập tên',
            'stba.required'=>'Chưa nhập số tiền',
            'stba.numeric'=>'Số tiền bữa ăn phải là số',
        ]); 
        $data = array();
        $data['TenBA']=$request->ten;
        $data['SoTienBA']=$request->stba;
        DB::table('buaan')->where('MaBA',$id)->update($data);
        return Redirect('/admin/brunch/list')->with('success','Sửa thành công');
    }
    public function delete($id)
    {
        BuaAn::where('MaBA',$id)->delete();
        return Redirect('/admin/brunch/list')->with('success','Xóa thành công');
    }
}
