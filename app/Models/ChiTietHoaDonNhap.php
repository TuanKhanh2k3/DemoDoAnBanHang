<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonNhap extends Model
{
    use HasFactory;
    protected $table="chi_tiet_hoa_don_nhap";

    public function hoa_don_nhap(){
        return $this->belongsTo(HoaDonNhap::class);
    }
    public function san_pham(){
        return $this->belongsTo(SanPham::class);
    }
}
