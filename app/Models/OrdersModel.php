<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PaymentsModel;
use App\Models\ShippingFeeModel;
use App\Models\OrderDetailsModel;

class OrdersModel extends Model
{
    use HasFactory;

    protected $table ='table_orders';

    static $limit =12;

    public $timestamps = true;

  
     /**
     * Get the post that owns the comment.
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetailsModel::class, 'order_id', 'id');
    }

    /**
     * Get the post that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the post that owns the comment.
     */
    public function shipping()
    {
        return $this->belongsTo(ShippingFeeModel::class, 'shipping_id', 'id');
    }

    /**
     * Get the post that owns the comment.
     */
    public function payment()
    {
        return $this->belongsTo(PaymentsModel::class, 'payment_id', 'id');
    }

    public static function getCount()
    {
        return OrdersModel::count(); 
    }
}
