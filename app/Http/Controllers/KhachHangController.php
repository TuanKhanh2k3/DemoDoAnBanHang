<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
class KhachHangController extends Controller
{
    public function themMoi()
    {
        $KH = KhachHang::all();
        return view('khachhang.them_moi', compact('KH'));
    }
    public function xuLyThemMoi(Request $request)
    {
        $KH = new KhachHang();

        $KH->ten = $request->ten;
        $KH->dia_chi = $request->dia_chi;
        $KH->email = $request->email;
        $KH->dien_thoai = $request->dien_thoai;
        $KH->save();
        
        return redirect()->route("khachhang.danh_sach");
    }
    public function danhSach()
    {
        $KH = KhachHang::all();
        return view("khachhang.danh_sach",compact('KH'));
    }
    public function capNhat($id)
    {
        
        $KH = KhachHang::find($id);
        return view('khachhang.cap_nhat',compact('KH'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {

        

        $KH = KhachHang::find($id);
        $KH->ten = $request->ten;
        $KH->dia_chi = $request->dia_chi;
        $KH->email = $request->email;
        $KH->dien_thoai = $request->dien_thoai;
        $KH->save();

        
        return redirect()->route("khachhang.danh_sach");
    }

    public function xoa($id)
    { 
        $KH=KhachHang::find($id);
        if(empty($KH))
        {
            return "Sản phẩm không tồn tại";
        }
        $KH->delete();
        return redirect()->route('khachhang.danh_sach');
    }
}
