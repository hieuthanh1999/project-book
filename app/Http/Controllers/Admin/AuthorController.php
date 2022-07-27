<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AuthorModel;
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
        // dump($request);
        $data=$request->validate([
            'name'=>'required',
            'author_image' =>'required',
            'description' =>'',
            'status' =>'',
        ], ['required'=>'không được để trống!']);

        $get_img = $request->file('author_image');
        if($get_img) {

            $get_name = $get_img->getClientOriginalName();
            $name_img = current(explode('.', $get_name));     // $get_img.rand(0, 99)
            $new_img =  $name_img.'.'.$get_img->getClientOriginalExtension();
            $get_img->move('image/author', $new_img);

            $add = new AuthorModel();
            $add->name = $data['name'];
            $add->author_image = $new_img;
            $add->description = $data['description'];
            $add->status = $request->status;
            $add->save();
            session()->flash('save', 'Thêm tác giả thành công!');
            
            return Redirect::to('admin/author/list');
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
         // dump($request);
         $data=$request->validate([
            'name'=>'required',
            'description' =>'',
            'status' =>'',
        ], ['required'=>'không được để trống!']);
        
        if($request->isMethod('post'))
        {
            $up= AuthorModel::where('id', $request->id)->first();
            $up->name = $request->name;
            $up->description = $request->description;
            $up->save();

            session()->flash('update', 'Cập nhập tác giả thành công!');

            return Redirect::to('admin/author/list');
        }

    }

    //delete
    public function delete(Request $request)
    {
        AuthorModel::where('id', $request->id)->delete();
        session()->flash('delete', 'Xóa tác giả thành công!');
        
        return back();
    }
}
