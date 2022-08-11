<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrdersModel;

class PaymentsModel extends Model
{
    use HasFactory;

    protected $table ='table_payments';

    public $timestamps = true;

      /**
   * Get the comments for the blog post.
   */
  public function order()
  {
      return $this->hasMany(OrdersModel::class, 'payment_id', 'id');
  }
}
