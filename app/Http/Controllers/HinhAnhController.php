<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HinhAnh;
use App\Models\SanPham;
class HinhAnhController extends Controller
{
    //
    public function capNhat($id){
        $HA=HinhAnh::find($id);
        
        return view('hinhanh.cap_nhat',compact('HA'));
    }
    public function xuLyCapNhat(Request $request,$id){
        $HA=HinhAnh::find($id);
        $SP=SanPham::where('id',$HA->san_pham_id)->first();
        $files=$request->file('hinh_anh');
        foreach ($files as $file) {
            $path = $file->store('images');
            $HA->duong_dan = $path;
            $HA->save();
        }
        return redirect()->route('sanpham.danh_sach_ct',$SP->id);
    }
    public function xoa($id){
        $HA=HinhAnh::find($id);
        if(empty($HA))
        {
            return "Sản phẩm không tồn tại";
        }
        $HA->delete();
        return redirect()->route('sanpham.danh_sach');
    }
}
