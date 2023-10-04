<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
class LoaiSanPhamController extends Controller
{
    public function themMoi()
    {
        $LSP=LoaiSanPham::all();
        return view('loaisanpham.them_moi', compact('LSP'));
    }
    public function xuLyThemMoi(Request $request)
    {
        $LSP = new LoaiSanPham();
        $LSP->ten = $request->ten;
        $LSP->save();
        return redirect()->route('loaisanpham.danh_sach')->with(['thong_bao'=>"Thêm Mới Thành Công"]);
    }
    public function danhSach()
    {
        $LSP = LoaiSanPham::all();
        return view('loaisanpham.danh_sach',compact('LSP'));
    }
    public function capNhat($id)
    {
        
        $LSP = LoaiSanPham::find($id);
        return view('loaisanpham.cap_nhat',compact('LSP'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        $LSP = LoaiSanPham::find($id);
        $LSP->ten = $request->ten;
        $LSP->save();
        return redirect()->route('loaisanpham.danh_sach');
    }

    public function xoa($id)
    { 
        $LSP=LoaiSanPham::find($id);
        if(empty($LSP))
        {
            return "Sản phẩm không tồn tại";
        }
        $LSP->delete();
        return redirect()->route('loaisanpham.danh_sach');
    }
}
