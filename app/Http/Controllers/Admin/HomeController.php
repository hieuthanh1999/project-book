<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\User;
use App\Models\ProductModel;
use App\Models\OrdersModel;
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
        return view('BE.dash_board', compact('count_user', 'count_product', 'count_order', 'list_product_view'));
    }
}
