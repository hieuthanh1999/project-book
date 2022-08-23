<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\ShippingFeeModel;

class ProvinceModel extends Model
{
    use HasFactory;

    protected $table="province";
    public $timestamps= false;
    protected $primaryKey='provinceid';
    public $incrementing = false;
    
    protected $fillable = [
       'provinceid', 'name'
      ];
    
          /**
     * Get the comments for the blog post.
     */
    public function user()
    {
        return $this->hasMany(User::class, 'province_id', 'provinceid');
    }

         /**
     * Get the comments for the blog post.
     */
    public function shipping()
    {
        return $this->hasOne(ShippingFeeModel::class, 'provinceid', 'provinceid');
    }
}
