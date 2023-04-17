<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BienLaiLePhi;
use Illuminate\Http\Request;
use DB;

class FeeController extends Controller
{
    public function show(){
        // $this->AuthLogin();
        $lcs=BienLaiLePhi::all();
        return view('admin.fees.list',[
            'title'=>'Danh Sách Biên Lai Lệ Phí'
        ])->with('data',$lcs);
    }
    public function show2(){
        return view('admin.fees.add',[
            'title'=>'Thêm Biên Lai Lệ Phí'
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
            'ngay' => 'required',
            'tien' => 'required|numeric',
            'ghichu' => 'require',
            'manv' => 'required',
            'mahs' => 'required'
        ],[
            'ma.required'=>'Chưa nhập mã',
            'ngay.required'=>'Chưa nhập ngày đóng',
            'tien.required'=>'Chưa nhập số tiền',
            'tien.numeric'=>'Số tiền đóng phải là số',
        ]);
        $nv = new BienLaiLePhi();
        $nv->MaBL=$request->ma;
        $nv->NgayDong=$request->ngay;
        $nv->SoTien=$request->tien;
        $nv->GhiChu=$request->ghichu;
        $nv->MaNV=$request->manv;
        $nv->MaHS=$request->mahs;
        $nv->save();
        return Redirect('/admin/fees/list')->with('success','Thêm thành công');
    }
    public function edit($id){
        $nv = BienLaiLePhi::where('MaBL',$id)->first();
        return view('admin.fees.edit',[
            'title'=>'Sửa Biên Lai Lệ Phí'
        ])->with('data',$nv);
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'ngay' => 'required',
            'tien' => 'required|numeric',
            'ghichu' => 'require',
        ],[
            'ngay.required'=>'Chưa nhập ngày',
            'tien.required'=>'Chưa nhập số tiền',
            'tien.numeric'=>'Số tiền đóng phải là số',
        ]);
        $data = array();
        $data['NgayDong']=$request->ngay;
        $data['SoTien']=$request->tien;
        $data['GhiChu']=$request->ghichu;
        DB::table('bienlailephi')->where('MaBL',$id)->update($data);
        return Redirect('/admin/fees/list')->with('success','Sửa thành công');
    }
    public function delete($id)
    {
        BienLaiLePhi::where('MaBL',$id)->delete();
        return Redirect('/admin/fees/list')->with('success','Xóa thành công');
    }
}
