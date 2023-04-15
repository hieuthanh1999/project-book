<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductModel;

class CouponsModel extends Model
{
    use HasFactory;

    protected $table="coupons";
    public $timestamps= true;
    protected $primaryKey='coupon_id';

    protected $fillable = [
        'coupon_name', 'coupon_code', 'coupon_value', 'coupon_status', 'coupon_expiry', 'user_id'
      ];

    /**
     * Get the comments for the blog post.
     */
    // public function product()
    // {
    //     return $this->hasMany(ProductModel::class, 'author_id', 'id');
    // }
}
