<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LopNangKhieu;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use DB;
class ClassController extends Controller
{
    public function show(){
        $lcs=LopNangKhieu::all();
        return view('admin.class.list',[
            'title'=>'Danh Lớp Năng Khiếu'
        ])->with('data',$lcs);
    }
    public function show2(){
        $nv = NhanVien::where('MaLoaiNV','GV')->get();
        return view('admin.class.add',[
            'title'=>'Thêm Lớp Năng Khiếu'
        ])->with('data',$nv);
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
            'sbh' => 'required|numeric',
            'slhs' => 'required|numeric',
            'hp' => 'required|numeric',
            'tgh' => 'required',
        ],[
            'ma.required'=>'Chưa nhập mã',
            'ten.required'=>'Chưa nhập tên',
            'sbh.required'=>'Chưa nhập số buổi học',
            'sbh.numeric'=>'Số buổi học phải là số',
            'slhs.required'=>'Chưa nhập số lượng học sinh',
            'slhs.numeric'=>'Số lượng học sinh phải là số',
            'hp.required'=>'Chưa nhập học phí',
            'hp.numeric'=>'Học phí phải là số',
            'tgh.required'=>'Chưa chọn thời gian học',
        ]); 
        $nv = new LopNangKhieu();
        $nv->MaLop=$request->ma;
        $nv->TenLop=$request->ten;
        $nv->SoBuoiHoc=$request->sbh;
        $nv->SoLuongHS=$request->slhs;
        $nv->HocPhi=$request->hp;
        $nv->ThoiGianHoc=$request->tgh;
        $nv->MaNV=$request->gvpt;
        $nv->save();
        return Redirect('/admin/class/list')->with('success','Thêm thành công');
    }
    public function edit($id){
        $nv = LopNangKhieu::where('MaLop',$id)->first();
        $nv1 = NhanVien::where('MaLoaiNV','GV')->get();
        return view('admin.class.edit',[
            'title'=>'Sửa Lớp Năng Khiếu'
        ])->with('data',$nv)->with('data1',$nv1);
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'ten' => 'required',
            'sbh' => 'required|numeric',
            'slhs' => 'required|numeric',
            'hp' => 'required|numeric',
            'tgh' => 'required',
        ],[
            'ten.required'=>'Chưa nhập tên',
            'sbh.required'=>'Chưa nhập số buổi học',
            'sbh.numeric'=>'Số buổi học phải là số',
            'slhs.required'=>'Chưa nhập số lượng học sinh',
            'slhs.numeric'=>'Số lượng học sinh phải là số',
            'hp.required'=>'Chưa nhập học phí',
            'hp.numeric'=>'Học phí phải là số',
            'tgh.required'=>'Chưa chọn thời gian học',
        ]); 
        $data = array();
        $data['TenLop']=$request->ten;
        $data['SoBuoiHoc']=$request->sbh;
        $data['SoLuongHS']=$request->slhs;
        $data['HocPhi']=$request->hp;
        $data['ThoiGianHoc']=$request->tgh;
        $data['MaNV']=$request->gvpt;
        DB::table('lopnangkhieu')->where('MaLop',$id)->update($data);
        return Redirect('/admin/class/list')->with('success','Sửa thành công');
    }
    public function delete($id)
    {
        LopNangKhieu::where('MaLop',$id)->delete();
        return Redirect('/admin/class/list')->with('success','Xóa thành công');
    }
}
