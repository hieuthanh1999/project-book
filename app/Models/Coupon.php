<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table="coupons_table";
    public $timestamps= true;
    protected $primaryKey='id';
    protected $fillable = ['code', 'value', 'expires_at'];

    public static function findByCode($code)
    {
        return static::where('code', $code)->first();
    }

    public function isValid()
    {
        return !$this->expires_at || $this->expires_at->isFuture();
    }
}
