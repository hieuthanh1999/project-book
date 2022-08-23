<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\User;
use App\Models\ProductModel;
use App\Models\OrdersModel;
use App\Models\OrderDetailsModel;
use Illuminate\Support\Facades\Redirect;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('level');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_user = User::getCount();
        $count_product = ProductModel::getCount();
        $count_order = OrdersModel::getCount();
        $list_product_view = ProductModel::getViewProduct();        
        $list_product_buy = OrderDetailsModel::getProductTopBuy(); 
        $list_product_rate = ProductModel::getProductTopRate();  
        // dd( $list_product_rate);

        //  // categories chart
        //  $categories = CategoryModel::where('parent_id', null)->get();
        //  $cateLabel = [];
        //  $cateData = [];
        //  foreach($categories as $cate){
        //      $cateLabel[] = $cate->cate_name;
        //      $cateData[] = $cate->children->count();
        //  }
        //  $cateChart = new CategoryChart;
        //  $cateChart->labels($cateLabel);
        //  $cateChart->dataset(trans('admin.chart.category_con'), 'line', collect($cateData));

         

        return view('BE.dash_board', compact('count_user', 'count_product', 'count_order', 'list_product_view', 'list_product_buy', 'list_product_rate'));
    }
}
