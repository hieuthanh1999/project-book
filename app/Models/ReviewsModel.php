<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductModel;
use App\Models\User;

class ReviewsModel extends Model
{
    use HasFactory;
    protected $table ='table_reviews';

    public $timestamps = true;
    protected $primaryKey='id';

    protected $fillable = [
        'user_id', 'product_id', 'comment', 'rate'
      ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }
}
