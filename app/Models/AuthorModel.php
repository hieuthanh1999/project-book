<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductModel;

class AuthorModel extends Model
{
    use HasFactory;

    protected $table="table_author";
    public $timestamps= true;
    protected $primaryKey='id';

    protected $fillable = [
        'name', 'description', 'status'
      ];

    /**
     * Get the comments for the blog post.
     */
    public function product()
    {
        return $this->hasMany(ProductModel::class, 'author_id', 'id');
    }

    public static function getAuthor($id)
    {
        return AuthorModel::where('id', $id)->first(); 
    }

    public static function getAll()
    {
        return AuthorModel::orderBy('id', 'DESC')->get();
    }
}
