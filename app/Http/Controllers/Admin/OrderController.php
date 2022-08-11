<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrdersModel;
use App\Models\OrderDetailsModel;
use Illuminate\Support\Facades\Redirect;
use Auth;
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
        return view('BE.order.details', compact('orders'));
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
        $order->order_status = $request->input('order_status');
        $order->save();

        return redirect()->back();
    }
}
