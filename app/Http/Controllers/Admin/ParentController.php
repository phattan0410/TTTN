<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HocSinh;
use App\Models\PhuHuynh;
use Illuminate\Http\Request;
use DB;

class ParentController extends Controller
{
    public function show(){
        // $this->AuthLogin();
        $lcs=PhuHuynh::all();
        return view('admin.parent.list',[
            'title'=>'Danh Sách Phụ Huynh'
        ])->with('data',$lcs);
    }
    public function show2(){
        $nv = HocSinh::all();
        return view('admin.parent.add',[
            'title'=>'Thêm Phụ Huynh'
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
            'htb' => 'required',
            'htm' => 'required',
            'dc' => 'required',
            'sdtb' => 'required|numeric',
            'sdtm' => 'required|numeric',
            'ths' => 'required',
        ],[
            'ma.required'=>'Chưa nhập mã',
            'htb.required'=>'Chưa nhập tên ba',
            'htm.required'=>'Chưa nhập tên mẹ',
            'dc.required'=>'Chưa nhập địa chỉ',
            'sdtb.required'=>'Chưa nhập số điện thoại ba',
            'sdtb.numeric'=>'số điện thoại ba phải là số',
            'sdtm.required'=>'Chưa nhập số điện thoại mẹ',
            'sdtm.numeric'=>'số điện thoại mẹ phải là số',
            'ths.required'=>'Chưa chọn học sinh',
        ]); 
        $nv = new PhuHuynh();
        $nv->MaPH=$request->ma;
        $nv->HoTenBa=$request->htb;
        $nv->HoTenMe=$request->htm;
        $nv->DiaChiLienLac=$request->dc;
        $nv->SoDTBa=$request->sdtb;
        $nv->SoDTMe=$request->sdtm;
        $nv->MaHS=$request->ths;
        $nv->save();
        return Redirect('/admin/parent/list')->with('success','Thêm thành công');
    }
    public function edit($id){
        $nv = PhuHuynh::where('MaPH',$id)->first();
        $nv1 = HocSinh::all();
        return view('admin.parent.edit',[
            'title'=>'Sửa Phụ Huynh'
        ])->with('data',$nv)->with('data1',$nv1);
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'htb' => 'required',
            'htm' => 'required',
            'dc' => 'required',
            'sdtb' => 'required|numeric',
            'sdtm' => 'required|numeric',
        ],[
            'htb.required'=>'Chưa nhập tên ba',
            'htm.required'=>'Chưa nhập tên mẹ',
            'dc.required'=>'Chưa nhập địa chỉ',
            'sdtb.required'=>'Chưa nhập số điện thoại ba',
            'sdtb.numeric'=>'số điện thoại ba phải là số',
            'sdtm.required'=>'Chưa nhập số điện thoại mẹ',
            'sdtm.numeric'=>'số điện thoại mẹ phải là số',
        ]); 
        $data = array();
        $data['HoTenBa']=$request->htb;
        $data['HoTenMe']=$request->htm;
        $data['DiaChiLienLac']=$request->dc;
        $data['SoDTBa']=$request->sdtb;
        $data['SoDTMe']=$request->sdtm;
        $data['MaHS']=$request->ths;
        DB::table('phuhuynh')->where('MaPH',$id)->update($data);
        return Redirect('/admin/parent/list')->with('success','Sửa thành công');
    }
    public function delete($id)
    {
        PhuHuynh::where('MaPH',$id)->delete();
        return Redirect('/admin/parent/list')->with('success','Xóa thành công');
    }
}
