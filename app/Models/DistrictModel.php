<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class DistrictModel extends Model
{
    use HasFactory;

    protected $table="district";
    public $timestamps= false;
    protected $primaryKey='districtid';
    public $incrementing = false;
    
    protected $fillable = [
        'name', 'provinceid'
      ];

        /**
     * Get the comments for the blog post.
     */
    public function order()
    {
        return $this->hasMany(User::class, 'district_id', 'districtid');
    }
}
