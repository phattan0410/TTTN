<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HocSinh;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $lcs = HocSinh::all();
        return view('admin.student.list', [
            'title' => 'Danh Sách Học Sinh'
        ])->with('data', $lcs);
    }
}
