<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingFeeModel extends Model
{
    use HasFactory;

    protected $table="table_shipping_fee";
    public $timestamps= true;
    protected $primaryKey='id';

    protected $fillable = [
        'name', 'price'
      ];

}
