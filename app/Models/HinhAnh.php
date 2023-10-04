<?php

namespace App\Models;
//Xóa Mềm Trong DataBase
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="hinh_anh";
}
