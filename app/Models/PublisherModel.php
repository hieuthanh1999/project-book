<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductModel;

class PublisherModel extends Model
{
    use HasFactory;


    protected $table="table_publisher";
    public $timestamps= true;
    protected $primaryKey='id';

    protected $fillable = [
        'id', 'name', 'description', 'status'
      ];
    
    /**
     * Get the comments for the blog post.
     */
    public function product()
    {
        return $this->hasMany(ProductModel::class, 'publisher_id', 'id');
    }

    public static function getPublisher($id)
    {
        return PublisherModel::where('id', $id)->first(); 
    }
}
