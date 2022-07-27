<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class SubCategoryModel extends Model
{
    use HasFactory;

    protected $table="table_sub_category";
    public $timestamps= true;
    protected $primaryKey='id';

    protected $fillable = [
        'id', 'category_id' ,'name', 'description', 'status'
      ];

    /**
     * Get the post that owns the comment.
     */
    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id', 'id');
    }

    /**
     * Get the comments for the blog post.
     */
    public function product()
    {
        return $this->hasMany(ProductModel::class, 'sub_category_id', 'id');
    }

    public static function getAll()
    {
        return SubCategoryModel::where('status', 1)->orderBy('id', 'DESC')->get(); 
    }

    public static function getSub()
    {
        return SubCategoryModel::where('status', 1)->first(); 
    }
}
