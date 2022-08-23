<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Redirect;
use Auth;

class CategoryController extends Controller
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
        $values = CategoryModel::orderBy('id', 'DESC')->paginate(12); 
        return view('BE.category.list', compact('values'));
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
            $add = new CategoryModel();
            $add->name = $request->name;
            $add->description = $request->description;
            $add->status = $request->status;
            $add->save();
            session()->flash('save', 'Thêm Thành Công!');
            
            return Redirect::to('admin/category/list');
        }
        else{
            
            // dd($validator);
            return back()->withErrors($validator);

        }
       
    }

    public  function disable_status($id)
    {
        CategoryModel::where('id', $id)->update(['status'=>0]);
        session()->flash('disable_status', 'Tắt trạng thái thành công!');

        return Redirect::to('admin/category/list');
    }

    public  function enable_status($id)
    {
        CategoryModel::where('id', $id)->update(['status'=>1]);
        session()->flash('enable_status', 'Bật trạng thái thành công!');

        return Redirect::to('admin/category/list');
    }

    public function edit(Request $request)
    {
        $value = CategoryModel::where('id',$request->id)->first();

        return view('BE.category.edit', compact('value'));
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
           
            $up= CategoryModel::where('id', $request->id)->first();
            $up->name = $request->name;
            $up->description = $request->description;
            $up->save();

            session()->flash('update', 'cập nhập danh mục thành công!');

            return Redirect::to('admin/category/list');
        }
        else{
            
            // dd($validator);
            return back()->withErrors($validator);

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