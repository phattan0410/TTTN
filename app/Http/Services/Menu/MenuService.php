<?php
namespace App\Http\Services\Menu;

use Exception;
use Illuminate\Support\Facades\Session;
use App\Models\Nhasanxuat;

class MenuService{
    public function getAll(){
        return Nhasanxuat::orderbyDesc('id')->paginate(10);
    }
    public function create($request){
        try{
            Nhasanxuat::create([
                'ma_nsx'=>'',
                'ten_nsx'=>(string) $request->input('ten'),
                'tru_so'=>(string) $request->input('tru_so'),
            ]);
            Session::flash('success','Thêm thành công');
        }
        catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
    return true;
    }
    public function destroy($request){
        Session::put('delete_error','Xóa không thành công');
        $id=(int) $request->input('id');
        $menu=Nhasanxuat::where('id',$request->input('id'))->first();
        // $menu_son=DB:
        if(isset($menu)){
            return Nhasanxuat::where('id',$id)->delete();
        }
        else{
        }
        return false;
    }
    public function update($request,$nsx){
        $nsx->ten_nsx = (string)$request->input('ten');
        $nsx->tru_so = (string)$request->input('tru_so');
        $nsx->save();
        Session::flash('success','Cập nhật thành công');
        return true;
    }
}