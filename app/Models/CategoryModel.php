<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategoryModel;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table="table_category";
    public $timestamps= true;
    protected $primaryKey='id';

    protected $fillable = [
        'id', 'name', 'description', 'status'
      ];

    /**
     * Get the comments for the blog post.
     */
    public function subCategory()
    {
        return $this->hasMany(SubCategoryModel::class, 'category_id', 'id');
    }

    public static function getAll()
    {
        return CategoryModel::orderBy('id', 'DESC')->get()->take(4);
    }
}