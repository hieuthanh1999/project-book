<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrdersModel;
use App\Models\ProvinceModel;

class ShippingFeeModel extends Model
{
    use HasFactory;

    protected $table="table_shipping_fee";
    public $timestamps= true;
    protected $primaryKey='id';

    protected $fillable = [
        'provinceid', 'name', 'price'
      ];

    public static function getShippingFee($id=null)
    {
      $noithanh = ShippingFeeModel::where('id', '=', 4)->first();
      if($id == $noithanh->provinceid){
        return $noithanh; 
      }else{
        return ShippingFeeModel::where('provinceid', '0')->first(); 
      }
    }

    
    public function province()
    {
        return $this->belongsTo(ProvinceModel::class, 'provinceid', 'provinceid');
    }


  /**
   * Get the comments for the blog post.
   */
    public function order()
    {
        return $this->hasMany(OrdersModel::class, 'shipping_id', 'id');
    }
}
