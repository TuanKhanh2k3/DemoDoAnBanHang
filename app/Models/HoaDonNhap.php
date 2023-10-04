<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonNhap extends Model
{
    use HasFactory;
    protected $table="hoa_don_nhap";

    public function nha_cung_cap(){
        return $this->belongsTo(NhaCungCap::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
