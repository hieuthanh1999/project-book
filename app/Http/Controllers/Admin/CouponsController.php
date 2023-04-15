<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CouponsModel;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Admin\Coupons\CouponRequest;
use Auth;

class CouponsController extends Controller
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
        $values = CouponsModel::orderBy('coupon_id', 'DESC')->paginate(12); 
        return view('BE.coupon.list', compact('values'));
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_create()
    {   
        $province = CouponsModel::all();
        return view('BE.coupon.create', compact('province'));
    }
    
    public function store(CouponRequest $request){
        $data = new CouponsModel();

        $data->coupon_name = $request->coupon_name;
        $data->coupon_code = $request->coupon_code;
        $data->coupon_value = $request->coupon_value;
        $data->coupon_status = $request->coupon_status;
        $data->coupon_expiry = $request->coupon_expiry;

        if($data->save()){
            session()->flash('save', 'Thêm thành công!');
        
            return Redirect::to('admin/coupons/list');
        }
        else{
            return redirect('admin/coupons/create')->with('msgError', 'Thêm Mã Giảm Giá Thất Bại');
        }
    }

     //Form sửa mã giảm giá
     public function edit($id){
        $data = CouponsModel::find($id);

        return view('Be.coupon.edit', ['data' => $data]);
    }

    //Cập nhật mã giảm giá
    public function update(CouponRequest $request, $id){
        $data = CouponsModel::find($id);

        $data->coupon_name = $request->coupon_name;
        $data->coupon_code = $request->coupon_code;
        $data->coupon_value = $request->coupon_value;
        $data->coupon_status = $request->coupon_status;
        $data->coupon_expiry = $request->coupon_expiry;

        if($data->save()){
            session()->flash('update', 'Cập nhập thành công!');
        
            return Redirect::to('admin/coupons/list');
        }
        else{
            return redirect()->back()->with('msgError', 'Sửa Mã Giảm Giá Thất Bại');
        }
    }


       //delete
       public function delete(Request $request)
       {
           CategoryModel::where('id', $request->id)->delete();
           session()->flash('delete', 'Xóa danh mục Thành Công!');
           
           return back();
       }
}