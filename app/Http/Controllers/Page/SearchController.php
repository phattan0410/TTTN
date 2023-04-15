<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    
    public function search(Request $request){
        $content=$request->search;
        $sp=DB::table('sanphams')->where('ten_sp',$content)->orderby('id_sp','desc')->get();
        return view('page.search.list',[
            'title'=>'Chí Duy Mobile',
        ])->with('sp',$sp);
    }
}
