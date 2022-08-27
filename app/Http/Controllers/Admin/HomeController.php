<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategoryModel;
use App\Models\User;
use App\Models\ProductModel;
use App\Models\OrdersModel;
use App\Models\OrderDetailsModel;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Charts\CategoryChart;
use App\Charts\OrderStatusChart;

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
    public function index(Request $request)
    {
        $count_user = User::getCount();
        $count_product = ProductModel::getCount();
        $count_order = OrdersModel::getCount();
        $list_product_view = ProductModel::getViewProduct();        
        $list_product_buy = OrderDetailsModel::getProductTopBuy(); 
        $list_product_rate = ProductModel::getProductTopRate();  
        // dd( $list_product_rate);

         // categories chart
         $categories = SubCategoryModel::all();
         $cateLabel = [];
         $cateData = [];
         foreach($categories as $cate){
             $cateLabel[] = $cate->name;
             $cateData[] = $cate->product->count();
         }
         $cateChart = new CategoryChart;
         $cateChart->labels($cateLabel);
         $cateChart->dataset("Số sản phẩm của thể loại",'line', collect($cateData));

      
            // order status chart
        $orderSttChart = new OrderStatusChart;
        $orderSttChart->labels([
            'Đang xử lý đơn hàng',
            'Đang giao hàng',
            'Hoàn thành',
            'Hủy bỏ', 
        ]);
        $orderSttChart->dataset("Thống kê trạng thái đơn hàng", 'bar', collect([
            OrdersModel::where('order_status', 1)->count(),
            OrdersModel::where('order_status', 2)->count(),
            OrdersModel::where('order_status', 3)->count(),
            OrdersModel::where('order_status', 4)->count(),
        ]));




    

        return view('BE.dash_board', compact('count_user', 'count_product', 'count_order', 'list_product_view', 'list_product_buy', 'list_product_rate', 'cateChart', 'orderSttChart'));
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function doanhthu()
    {
       


        $orderSttChart = new OrderStatusChart;
        $orderSttChart->labels([
            'Doanh',
            'Đang giao hàng',
            'Hoàn thành',
            'Hủy bỏ', 
        ]);
        $orderSttChart->dataset("Thống kê trạng thái đơn hàng", 'bar', collect([
            OrdersModel::where('order_status', 1)->count(),
            OrdersModel::where('order_status', 2)->count(),
            OrdersModel::where('order_status', 3)->count(),
            OrdersModel::where('order_status', 4)->count(),
        ]));
               

        return view('BE.doanhthu', compact( 'orderSttChart'));
    }
    

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $bday = $request->bday;
        $kday = $request->kday;
        $order = OrdersModel::whereBetween('created_at',[ $bday, $kday])->orderBy('id', 'DESC')->get();
       
        $data = [];
        $data_price =[];
        foreach($order as $key => $value) {
            array_push($data, date('d-m-Y', strtotime($value->created_at->toDateString())));
            $data_price[] = (int)$value->orderDetails->count();
        }
        $data = implode(',', $data);
        // dd(($data));
        if($bday && $kday) {
            $orderSttChart = new OrderStatusChart;
            $orderSttChart->labels([
                $data
            ]);
            $orderSttChart->dataset("Thống kê trạng thái đơn hàng", 'bar', collect([
                (int)$data_price
            ]));
            return view('BE.doanhthu', compact( 'orderSttChart'));
        }
       
    }
    
}