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
            'tdn'=> 'required',
            'mk' => 'required'
        ],[
            'ma.required'=>'Chưa nhập mã',
            'ten.required'=>'Chưa nhập tên',
            'gt.required'=>'Chưa nhập giới tính',
            'dt.required'=>'Chưa nhập số điện thoại',
            'dc.required'=>'Chưa nhập địa chỉ',
            'tdn.required'=> 'Chưa nhập tên đăng nhập',
            'mk.requrired' => 'Chưa nhập mật khẩu'
        ]);
        $nv = new HocSinh();
        $nv->MaHS=$request->ma;
        $nv->TenHS=$request->ten;
        $nv->GioiTinh=$request->gt;
        $nv->DienThoai=$request->dt;
        $nv->DiaChi=$request->dc;
        $nv->TenDangNhap=$request->tdn;
        $nv->MatKhau=$request->mk;
        $nv->save();
        return Redirect('/admin/student/list')->with('success','Thêm thành công');
    }
    public function edit($id){
        $nv = HocSinh::where('MaHS',$id)->first();
        $nv1 = NhanVien::where('MaLoaiNV','GV')->get();
        return view('admin.student.edit',[
            'title'=>'Sửa Học Sinh'
        ])->with('data',$nv)->with('data1',$nv1);
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'ten' => 'required',
            'gt' => 'required',
            'dt' => 'required',
            'dc' => 'required',
        ],[
            'ten.required'=>'Chưa nhập tên',
            'gt.required'=>'Chưa nhập giới tính',
            'dt.required'=>'Chưa nhập số điện thoại',
            'dc.required'=>'Chưa nhập địa chỉ',
        ]);
        $data = array();
        $data['TenHS']=$request->ten;
        $data['GioiTinh']=$request->gt;
        $data['DienThoai']=$request->dt;
        $data['DiaChi']=$request->dc;
        DB::table('hocsinh')->where('MaHS',$id)->update($data);
        return Redirect('/admin/student/list')->with('success','Sửa thành công');
    }
    public function delete($id)
    {
        HocSinh::where('MaHS',$id)->delete();
        return Redirect('/admin/student/list')->with('success','Xóa thành công');
    }
}
