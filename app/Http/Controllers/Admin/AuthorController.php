<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AuthorModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Redirect;
use Auth;

class AuthorController extends Controller
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
        $values = AuthorModel::orderBy('id', 'DESC')->paginate(12); 
        return view('BE.author.list', compact('values'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_create()
    {
        return view('BE.author.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rules = [
            'name' => 'required',
            'author_image' => 'required',
        ];

        $messages = [ 
            'name.required'=> 'Tên không được để trống.',
            'author_image.required'=> 'Hình ảnh không được để trống.',
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);
        $request->flashOnly(['name']);
        if (!$validator->fails())
        {
            
            $get_img = $request->file('author_image');
            if($get_img) {
    
                $get_name = $get_img->getClientOriginalName();
                $name_img = current(explode('.', $get_name));     // $get_img.rand(0, 99)
                $new_img =  $name_img.'.'.$get_img->getClientOriginalExtension();
                $get_img->move('image/author', $new_img);
    
                $add = new AuthorModel();
                $add->name = $request->name;
                $add->author_image = $new_img;
                $add->description = $request->name;
                $add->status = $request->status;
                $add->save();
                session()->flash('save', 'Thêm tác giả thành công!');
                
                return Redirect::to('admin/author/list');
            }
        }
        else{
            // dd($validator);
            return back()->withErrors($validator);

        }
    }

    public  function disable_status($id)
    {
        AuthorModel::where('id', $id)->update(['status'=>0]);
        session()->flash('disable_status', 'Tắt trạng thái thành công!');

        return Redirect::to('admin/author/list');
    }

    public  function enable_status($id)
    {
        AuthorModel::where('id', $id)->update(['status'=>1]);
        session()->flash('enable_status', 'Bật trạng thái thành công!');

        return Redirect::to('admin/author/list');
    }

    public function edit(Request $request)
    {
        $value = AuthorModel::where('id',$request->id)->first();

        return view('BE.author.edit', compact('value'));
    }

    public function update($id, Request $request)
    {

        $rules = [
            'name' => 'required',
        ];

        $messages = [ 
            'name.required'=> 'Tên không được để trống.',
    
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);
        $request->flashOnly(['name']);
        if (!$validator->fails())
        {
            
        if($request->isMethod('post'))
        {
            $get_img=$request->file('author_image');
            if($get_img) {
                $get_name = $get_img->getClientOriginalName();
                $name_img = current(explode('.', $get_name));     // $get_img.rand(0, 99)
                $new_img =  $name_img.'.'.$get_img->getClientOriginalExtension();
                $get_img->move('image/author', $new_img);
    
            }
            $up= AuthorModel::where('id', $request->id)->first();
            if(isset($get_img)) {
                $up->author_image = $new_img;
            }

           
            $up->name = $request->name;
            $up->description = $request->description;
            $up->save();

            session()->flash('update', 'Cập nhập tác giả thành công!');

            return Redirect::to('admin/author/list');
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
            AuthorModel::where('id', $request->id)->delete();
            session()->flash('delete', 'Xóa tác giả thành công!');
        }
       
        
        return back();
    }
}