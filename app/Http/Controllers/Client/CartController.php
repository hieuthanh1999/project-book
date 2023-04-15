<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\CouponsModel;
use Cart;
use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Client\BasicClass;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }

    public function index()
    {
        $coupon_cart = 0;
        if(Session::get('cart')){
            if(Session::get('coupon')){
                $coupon_cart = Session::get('coupon')['coupon_show'];
            }
            else {
                $coupon_cart =  0;
            }

        }
        return BasicClass::handlingView('FE.cart.list', ['coupon_cart' => $coupon_cart]);
    }

    public function save(Request $request)
    {
        $id = $request->input('id');
        $quantity = $request->input('quantity');
        $product = ProductModel::find($id);
        $name = $product->name;
        $image = $product->image;

        if($product->sale && $product->sale > 0){
            $sale = (100-$product->sale)/100;
            $price = $product->price * $sale;
        }else{
            $price = $product->price;
        }
        $weight = $product->weight;

        $data = [
            'id' => $id,
            'qty' => $quantity,
            'name' => $name,
            'price' => $price,
            'weight' => $weight,
            'options' => [
                'image' => $image,
            ],
        ];
        Cart::add($data);

        return redirect()->back();
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);

        return redirect()->back();
    }

    public function update(Request $request, $rowId)
    {
        
        Cart::update($rowId, $request->input('update_qty'));

        return redirect()->back();
    }
     //Hàm xử lý thêm mã giảm giá và check mã giảm giá
     public function addCouponCart(Request $request){

        $id_user = Auth::user()->id;
        $data = CouponsModel::where('coupon_code', $request->coupon_code)->first();
        $checkUse = CouponsModel::where('coupon_code', $request->coupon_code)->where('user_id', $id_user)->first();
       
        $today = Carbon::today('Asia/Ho_Chi_Minh');
        
        $cart_total = $this->getTotal(Session::get('cart'));
        
        $result = [];

        if($data){
            if($data->coupon_status != 3){
                if(!$checkUse){
                    if($today < $data->coupon_expiry){
                        if($data->coupon_status == 1){
                            $coupon_value = [
                                'coupon_status' => $data->coupon_status,
                                'coupon_value' => $data->coupon_value,
                                'coupon_id' => $data->coupon_id,
                                'coupon_show' => number_format($data->coupon_value) . ' %',
                            ];
                            Session::put('coupon', $coupon_value);
                        }
                        else{
                            $coupon_value = [
                                'coupon_status' => $data->coupon_status,
                                'coupon_value' => $data->coupon_value,
                                'coupon_id' => $data->coupon_id,
                                'coupon_show' => number_format($data->coupon_value) . ' VNĐ',
                            ];
                            Session::put('coupon', $coupon_value);
                        }
                        //Tính lại tổng khi add mã
                        $cart_totals = $this->getTotals($cart_total);

                        $result = ['Bạn đã áp dụng thành công mã '. $data->coupon_name, $data->coupon_value, $cart_totals, Session::get('coupon')['coupon_show'], $data->coupon_code];
                    }
                    else{
                        Session::forget('coupon');
                        $result = ['Mã giảm giá đã hết hạn', 0, $cart_total, 0];
                    }
                }
                else{
                    Session::forget('coupon');
                    $result = ['Bạn đã dùng mã giảm giá này rồi', 0, $cart_total, 0];
                }
            }
            else{
                Session::forget('coupon');
                $result = ['Mã giảm giá đã hết', 0, $cart_total, 0];
            }
        }
        else{
            Session::forget('coupon');
            $result = ['Mã giảm giá không tồn tại', 0, $cart_total, 0];
        }

        return $result;
    }
     //Hàm xử lý tính tổng theo sản phẩmgiỏ hàng
     public function getTotal($cart){
        $cart_total = 0;
        foreach($cart as $key => $val){
            $cart_total += Cart::subTotal();
        }
        return $cart_total;
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
}

