<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategoryModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Redirect;
use Auth;

class SubCategoryController extends Controller
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
        $categorys = CategoryModel::all(); 
        $values = SubCategoryModel::orderBy('id', 'DESC')->paginate(12); 
        return view('BE.sub_category.list', compact('values', 'categorys'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_create()
    {
        $category = CategoryModel::orderBy('id', 'DESC')->where('status', 1)->get(); 
        return view('BE.sub_category.create', compact('category'));
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
            'name.required'=> 'Tên thể loại không được để trống.'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);
        $request->flashOnly(['name', 'description',]);
        
        if (!$validator->fails())
        {
            $add = new SubCategoryModel();
            $add->category_id =  $request->category_id;
            $add->name =  $request->name;
            $add->description =  $request->description;
            $add->status = $request->status;
            $add->save();
            session()->flash('save', 'Thêm thể loại thành công!');

            return Redirect::to('admin/sub-category/list');
        }
        else{
            
            // dd($validator);
            return back()->withErrors($validator);

        }
    }

    public  function disable_status($id)
    {
        SubCategoryModel::where('id', $id)->update(['status'=>0]);
        session()->flash('disable_status', 'Tắt trạng thái thành công!');

        return Redirect::to('admin/sub-category/list');
    }

    public  function enable_status($id)
    {
        SubCategoryModel::where('id', $id)->update(['status'=>1]);
        session()->flash('enable_status', 'Bật trạng thái thành công!');

        return Redirect::to('admin/sub-category/list');
    }

    public function edit(Request $request)
    {
        $value = SubCategoryModel::where('id',$request->id)->first();
        $categorys = CategoryModel::orderBy('id', 'DESC')->where('status', 1)->get(); 

        return view('BE.sub_category.edit', compact('value', 'categorys'));
    }

    public function update($id, Request $request)
    {

        $rules = [
            'name' => 'required'
        ];

        $messages = [ 
            'name.required'=> 'Tên thể loại không được để trống.'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);
        $request->flashOnly(['name', 'description',]);
        
        if (!$validator->fails())
        {
            if($request->isMethod('post'))
            {
                $up= SubCategoryModel::where('id', $request->id)->first();
               
                $up->name = $request->name;
                $up->category_id = (int)$request->category_id;
                $up->description = $request->description;
               
                $up->save();
    
                session()->flash('update', 'Cập nhập thể loại thành công!');
    
                return Redirect::to('admin/sub-category/list');
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
            SubCategoryModel::where('id', $request->id)->delete();
            session()->flash('delete', 'Xóa thể loại thành công!');
        }
          
        return back();
     }
}
