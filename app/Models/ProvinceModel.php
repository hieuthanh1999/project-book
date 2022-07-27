<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvinceModel extends Model
{
    use HasFactory;

    protected $table="province";
    public $timestamps= false;
    protected $primaryKey='provinceid';

    protected $fillable = [
         'provinceid', 'name'
      ];
}
