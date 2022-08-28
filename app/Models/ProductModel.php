<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategoryModel;
use App\Models\AuthorModel;
use App\Models\PublisherModel;
use App\Models\SizeModel;
use App\Models\DiscountModel;
use App\Models\WishListModel;
use App\Models\OrderDetailsModel;
use App\Models\ReviewsModel;
use Illuminate\Support\Facades\DB;

class ProductModel extends Model
{
    use HasFactory;

    protected $table="table_product";
    public $timestamps= true;
    protected $primaryKey='id';
    
    public function wishlists()
    {
        return $this->hasMany(WishListModel::class, 'product_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(ReviewsModel::class, 'product_id');
    }


     /**
     * Get the post that owns the comment.
     */
    public function orderDetais()
    {
        return $this->hasMany(OrderDetailsModel::class, 'product_id', 'id');
    }

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
    public function author()
    {
        return $this->belongsTo(AuthorModel::class, 'author_id', 'id');
    }

    /**
     * Get the post that owns the comment.
     */
    public function publisher()
    {
        return $this->belongsTo(PublisherModel::class, 'publisher_id', 'id');
    }

    // /**
    //  * Get the post that owns the comment.
    //  */
    // public function discountModel()
    // {
    //     return $this->belongsTo(DiscountModel::class, 'discount_id', 'id');
    // }

   

    public static function getAll()
    {
        return  ProductModel::orderBy('id', 'DESC')->get(); 
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
    
    public static function getCount()
    {
        return ProductModel::count(); 
    }

    public static function getViewProduct()
    {
        return ProductModel::orderBy('view_count', 'DESC')->get(); 
    }

    public static function getProductWithDiscount()
    {
        $sale =  ProductModel::orderBy('sale','desc')->first();
        if($sale->sale){
            return $sale;
        }

    }

    public static function getProductTopView()
    {
        return ProductModel::orderBy('view_count', 'DESC')->take(10)->get(); 
    }

    public static function getProductTopRate()
    {
        // $rate = ReviewsModel::orderBy('id', 'DESC')->with('product')->get();
        // return ProductModel::orderBy('id', 'DESC')->with('reviews')->avg('rate')->take(10)->get(); 
    }

    public static function checkWishList($id, $user_id)
    {
        $check = WishListModel::where('product_id', $id)->where('user_id',  $user_id)->count();
        if($check > 0){
            // $record =  WishListModel::where('product_id', $id)->where('user_id',  $user_id)->first();
            return True;
        }
        return False; 
    }

    public static function getIdWishList($id, $user_id)
    {
        $check = WishListModel::where('product_id', $id)->where('user_id',  $user_id)->first();
      
        return $check; 
    }


}