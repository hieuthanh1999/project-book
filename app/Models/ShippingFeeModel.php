<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrdersModel;

class ShippingFeeModel extends Model
{
    use HasFactory;

    protected $table="table_shipping_fee";
    public $timestamps= true;
    protected $primaryKey='id';

    protected $fillable = [
        'name', 'price'
      ];

    public static function getShippingFee($id)
    {
      return ShippingFeeModel::where('provinceid', 'LIKE', '%' . $id . '%')->first(); 
    }

  /**
   * Get the comments for the blog post.
   */
    public function order()
    {
        return $this->hasMany(OrdersModel::class, 'shipping_id', 'id');
    }
}
