<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\ProductModel;

class WishListModel extends Model
{
    use HasFactory;

    protected $table="table_wishlists";
    public $timestamps= true;
    protected $primaryKey='wish_id';

    protected $fillable = [
        'user_id', 'product_id'
      ];

    public static function getAllWithUser($id_user)
    {
        return  WishListModel::where('user_id', 1)->orderBy('id', 'DESC')->get(); 
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }
}
