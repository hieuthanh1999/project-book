<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrdersModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\DB;


class OrderDetailsModel extends Model
{
    use HasFactory;

    protected $table ='order_details';

    public $timestamps = false;

        /**
 * Get the post that owns the comment.
 */
    public function order()
    {
        return $this->belongsTo(OrdersModel::class, 'order_id', 'id');
    }

    /**
     * Get the post that owns the comment.
     */
    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id', 'id');
    }

    public static function getProductTopBuy()
    {
        return OrderDetailsModel::distinct()->orderBy('product_id', 'desc')->take(10)->get(['product_id']);
    }

    public static function getProductCount($id)
    {
        return OrderDetailsModel::where('product_id', $id)->count();
    }
}
