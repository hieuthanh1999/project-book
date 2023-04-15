<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\OrdersModel;
use App\Models\OrderDetailsModel;
use App\Models\ShippingFeeModel;
use Cart;
use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Client\BasicClass;
use Illuminate\Support\Facades\Auth;
use App\Models\DistrictModel;
use App\Models\ProvinceModel;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controller\Client\CartController;
class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }
     //Hàm xử lý tính tổng giỏ hàng
     public function getTotals($cart_total){
        $cart_totals = 0;
        if(Session::get('coupon')){
            if(Session::get('coupon')['coupon_status'] == 1){
                // $coupon_cart = $coupon['coupon_value'] . ' %';
                $cart_totals = $cart_total - ($cart_total/100 * Session::get('coupon')['coupon_value']);
            }
            else if(Session::get('coupon')['coupon_status'] == 2){
                // $coupon_cart = $coupon['coupon_value'] . ' VNĐ';

                $cart_totals = $cart_total - Session::get('coupon')['coupon_value'];
            }
        }
        else{
            $cart_totals = $cart_total;
        }

        return $cart_totals;
    }
    public function getValues($cart_total){
        $coupon_cart = '';
        if(Session::get('coupon')){
            if(Session::get('coupon')['coupon_status'] == 1){
                $coupon_cart .= number_format(Session::get('coupon')['coupon_value']) . ' %';
                //$cart_totals = $cart_total - ($cart_total/100 * Session::get('coupon')['coupon_value']);
            }
            else if(Session::get('coupon')['coupon_status'] == 2){
                $coupon_cart .= number_format(Session::get('coupon')['coupon_value']) . ' VNĐ';

                //$cart_totals = $cart_total - Session::get('coupon')['coupon_value'];
            }
        }
        return $coupon_cart;
    }
    public function getTotal($cart){
        $cart_total = 0;
        foreach($cart as $key => $val){
            $cart_total += Cart::subTotal();
        }
        return $cart_total;
    }
    public function index(Request $request)
    {

        $arrray  = [];
        foreach (Cart::content() as $row) {
           
            $book = ProductModel::find($row->id);

            if($book->quantity <1){
                $arrray[]  = $row->rowId;
            }
        }
        if(count($arrray)){
            foreach($arrray as $k){
                Cart::remove($k);
      
            }
        }
        if(Cart::count()>0){
            $province_id = $request->input('province');
            // $states = DistrictModel::all();
            $states = DistrictModel::where('provinceid',  Auth::user()->province_id)->get();
            $countries = ProvinceModel::all();
            $fee_price = ShippingFeeModel::getShippingFee($province_id);
            $cart_total = $this->getTotal(Session::get('cart'));
            $total = $this->getTotals($cart_total);
            $valuesCounpons = $this->getValues($cart_total);
            
            return BasicClass::handlingView('FE.order.list', [
                'states' => $states,
                'countries' => $countries,
                'fee_price' => $fee_price,
                'total' => $total,
                'valuesCounpons' => $valuesCounpons
            ]);
        }else{
            session()->flash('het', 'Sản phẩm đã hết hoặc đã bị xóa!');
         
            return back();
        }
       
    }

    public function done()
    {
        return BasicClass::handlingView('FE.order.done');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $states = DistrictModel::where('districtid', $request->district_id)->first();
        $countries = ProvinceModel::where('provinceid', $request->province_id)->first();
        // insert order
        $cart_total = $this->getTotal(Session::get('cart'));
        $order = new OrdersModel;
        $id_user = Auth::user()->id;
        $users = User::where('id',$id_user)->first();
        $order ->user_id = Auth::user()->id;
        $fee = $request->input('fee_price');
        $order->order_status = 1;
        $order->payment_id = 1;
        $order->shipping_address = ($request->order_address).', '.($states->name).', '. ($countries->name);
        $order->phoneReceiver = $request->order_phone;
        $order->nameReceiver = $request->order_name;
        $order->shipping_id = $fee;
        $order->subtotal = $this->getTotals($cart_total);
        if(Session::get('coupon')){
            $order->coupons = $this->getValues($cart_total);
        }
        $order->save();

        foreach (Cart::content() as $row) {

                $book = ProductModel::find($row->id);
                if($book->quantity>0){
                    $book->quantity = ($book->quantity)-($row->qty);
                    $book->save();
    
                    $arrBook[]=$book->book_name;
                    $orderDetail = new OrderDetailsModel;
                    $orderDetail->order_id = $order->id;
                    $orderDetail->product_id = $row->id;
                    $orderDetail->name = $book->name;
                    $orderDetail->image = $book->image;
                    $orderDetail->price = $row->price;
                    $orderDetail->quality = $row->qty;
        
                    $orderDetail->save(); 
                }
                       
        }
        Cart::destroy(); 
        return Redirect::to('thanh-cong');
    }

    function getToken($length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited
    
       for ($i=0; $i < $length; $i++) {
           $token .= $codeAlphabet[random_int(0, $max-1)];
       }
    
       return $token;
   }

     //delete
     public function cancel(Request $request)
     {
         $order = OrdersModel::where('id', $request->id)->first();
         $order->order_status = 4;
         $order->save();
         $order_details= $order->orderDetails;
         foreach($order_details as $item){
            $item->product->quantity += $item->quality;
            $item->product->save();
         }
         return back();
     }
}