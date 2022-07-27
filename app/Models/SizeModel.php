<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductModel;

class SizeModel extends Model
{
    use HasFactory;

    protected $table="table_size";
    public $timestamps= true;
    protected $primaryKey='id';

    protected $fillable = [
        'name', 'status'
      ];

    /**
     * Get the comments for the blog post.
     */
    public function product()
    {
        return $this->hasMany(ProductModel::class, 'size_id', 'id');
    }

    public static function getSize($id)
    {
        return SizeModel::where('id', $id)->first();
    }
}
