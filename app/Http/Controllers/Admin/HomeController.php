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
use App\Charts\OrderChart;
use App\Charts\OrderStatusChart;
use Carbon\Carbon;
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

    public function check()
    {

    
        $prices = ProductModel::orderBy('price', 'DESC')->limit(5)->get();
        $currentYear = Carbon::now()->year;
        $mot = OrdersModel::whereBetween('created_at', [$currentYear.'-1-1 00:00:00', $currentYear.'-1-31 23:59:59'])->sum('subtotal');
        $hai = OrdersModel::whereBetween('created_at', [$currentYear.'-2-1 00:00:00', $currentYear.'-2-30 23:59:59'])->sum('subtotal');
        $ba =OrdersModel::whereBetween('created_at', [$currentYear.'-3-1 00:00:00', $currentYear.'-3-31 23:59:59'])->sum('subtotal');
        $bon =OrdersModel::whereBetween('created_at', [$currentYear.'-4-1 00:00:00', $currentYear.'-4-30 23:59:59'])->sum('subtotal');
        $nam =OrdersModel::whereBetween('created_at', [$currentYear.'-5-1 00:00:00', $currentYear.'-5-31 23:59:59'])->sum('subtotal');
        $sau =OrdersModel::whereBetween('created_at', [$currentYear.'-6-1 00:00:00', $currentYear.'-6-30 23:59:59'])->sum('subtotal');
        $bay =OrdersModel::whereBetween('created_at', [$currentYear.'-7-1 00:00:00', $currentYear.'-7-31 23:59:59'])->sum('subtotal');
        $tam =OrdersModel::whereBetween('created_at', [$currentYear.'-8-1 00:00:00', $currentYear.'-8-31 23:59:59'])->sum('subtotal');
        $chin =OrdersModel::whereBetween('created_at', [$currentYear.'-9-1 00:00:00', $currentYear.'-9-30 23:59:59'])->sum('subtotal');
        $muoi =OrdersModel::whereBetween('created_at', [$currentYear.'-10-1 00:00:00', $currentYear.'-10-31 23:59:59'])->sum('subtotal');
        $muoimot =OrdersModel::whereBetween('created_at', [$currentYear.'-11-1 00:00:00', $currentYear.'-11-30 23:59:59'])->sum('subtotal');
        $muoihai =OrdersModel::whereBetween('created_at', [$currentYear.'-12-1 00:00:00', $currentYear.'-12-31 23:59:59'])->sum('subtotal');
        $total = ["Tháng 1" => $mot,"Tháng 2" => $hai, "Tháng 3" =>$ba,"Tháng 4" => $bon, "Tháng 5" =>$nam, "Tháng 6" =>$sau, "Tháng 7" =>$bay, "Tháng 8" =>$tam, "Tháng 9" =>$chin,"Tháng 10" => $muoi, "Tháng 11" =>$muoimot,"Tháng12" => $muoihai];
        
        $cateLabel = ["Tháng 1","Tháng 2" , "Tháng 3","Tháng 4", "Tháng 5", "Tháng 6","Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng12"];
        $cateData = [$mot,$hai, $ba,$bon, $nam, $sau, $bay, $tam,$chin, $muoi,$muoimot,$muoihai];
        $cateChart = new CategoryChart;
        $cateChart->labels($cateLabel);
        $cateChart->dataset("Số sản phẩm của thể loại",'bar', collect($cateData));
        return $cateChart;
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function doanhthu()
    {    $bday = "";
        $kday = "";
        $cateChart= $this->check();
        return view('BE.doanhthu', compact('cateChart', 'bday', 'kday'));
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
        $cateLabel = [];
         $cateData = [];
        $total =OrdersModel::whereBetween('created_at',[ $bday, $kday])->sum('subtotal');

        // dd(($data));
        if($bday && $kday) {
           
            $data = [];
            $data_price =[];
            foreach($order as $key => $value) {
    
                array_push($data, "'".date('d-m-Y', strtotime($value->created_at->toDateString()))."'");
                $data_price[] = (int)$value->orderDetails->count();
            }
            $data = implode(',', $data);
            // foreach($data as $item){
            //     $cateLabel[] = $item;
            // }
            $cateLabel = ["Từ $bday đến $kday"];
            $cateData = [$total];
            $cateChart = new OrderChart();
            $cateChart->labels($cateLabel);
            $cateChart->dataset("Tổng tiền",'bar', collect($cateData));
            return view('BE.doanhthu', compact( 'cateChart', 'bday', 'kday'));
        }
        else{
            $bday = "";
            $kday = "";
            $cateChart= $this->check();
            return view('BE.doanhthu', compact('cateChart', 'bday', 'kday'));
        }
       
    }
    
}