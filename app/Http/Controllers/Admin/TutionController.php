<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BienLaiHocPhi;
use Illuminate\Http\Request;
use DB;

class TutionController extends Controller
{
    public function show()
    {
        // $this->AuthLogin();
        $lcs = BienLaiHocPhi::all();
        return view('admin.tution.list', [
            'title' => 'Danh Sách Biên Lai Học Phí'
        ])->with('data', $lcs);
    }
    public function show2()
    {
        return view('admin.tution.add', [
            'title' => 'Thêm Biên Lai Học Phí'
        ]);
    }
    public function index()
    {
        return view('admin.customer.add', [
            'title' => 'Thêm Nhân Viên'
        ]);
    }
    public function add(Request $request)
    {
        $this->validate($request, [
            'ma' => 'required',
            'ngay' => 'required',
            'tien' => 'required|numeric',
            'ghichu' => 'required',
            'malop' => 'required',
            'mahs' => 'required'
        ], [
            'ma.required' => 'Chưa nhập mã',
            'ngay.required' => 'Chưa nhập ngày đóng',
            'tien.required' => 'Chưa nhập số tiền',
            'tien.numeric' => 'Số tiền bữa ăn phải là số',
            'malop.required' => 'Chưa nhập mã lớp',
            'mahs.required' => 'Chưa nhập mã học sinh'
        ]);
        $nv = new BienLaiHocPhi();
        $nv->MaBL = $request->ma;
        $nv->NgayDong = $request->ngay;
        $nv->SoTien = $request->tien;
        $nv->GhiChu = $request->ghichu;
        $nv->MaLop = $request->malop;
        $nv->MaHS = $request->mahs;
        $nv->save();
        return Redirect('/admin/tution/list')->with('success', 'Thêm thành công');
    }
    public function edit($id)
    {
        $nv = BienLaiHocPhi::where('MaBL', $id)->first();
        return view('admin.tution.edit', [
            'title' => 'Sửa Biên Lai Học Phí'
        ])->with('data', $nv);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ngay' => 'required',
            'tien' => 'required|numeric',
            'ghichu' => 'required',
        ], [
            'ngay.required' => 'Chưa nhập ngày',
            'tien.required' => 'Chưa nhập số tiền',
            'tien.numeric' => 'Số tiền đóng phải là số',
            'ghichu.required' => 'Chưa nhập ghi chú'
        ]);
        $data = array();
        $data['NgayDong'] = $request->ngay;
        $data['SoTien'] = $request->tien;
        $data['GhiChu'] = $request->ghichu;
        DB::table('bienlaihocphi')->where('MaBL', $id)->update($data);
        return Redirect('/admin/tution/list')->with('success', 'Sửa thành công');
    }
    public function delete($id)
    {
        BienLaiHocPhi::where('MaBL', $id)->delete();
        return Redirect('/admin/tution/list')->with('success', 'Xóa thành công');
    }
}
