<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    use HasFactory;

    protected $table="table_banners";
    public $timestamps= true;
    protected $primaryKey='id';

    protected $fillable = [
        'name', 'image', 'status'
      ];

    public static function getAll()
    {
        return BannerModel::where('status', 1)->orderBy('id', 'DESC')->get(); 
    }
}
