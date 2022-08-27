<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PublisherModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Redirect;
use Auth;

class PublisherController extends Controller
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
        $values = PublisherModel::orderBy('id', 'DESC')->paginate(12); 
        return view('BE.publisher.list', compact('values'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_create()
    {
        return view('BE.publisher.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $rules = [
            'name' => 'required'
        ];

        $messages = [ 
            'name.required'=> 'Tên danh mục không được để trống.'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);
        $request->flashOnly(['name', 'description',]);
        
        if (!$validator->fails())
        {
            $add = new PublisherModel();
            $add->name = $request->name;
            $add->description =$request->description;
            $add->status = $request->status;
            $add->save();
            session()->flash('save', 'Thêm nhà xuất bản thành công!');
            
            return Redirect::to('admin/publisher/list');
        }
        else{
            
            // dd($validator);
            return back()->withErrors($validator);

        }
      
    }

    public  function disable_status($id)
    {
        PublisherModel::where('id', $id)->update(['status'=>0]);
        session()->flash('disable_status', 'Tắt trạng thái thành công!');

        return Redirect::to('admin/publisher/list');
    }

    public  function enable_status($id)
    {
        PublisherModel::where('id', $id)->update(['status'=>1]);
        session()->flash('enable_status', 'Bật trạng thái thành công!');

        return Redirect::to('admin/publisher/list');
    }

    public function edit(Request $request)
    {
        $value = PublisherModel::where('id',$request->id)->first();

        return view('BE.publisher.edit', compact('value'));
    }

    public function update($id, Request $request)
    {
        $rules = [
            'name' => 'required'
        ];

        $messages = [ 
            'name.required'=> 'Tên danh mục không được để trống.'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);
        $request->flashOnly(['name', 'description',]);
        
        if (!$validator->fails())
        {
            if($request->isMethod('post'))
            {
                $up= PublisherModel::where('id', $request->id)->first();
                $up->name = $request->name;
                $up->description = $request->description;
                $up->save();
    
                session()->flash('update', 'Cập nhập nhà xuất bản thành công!');
    
                return Redirect::to('admin/publisher/list');
            }
        }
        else{
            
            // dd($validator);
            return back()->withErrors($validator);

        }
        

    }

       //delete
       public function delete(Request $request)
       {
           
           $check = ProductModel::where('sub_category_id',$request->id)->count();
           if($check>0){
               session()->flash('rangbuoc', 'Bạn cần xóa sản phẩm trước!');
           }else{
                PublisherModel::where('id', $request->id)->delete();
                session()->flash('delete', 'Xóa nhà xuất bản thành công!');
           }
           return back();
       }
}