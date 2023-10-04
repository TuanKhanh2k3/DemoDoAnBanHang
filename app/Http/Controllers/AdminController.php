<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
class AdminController extends Controller
{
    //
    public function login(){
        return view('login.dang_nhap');
    }
    public function xulylogin(Request $request){

        $AD=Admin::where('ten_dang_nhap',$request->ten_dang_nhap)->where('mat_khau',$request->mat_khau)->first();
        if(empty($AD)){
            #Đăng Nhập Thất Bại
                return redirect()->route('login.dang_nhap')->with(['messages'=>'Tên Đăng Nhập Hoặc Mật Khẩu Sai']);
            }
        
        # Đánh dấu trạng thái đăng nhập của admin ->Lưu thông tin của admin vào session
        session(['admin_login'=>$AD]);
       
        #đăng nhập thành công
        return redirect()->route('hoadon.danh_sach')->with(['messages'=>'đăng nhập thành công']);
    }
    public function logout(){
       #Xóa dữ liệu admin_login khỏi session
       session()->forget('admin_login');
       return redirect()->route('login.dang_nhap');
    }
    public function danhSach(){
        $AD=Admin::all();
        return view('login.danh_sach',compact('AD'));
    }
    public function themMoi(){
        return view('login.them_moi');
    }
    public function xuLyThemMoi(Request $request){
        $AD=new Admin();
        $AD->ten_dang_nhap=$request->ten_dang_nhap;
        $AD->mat_khau=$request->mat_khau;
        $AD->save();

        return redirect()->route('login.danhSach')->with(['thong_bao'=>"thêm mới thành công"]);
    }
    public function capNhat($id){
        $AD=admin::find($id);
        return view('login.cap_nhat',compact('AD'));
    }
    public function xuLyCapNhat(Request $request,$id){
        $AD=admin::find($id);
        $AD->ten_dang_nhap=$request->ten_dang_nhap;
        $AD->mat_khau=$request->mat_khau;
        $AD->save();
        return redirect()->route('login.danhSach')->with(['thong_bao'=>"cập nhật thành công"]);
    }
}
