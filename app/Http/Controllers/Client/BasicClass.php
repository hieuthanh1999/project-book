<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\BannerModel;
use App\Models\ProductModel;
use App\Models\AuthorModel;
use App\Models\SizeModel;
use App\Models\PublisherModel;

class BasicClass extends Controller
{
    static public $categorys      =array();
    static public $sub_categorys =array();
    static public $banners    =array();
    static public $authors_all    =array();


    public function __construct()
    {
        BasicClass::$categorys = CategoryModel::getAll(); 
        BasicClass::$sub_categorys = SubCategoryModel::getAll(); 
        BasicClass::$banners = BannerModel::getAll(); 
        BasicClass::$authors_all = AuthorModel::getAll(); 

    }

    public static function handlingView($viewLayout='FE.layout',$arrayValue=array())
    {
        $arrayDefault=[
                        'categorys'        => BasicClass::$categorys,
                        'sub_categorys'   => BasicClass::$sub_categorys,
                        'banners'      => BasicClass::$banners,
                        'authors_all'      => BasicClass::$authors_all,
                    ];  
        return view($viewLayout,array_merge($arrayDefault,$arrayValue));
    }
}

new BasicClass();
