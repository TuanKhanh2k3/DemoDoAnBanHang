<?php

namespace App\Models;
//Xóa Mềm Trong DataBase
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    
    use HasFactory;
    use SoftDeletes;
    protected $table="san_pham";

    public function loai_san_pham(){
        return $this->belongsTo(LoaiSanPham::class);
    }
    
}
