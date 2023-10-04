<?php

namespace App\Models;

//Xóa Mềm Trong DataBase
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="khach_hang";
}
