<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoaDonNhap;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\ChiTietHoaDonNhap;
use App\Models\NhaCungCap;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HoaDonNhapController extends Controller
{
    public function danhSach(){
        $HDN=HoaDonNhap::all();
        
        return view('hoadonnhap.danh_sach',compact('HDN'));
    }
    public function themMoi(){
        $NCC=NhaCungCap::all();
        $SP=SanPham::all();
        return view('hoadonnhap.them_moi',compact('NCC','SP'));
    }
    public function xuLyThemMoi(Request $request){
        dd($request);
        $HDN=new HoaDonNhap();

        $HDN->nha_cung_cap_id=$request->nha_cung_cap_id;

        // Lấy JSON từ session
        $adminDataJson = session()->get('admin_login');
     
        // Chuyển JSON thành một mảng PHP
        $adminData = json_decode($adminDataJson, true);
        
        $HDN->admin_id = $adminData['id'];
        $HDN->ngay_nhap=$request->ngay_nhap;
        $HDN->save();

        return redirect()->route('hoadon.danh_sach');

    }
}



// $tenSPs=DB::table('san_pham')
// ->select('ten')
// ->get();

// foreach($tenSPs as $tensp){
//     if($tensp->ten==$request->ten){
//         $layTruyVanTheoTen=SanPham::where('ten',$request->ten)->first();
//         $layTruyVanTheoTen->so_luong=$layTruyVanTheoTen->so_luong+$request->so_luong;
//         $layTruyVanTheoTen->gia_nhap=$request->gia_nhap;
//         $layTruyVanTheoTen->save();
//         $CTHDN=new ChiTietHoaDonNhap();
//         $CTHDN->ten=$request->ten;
//         $CTHDN->so_luong=$request->so_luong;
//         $CTHDN->gia_nhap=$request->gia_nhap;
//         $CTHDN->hoa_don_nhap_id=$HDN->id;
//         $CTHDN->san_pham_id=$layTruyVanTheoTen->id;
//         $CTHDN->save();        
//         return redirect()->route('sanpham.danh_sach')->with(['messages'=>"sản phẩm đã tồn tại nên đã được cập nhật số lượng thôi"]);
//     }
// }

// // này còn lỗi về Loại Sản Phẩm vì trong 1 Loại Sản Phẩm có nhìu sản phẩm mà nếu cứ tên sản phẩm mà mới thì nó 
// // sẽ tạo ra thêm loại sản phẩm 
// $LSP=new LoaiSanPham();
// $LSP->ten=$request->ten;
// $LSP->save();

// $SP=new SanPham();
// $SP->ten=$request->ten;
// $SP->gia_nhap=$request->gia_nhap;
// $SP->so_luong=$request->so_luong;
// $SP->loai_san_pham_id=$LSP->id;
// $SP->save();

// $CTHDN=new ChiTietHoaDonNhap();
// $CTHDN->ten=$request->ten;
// $CTHDN->so_luong=$request->so_luong;
// $CTHDN->gia_nhap=$request->gia_nhap;
// $CTHDN->hoa_don_nhap_id=$HDN->id;
// $CTHDN->san_pham_id=$SP->id;
// $CTHDN->save();

// return redirect()->route('hoadon.danh_sach');