<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoaiNhanVien;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function show(){
        $lcs=NhanVien::all();
        return view('admin.customer.list',[
            'title'=>'Danh Sách Nhân Viên'
        ])->with('data',$lcs);
    }
    public function show2(){
        $lpl=LoaiNhanVien::all();
        $lcs=NhanVien::all();
        return view('admin.customer.list2',[
            'title'=>'Danh Sách Nhân Viên'
        ])->with('data',$lcs)->with('data2',$lpl);
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
            'ns' => 'required',
            'sdt' => 'required|numeric|min:10',
            'dc' => 'required',
            'tk' => 'required|min:6|max:24',
            'mk' => 'required|min:6|max:24',
        ],[
            'ma.required'=>'Chưa nhập mã',
            'ten.required'=>'Chưa nhập tên',
            'ns.required'=>'Chưa chọn ngày sinh',
            'sdt.required'=>'Chưa nhập số điện thoại',
            'sdt.numeric'=>'Số điện thoại phải là số',
            'sdt.min'=>'Số điện thoại nhỏ hơn 10',
            'dc.required'=>'Chưa nhập địa chỉ',
            'tk.required'=>'Chưa nhập tài khoản',
            'tk.min'=>'Tài khoản phải lớn hơn 6 ký tự',
            'tk.max'=>'Tài khoản phải nhỏ hơn 24 ký tự',
            'mk.required'=>'Chưa nhập mật khẩu',
            'mk.min'=>'Mật khẩu phải lớn hơn 6 ký tự',
            'mk.max'=>'Mật khẩu phải nhỏ hơn 24 ký tự',
        ]); 
        $nv = new NhanVien;
        $nv->MaNV=$request->ma;
        $nv->HoTenNV=$request->ten;
        $nv->GioiTinh=$request->gt;
        $nv->NgaySinh=$request->ns;
        $nv->SoDT=$request->sdt;
        $nv->DiaChi=$request->dc;
        $nv->TenDangNhap=$request->tk;
        $nv->MatKhau=Hash::make($request->mk);
        $nv->MaLoaiNV='NV';
        $nv->save();
        return Redirect('/admin/customer/list')->with('success','Thêm thành công');
    }
    public function edit($id){
        $nv = NhanVien::where('MaNV',$id)->first();
        return view('admin.customer.edit',[
            'title'=>'Sửa Nhân Viên'
        ])->with('data',$nv);
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'ten' => 'required',
            'ns' => 'required',
            'sdt' => 'required|numeric|min:10',
            'dc' => 'required',
            'mk' => 'required|min:6|max:24',
        ],[
            'ten.required'=>'Chưa nhập tên',
            'ns.required'=>'Chưa chọn ngày sinh',
            'sdt.required'=>'Chưa nhập số điện thoại',
            'sdt.numeric'=>'Số điện thoại phải là số',
            'sdt.min'=>'Số điện thoại nhỏ hơn 10',
            'dc.required'=>'Chưa nhập địa chỉ',
            'mk.required'=>'Chưa nhập mật khẩu',
            'mk.min'=>'Mật khẩu phải lớn hơn 6 ký tự',
            'mk.max'=>'Mật khẩu phải nhỏ hơn 24 ký tự',
        ]); 
        $data = array();
        $data['HoTenNV']=$request->ten;
        $data['GioiTinh']=$request->gt;
        $data['NgaySinh']=$request->ns;
        $data['SoDT']=$request->sdt;
        $data['DiaChi']=$request->dc;
        $data['MatKhau']=Hash::make($request->mk);
        DB::table('nhanvien')->where('MaNV',$id)->update($data);
        return Redirect('/admin/customer/list')->with('success','Sửa thành công');
    }
    public function update2(Request $request ,$id){
        $data = array();
        $data['MaLoaiNV']=$request->l;
        DB::table('nhanvien')->where('MaNV',$id)->update($data);
        return Redirect('/admin/customer/list2')->with('success','Phân Quyền thành công');
    }
    public function delete($id)
    {
        NhanVien::where('MaNV',$id)->delete();
        return Redirect('/admin/customer/list')->with('success','Xóa thành công');
    }
}
