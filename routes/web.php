<?php
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\HinhAnhController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\HoaDonNhapController;
use App\Http\Controllers\ChiTietHoaDonNhapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//route Login
Route::get('/login/dang_nhap',[AdminController::class,'login'])->name('login.dang_nhap');
Route::post('/login/dang_nhap',[AdminController::class,'xulylogin'])->name('login.xulylogin');
Route::get('/login/logout',[AdminController::class,'logout'])->name('login.logout');
Route::get('/login/danh_sach',[AdminController::class,'danhSach'])->name('login.danhSach')->middleware('check.admin.login');
Route::get('login/them_moi',[AdminController::class,'themMoi'])->name('login.themMoi')->middleware('check.admin.login');
Route::post('login/them_moi',[AdminController::class,'xuLyThemMoi'])->name('login.sulythem_moi')->middleware('check.admin.login');
Route::get('login/cap_nhat/{id}',[AdminController::class,'capNhat'])->name('login.cap_nhat')->middleware('check.admin.login');
Route::post('login/cap_nhat/{id}',[AdminController::class,'xuLyCapNhat'])->name('login.xuLyCap_Nhat')->middleware('check.admin.login');


//route Sản Phẩm
Route::get('/',[SanPhamController::class,'danhSach'])->name('sanpham.danh_sach')->middleware('check.admin.login');
Route::get('SanPham/danh_sach_chi_tiet/{id}',[SanPhamController::class,'danhSachChiTiet'])->name('sanpham.danh_sach_ct')->middleware('check.admin.login');
Route::get('SanPham/them_moi',[SanPhamController::class,'themMoi'])->name('sanpham.them_moi')->middleware('check.admin.login');
Route::post('SanPham/them_moi',[SanPhamController::class,'xuLyThemMoi'])->name('sanpham.sulythem_moi')->middleware('check.admin.login');
Route::get('SanPham/cap_nhat/{id}',[SanPhamController::class,'capNhat'])->name('sanpham.cap_nhat')->middleware('check.admin.login');
Route::post('SanPham/cap_nhat/{id}',[SanPhamController::class,'xuLyCapNhat'])->name('sanpham.xuLyCap_Nhat')->middleware('check.admin.login');
Route::get('SanPham/xoa/{id}',[SanPhamController::class,'xoa'])->name('sanpham.xoa')->middleware('check.admin.login');

//route Loại Sản Phẩm
Route::get('LoaiSanPham/danh_dach',[LoaiSanPhamController::class,'danhSach'])->name('loaisanpham.danh_sach')->middleware('check.admin.login');
Route::get('LoaiSanPham/them_moi',[LoaiSanPhamController::class,'themMoi'])->name('loaisanpham.them_moi')->middleware('check.admin.login');
Route::post('LoaiSanPham/them_moi',[LoaiSanPhamController::class,'xuLyThemMoi'])->name('loaisanpham.sulythem_moi')->middleware('check.admin.login');
Route::get('LoaiSanPham/cap_nhat/{id}',[LoaiSanPhamController::class,'capNhat'])->name('loaisanpham.cap_nhat')->middleware('check.admin.login');
Route::post('LoaiSanPham/cap_nhat/{id}',[LoaiSanPhamController::class,'xuLyCapNhat'])->name('loaisanpham.xuLyCap_Nhat')->middleware('check.admin.login');
Route::get('LoaiSanPham/xoa/{id}',[LoaiSanPhamController::class,'xoa'])->name('loaisanpham.xoa')->middleware('check.admin.login');

//route Hình Ảnh
Route::get('HinhAnh/cap_nhat/{id}',[HinhAnhController::class,'capNhat'])->name('hinhanh.cap_nhat')->middleware('check.admin.login');
Route::post('HinhAnh/cap_nhat/{id}',[HinhAnhController::class,'xuLyCapNhat'])->name('hinhanh.xuLyCap_Nhat')->middleware('check.admin.login');
Route::get('HinhAnh/xoa/{id}',[HinhAnhController::class,'xoa'])->name('hinhanh.xoa')->middleware('check.admin.login');

//route Khách Hàng
Route::get('KhachHang/danh_sach',[KhachHangController::class,'danhSach'])->name('khachhang.danh_sach')->middleware('check.admin.login');
Route::get('KhachHang/them_moi',[KhachHangController::class,'themMoi'])->name('khachhang.them_moi')->middleware('check.admin.login');
Route::post('KhachHang/them_moi',[KhachHangController::class,'xuLyThemMoi'])->name('khachhang.sulythem_moi')->middleware('check.admin.login');
Route::get('KhachHang/cap_nhat/{id}',[KhachHangController::class,'capNhat'])->name('khachhang.cap_nhat')->middleware('check.admin.login');
Route::post('KhachHang/cap_nhat/{id}',[KhachHangController::class,'xuLyCapNhat'])->name('khachhang.xuLyCap_Nhat')->middleware('check.admin.login');
Route::get('KhachHang/xoa/{id}',[KhachHangController::class,'xoa'])->name('khachhang.xoa')->middleware('check.admin.login');

//route Hóa Đơn Nhập
Route::get('HoaDonNhap/danh_sach',[HoaDonNhapController::class,'danhSach'])->name('hoadon.danh_sach')->middleware('check.admin.login');
Route::get('HoaDonNhap/them_moi',[HoaDonNhapController::class,'themMoi'])->name('hoadon.them_moi')->middleware('check.admin.login');
Route::post('HoaDonNhap/them_moi',[HoaDonNhapController::class,'xuLyThemMoi'])->name('hoadon.sulythem_moi')->middleware('check.admin.login');

//route Chi Tiết Hóa Đơn Nhập
Route::get('ChiTietHoaDonNhap/danh_sach',[ChiTietHoaDonNhapController::class,'danhSach'])->name('chitiethoadon.danh_sach')->middleware('check.admin.login');
Route::get('ChiTietHoaDonNhap/them_moi',[ChiTietHoaDonNhapController::class,'themMoi'])->name('chitiethoadon.them_moi')->middleware('check.admin.login');
