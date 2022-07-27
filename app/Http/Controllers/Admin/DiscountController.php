<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiscountModel;
use Illuminate\Support\Facades\Redirect;
use Auth;

class DiscountController extends Controller
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
        $values = DiscountModel::orderBy('id', 'DESC')->paginate(12); 
        return view('BE.discount.list', compact('values'));
    }

       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_create()
    {
        return view('BE.discount.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dump($request);
        $data=$request->validate([
            'name'=>'required',
            'price'=>'required|numeric',
            'description' =>'',
            'status' =>'',
        ], ['required'=>'không được để trống!', 'numeric'=>'Phải nhập số!']);
        $add = new DiscountModel();
        $add->name = $data['name'];
        $add->price = ($data['price']);
        $add->description = $data['description'];
        $add->status = $request->status;
        $add->save();
        session()->flash('save', 'Thêm Thành Công!');
        
        return Redirect::to('admin/discount/list');
    }

    public  function disable_status($id)
    {
        DiscountModel::where('id', $id)->update(['status'=>0]);
        session()->flash('disable_status', 'Tắt trạng thái thành công!');

        return Redirect::to('admin/discount/list');
    }

    public  function enable_status($id)
    {
        DiscountModel::where('id', $id)->update(['status'=>1]);
        session()->flash('enable_status', 'Bật trạng thái thành công!');

        return Redirect::to('admin/discount/list');
    }

    public function edit(Request $request)
    {
        $value = DiscountModel::where('id',$request->id)->first();

        return view('BE.discount.edit', compact('value'));
    }

    public function update($id, Request $request)
    {
        $data=$request->validate([
            'name'=>'required',
            'price'=>'required|numeric',
            'description' =>'',
            'status' =>'',
        ], ['required'=>'không được để trống!', 'numeric'=>'Phải nhập số!']);
        
        if($request->isMethod('post'))
        {
            $up= DiscountModel::where('id', $request->id)->first();
            $up->name = $request->name;
            $up->price = ($request->price);;
            $up->description = $request->description;
            $up->save();

            session()->flash('update', 'Cập nhập thành công!');

            return Redirect::to('admin/discount/list');
        }

    }

    //delete
    public function delete(Request $request)
    {
        DiscountModel::where('id', $request->id)->delete();
        session()->flash('delete', 'Xóa Thành Công!');
        
        return back();
    }
}
