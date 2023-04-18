<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HocSinh;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use DB;
class StudentController extends Controller
{
    public function show(){
        $lcs=HocSinh::all();
        return view('admin.student.list',[
            'title'=>'Danh Sách Học Sinh'
        ])->with('data',$lcs);
    }
    public function show2(){
        return view('admin.student.add',[
            'title'=>'Thêm Học Sinh'
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
            'gt' => 'required',
            'dt' => 'required',
            'dc' => 'required',
            'tdn' => 'required',
            'mk' => 'required',
        ],[
            'ma.required'=>'Chưa nhập mã',
            'ten.required'=>'Chưa nhập tên',
            'gt.required'=>'Chưa nhập giới tính',
            'dt.required'=>'Chưa nhập số điện thoại',
            'dc.required'=>'Chưa nhập địa chỉ',
        ]);
        $nv = new HocSinh();
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
        $nv = HocSinh::where('MaLop',$id)->first();
        $nv1 = NhanVien::where('MaLoaiNV','GV')->get();
        return view('admin.class.edit',[
            'title'=>'Sửa Lớp Năng Khiếu'
        ])->with('data',$nv)->with('data1',$nv1);
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'ten' => 'required',
            'gt' => 'required',
            'dt' => 'required',
            'dc' => 'required',
        ],[
            'ma.required'=>'Chưa nhập mã',
            'ten.required'=>'Chưa nhập tên',
            'gt.required'=>'Chưa nhập giới tính',
            'dt.required'=>'Chưa nhập số điện thoại',
            'dc.required'=>'Chưa nhập địa chỉ',
        ]);
        $data = array();
        $data['TenHS']=$request->ten;
        $data['GioiTinh']=$request->sbh;
        $data['SoDienThoai']=$request->slhs;
        $data['DiaChi']=$request->hp;
        DB::table('hocsinh')->where('MaHS',$id)->update($data);
        return Redirect('/admin/student/list')->with('success','Sửa thành công');
    }
    public function delete($id)
    {
        HocSinh::where('MaHS',$id)->delete();
        return Redirect('/admin/student/list')->with('success','Xóa thành công');
    }
}
