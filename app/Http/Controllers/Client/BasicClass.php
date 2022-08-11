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
use App\Models\DistrictModel;
use App\Models\ProvinceModel;
use App\Models\User;

class BasicClass extends Controller
{
    static public $categorys      =array();
    static public $sub_categorys =array();
    static public $banners    =array();
    static public $authors_all    =array();
    static public $states    =array();
    static public $countries    =array();
    static public $admin    =array();


    public function __construct()
    {
        BasicClass::$categorys = CategoryModel::getAll(); 
        BasicClass::$sub_categorys = SubCategoryModel::getAll(); 
        BasicClass::$banners = BannerModel::getAll(); 
        BasicClass::$authors_all = AuthorModel::getAll(); 
        BasicClass::$states = DistrictModel::all();
        BasicClass::$countries = ProvinceModel::all();
        BasicClass::$admin =  User::getAdmin();
    }

    public static function handlingView($viewLayout='FE.layout',$arrayValue=array())
    {
        $arrayDefault=[
                        'categorys'        => BasicClass::$categorys,
                        'sub_categorys'   => BasicClass::$sub_categorys,
                        'banners'      => BasicClass::$banners,
                        'authors_all'      => BasicClass::$authors_all,
                        'states'      => BasicClass::$states,
                        'countries'      => BasicClass::$countries,
                        'admin'      => BasicClass::$admin,
                    ];  
        return view($viewLayout,array_merge($arrayDefault,$arrayValue));
    }
}

new BasicClass();
