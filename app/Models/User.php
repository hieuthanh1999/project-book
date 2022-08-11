<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\WishListModel;
use App\Models\OrdersModel;
use App\Models\ProvinceModel;
use App\Models\DistrictModel;
use App\Models\ReviewsModel;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */ 
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
        'level',
        'province_id',
        'district_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wishlist()
    {
        return $this->hasMany(WishListModel::class);
    }

      /**
     * Get the comments for the blog post.
     */
    public function order()
    {
        return $this->hasMany(OrdersModel::class, 'user_id', 'id');
    }

    public function province()
    {
        return $this->belongsTo(ProvinceModel::class, 'province_id');
    }

    public function district()
    {
        return $this->belongsTo(DistrictModel::class, 'district_id');
    }

    public static function getCount()
    {
        return User::where('level', 0)->count(); 
    }

    public static function getAdmin()
    {
        return User::where('level', 2)->limit(1)->first(); 
    }


    public function reviews()
    {
        return $this->hasMany(ReviewsModel::class, 'user_id');
    }
}
