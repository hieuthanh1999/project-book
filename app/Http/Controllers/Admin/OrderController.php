<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrdersModel;
use App\Models\OrderDetailsModel;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Models\CouponsModel;
use App\Mail\SendMail;
use Mail;
use Carbon\Carbon;
class OrderController extends Controller
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
        $order = OrdersModel::orderBy('id', 'DESC')->paginate(12); 
        return view('BE.order.list', compact('order'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {

        $orders = OrdersModel::findOrFail($id); 
        $order_detail = OrderDetailsModel::where('order_id', $orders->id)->get(); 
        return view('BE.order.details', compact('orders', 'order_detail'));
    }


         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_create()
    {
        // $sub_categories = SubCategoryModel::all();
        // $size = SizeModel::orderBy('id', 'DESC')->where('status', 1)->get();
        // $author = AuthorModel::orderBy('id', 'DESC')->where('status', 1)->get();
        // $publisher = PublisherModel::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('BE.order.create', );
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = OrdersModel::findOrFail($id);
        if($request->input('order_status') == 3 && $order->subtotal >= 500000){
            $datenow = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $randomRecord = CouponsModel::inRandomOrder()->Where('coupon_expiry', '>=', $datenow)->first();
            if($randomRecord != null){
                $data = [
                    'name' => $order->nameReceiver,
                    'coupon_code' => $randomRecord->coupon_code,
                    'coupon_values' => $randomRecord->coupon_value,
                    'coupon_expiry' =>  $randomRecord->coupon_expiry,
                    'coupon_status' =>  $randomRecord->coupon_status,
                    'Email'=>$order->user->email,
                ];
                Mail::to($order->user->email)->send(new SendMail($data));
            }
           
        }
        $order->order_status = $request->input('order_status');
        $order->save();

        return redirect()->back();
    }

     //delete
     public function delete(Request $request)
     {
         OrdersModel::where('id', $request->id)->delete();
         session()->flash('delete', 'Xóa thành công!');
         
         return back();
     }

     
}
