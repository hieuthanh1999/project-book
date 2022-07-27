<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictModel extends Model
{
    use HasFactory;

    protected $table="district";
    public $timestamps= false;
    protected $primaryKey='districtid';

    protected $fillable = [
         'districtid', 'name', 'provinceid'
      ];

}
