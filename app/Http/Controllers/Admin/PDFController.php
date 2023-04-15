<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrdersModel;
use App\Models\OrderDetailsModel;
use App\Models\UserModel;
use PDF;

class PDFController extends Controller
{
    public function __construct()
    {
        $this->middleware('level');
    }
    //
    public function generatePDF($id){
        // $dataOrder = OrdersModel::find($id);
        // $dataOrderdetail = OrderDetailsModel::where('order_id', $dataOrder->id)->get();
        $orders = OrdersModel::findOrFail($id); 
        $order_detail = OrderDetailsModel::where('order_id', $orders->id)->get(); 
        $data = [
            'orders' => $orders,
            'order_detail' => $order_detail
        ];

        $pdf = PDF::loadView('BE.pdf.orderpdf', $data);
    
        // return $pdf->download('orderpdf.pdf');
        return $pdf->stream();
    }
}
