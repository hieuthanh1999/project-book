<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchLog extends Model
{
    use HasFactory;
    protected $table = 'search_logs'; // Tên bảng trong CSDL

    protected $fillable = ['user_id', 'product_id', 'keyword']; // Các trường có thể gán
}
