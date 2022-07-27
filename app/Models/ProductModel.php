<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategoryModel;
use App\Models\AuthorModel;
use App\Models\PublisherModel;
use App\Models\SizeModel;
use App\Models\DiscountModel;

class ProductModel extends Model
{
    use HasFactory;

    protected $table="table_product";
    public $timestamps= true;
    protected $primaryKey='id';
    
    /**
     * Get the post that owns the comment.
     */
    public function subCategory()
    {
        return $this->belongsTo(SubCategoryModel::class, 'sub_category_id', 'id');
    }

    /**
     * Get the post that owns the comment.
     */
    public function authorModel()
    {
        return $this->belongsTo(AuthorModel::class, 'author_id', 'id');
    }

    /**
     * Get the post that owns the comment.
     */
    public function publisherModel()
    {
        return $this->belongsTo(PublisherModel::class, 'publisher_id', 'id');
    }

    /**
     * Get the post that owns the comment.
     */
    public function discountModel()
    {
        return $this->belongsTo(DiscountModel::class, 'discount_id', 'id');
    }

     /**
     * Get the post that owns the comment.
     */
    public function sizeModel()
    {
        return $this->belongsTo(SizeModel::class, 'size_id', 'id');
    }

    public static function getAll()
    {
        return  ProductModel::where('status', 1)->orderBy('id', 'DESC')->get(); 
    }

    public static function getProduct($id)
    {
        return  ProductModel::where('id', $id)->first(); 
    }

    public static function getProductRelated($author_id, $id)
    {
        return  ProductModel::where('author_id', $author_id)->where('id', '!=', $id)->get(); 
    }

    public static function getAllProductByIdAuthor($author_id)
    {
        return  ProductModel::where('author_id', $author_id)->get(); 
    }
}
