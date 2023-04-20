<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LopNangKhieu;
use App\Models\PhuHuynh;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        // $lcs = HocSinh::all();
        return view('admin.search.list', [
            'title' => 'Tìm Kiếm'
        ]);
    }
    public function search(Request $request)
    {
        $this->validate($request, [
            'vl' => 'required',
        ], [
            'vl.required' => 'Chưa nhập nội dung',
        ]);
        if ($request->nd == 0) {
            $lcs = PhuHuynh::where('HoTenBa', 'like', '%' . $request->vl . '%')->orWhere('HoTenMe', 'like', '%' . $request->vl . '%')->get();
            return view('admin.search.listPH', [
                'title' => 'Tìm Kiếm'
            ])->with('data', $lcs);
        } else if ($request->nd == 1) {
            $lcs = LopNangKhieu::where('TenLop', 'like', '%' . $request->vl . '%')->get();
            return view('admin.search.listLH', [
                'title' => 'Tìm Kiếm'
            ])->with('data', $lcs);
        }
    }
}
