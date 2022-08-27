<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingFeeModel;
use App\Models\DistrictModel;
use App\Models\ProvinceModel;
use Illuminate\Support\Facades\Redirect;
use Auth;

class ShippingFeeController extends Controller
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
        $values = ShippingFeeModel::orderBy('id', 'DESC')->paginate(12); 
        $province = ProvinceModel::all();
        return view('BE.shippingfree.list', compact('values'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_create()
    {   
        $province = ProvinceModel::all();
        return view('BE.shippingfree.create', compact('province'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      
        // dump($request);
        $data = $request->validate([
            'name'=>'required',
            'price' =>'required|numeric',
            'provinceid' =>'',
        ], ['required'=>'không được để trống!', 'numeric'=>'Phải nhập số!']);
        $add = new ShippingFeeModel();
        $add->provinceid =  $request->provinceid;
        $add->name = $data['name'];
        $add->price = $data['price'];  
        $add->save();
        session()->flash('save', 'Thêm thành công!');
        
        return Redirect::to('admin/shipping-fee/list');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
      
        // dump($request);
        $data = $request->validate([
            'name'=>'required',
            'price' =>'required|numeric',
        ], ['required'=>'không được để trống!', 'numeric'=>'Phải nhập số!']);
        $up= ShippingFeeModel::where('id', $request->id)->first();
        $up->name = $data['name'];
        $up->price = $data['price'];  
        $up->save();
        session()->flash('save', 'Cập nhập thành công!');
        
        return Redirect::to('admin/shipping-fee/list');
    }

    public function edit(Request $request)
    {
        $value = ShippingFeeModel::where('id',$request->id)->first();
        $province = ProvinceModel::all();
        return view('BE.shippingfree.edit', compact('value', 'province'));
    }

     //delete
     public function delete(Request $request)
     {
        ShippingFeeModel::where('id', $request->id)->delete();
        session()->flash('delete', 'Xóa kích thước Thành Công!');
         
        return back();
     }
}
