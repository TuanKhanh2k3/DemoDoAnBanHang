<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChiTietHoaDonNhap;
use App\Models\HoaDonNhap;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ChiTietHoaDonNhapController extends Controller
{
    //
    public function danhSach(){
        $CTHDN=ChiTietHoaDonNhap::all();
        return view('chitiethoadonnhap.danh_sach',compact('CTHDN'));
    }
  
}
