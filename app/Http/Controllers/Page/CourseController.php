<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\LopNangKhieu;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $lcs = LopNangKhieu::all();
        return  view('page.course.list')->with('sp', $lcs);
    }
}
