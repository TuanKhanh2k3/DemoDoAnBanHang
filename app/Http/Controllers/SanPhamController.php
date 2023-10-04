<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\HinhAnh;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class SanPhamController extends Controller
{
    public function themMoi()
    {

        $SP = SanPham::all();
        $LSP=LoaiSanPham::all();
        return view('sanpham.them_moi', compact('SP','LSP'));
    }
    public function xuLyThemMoi(Request $request)
    {
        $tenSPs=DB::table('san_pham')
        ->select('ten')
        ->get();

        foreach($tenSPs as $tensp){
            if($tensp->ten==$request->ten){
                $layTruyVanTheoTen=SanPham::where('ten',$request->ten)->first();
                $layTruyVanTheoTen->so_luong=$layTruyVanTheoTen->so_luong+$request->so_luong;
                $layTruyVanTheoTen->save();
                return redirect()->route("sanpham.danh_sach")->with(['messages'=>"sản phẩm đã tồn tại nên đã được cập nhật"]);
            }
        }
        $SP = new SanPham();
        $SP->ten = $request->ten;
        $SP->gia_ban = $request->gia_ban;
        $SP->gia_nhap = $request->gia_nhap;
        $SP->so_luong = $request->so_luong;
        $SP->loai_san_pham_id = $request->loai_san_pham_id;
        $SP->mo_ta = $request->mo_ta;
        $SP->save();

        $files=$request->hinh_anh;
        
        foreach($files as $file){
            $HA=new HinhAnh();
            $HA->san_pham_id=$SP->id;
            $path=$file->store('images');
            $HA->duong_dan=$path;
            $HA->Save();
        }
      
        return redirect()->route("sanpham.danh_sach");
    }
    public function danhSach()
    {
        // dd(session()->get('admin_login'));
        $SP = SanPham::all();
        $DSHA=HinhAnh::all();
        return view("sanpham.danh_sach",compact('SP','DSHA'));
    }
    public function danhSachChiTiet($id)
    {
        $SP = SanPham::find($id);
        $DSHA=HinhAnh::where('san_pham_id',$id)->get();
        return view('sanpham.danh_sach_chi_tiet',compact('SP','DSHA'));
    }
    public function capNhat($id)
    {
        
        $SP = SanPham::find($id);
        $LSP = LoaiSanPham::all();
        $DSHA=HinhAnh::where('san_pham_id',$id)->get();
        return view('sanpham.cap_nhat',compact('SP','LSP','DSHA'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        
        $SP = SanPham::find($id);

        $SP->ten = $request->ten;
        $SP->gia_ban = $request->gia_ban;
        $SP->gia_nhap = $request->gia_nhap;
        $SP->so_luong = $request->so_luong;
        $SP->loai_san_pham_id = $request->loai_san_pham_id;
        $SP->mo_ta = $request->mo_ta;
        $SP->save();

        $files=$request->file('hinh_anh');

        if($files==null){
            return redirect()->route("sanpham.danh_sach");
        }
        else{


            // Thêm hình ảnh mới
            $delHA=HinhAnh::where('san_pham_id', $id)->delete();
            foreach ($files as $file) {
                $HA = new HinhAnh();
                $HA->san_pham_id = $id;
                $path = $file->store('images');
                $HA->duong_dan = $path;
                $HA->save();
            }
                    
            return redirect()->route("sanpham.danh_sach");
        }
       
    }

    public function xoa($id)
    { 
        $SP=SanPham::find($id);
        if(empty($SP))
        {
            return "Sản phẩm không tồn tại";
        }
        $SP->delete();
        return redirect()->route('sanpham.danh_sach');
    }
}
