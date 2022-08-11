<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductModel;

class DiscountModel extends Model
{
    use HasFactory;

    protected $table="table_discount";
    public $timestamps= true;
    protected $primaryKey='id';

    protected $fillable = [
         'name', 'description', 'price',' status'
      ];

    //  /**
    //  * Get the comments for the blog post.
    //  */
    // public function product()
    // {
    //     return $this->hasMany(ProductModel::class, 'discount_id', 'id');
    // }

}
