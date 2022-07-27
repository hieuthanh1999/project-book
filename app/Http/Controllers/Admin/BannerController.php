<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerModel;
use Illuminate\Support\Facades\Redirect;
use Auth;

class BannerController extends Controller
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
        $values = BannerModel::orderBy('id', 'DESC')->paginate(3); 
        return view('BE.banner.list', compact('values'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_create()
    {
        return view('BE.banner.create');
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
            'image' =>'required',
            'status' =>'',
        ], ['required'=>'không được để trống!']);

        $get_img = $request->file('image');
        if($get_img) {

            $get_name = $get_img->getClientOriginalName();
            $name_img = current(explode('.', $get_name));     // $get_img.rand(0, 99)
            $new_img =  $name_img.'.'.$get_img->getClientOriginalExtension();
            $get_img->move('image/banner', $new_img);


            $add = new BannerModel();
            $add->name = $data['name'];
            $add->image = $new_img;
            $add->status = $request->status;
            $add->save();
            session()->flash('save', 'Thêm thành công!');
            return Redirect::to('admin/banner/list');
        }
    }

    public  function disable_status($id)
    {
        BannerModel::where('id', $id)->update(['status'=>0]);
        session()->flash('disable_status', 'Tắt trạng thái thành công!');

        return Redirect::to('admin/banner/list');
    }

    public  function enable_status($id)
    {
        BannerModel::where('id', $id)->update(['status'=>1]);
        session()->flash('enable_status', 'Bật trạng thái thành công!');

        return Redirect::to('admin/banner/list');
    }

    public function edit(Request $request)
    {
        $value = BannerModel::where('id',$request->id)->first();

        return view('BE.banner.edit', compact('value'));
    }
    
    public function update($id, Request $request)
    {
        $data=$request->validate([
            'name'=>'required',
        ], ['required'=>'không được để trống!', 'numeric'=>'Phải nhập số!', 'image'=>"phải là file ảnh"]);
        
        if($request->isMethod('post'))
        {
            $add= BannerModel::where('id', $request->id)->first();
            
            $get_img=$request->file('image');
            if($get_img) {
                $get_name = $get_img->getClientOriginalName();
                $name_img = current(explode('.', $get_name));     // $get_img.rand(0, 99)
                $new_img =  $name_img.'.'.$get_img->getClientOriginalExtension();
                $get_img->move('image/banner', $new_img);
    
            }
    
            $add->name = $data['name'];
            if(isset($get_img)) {
                $add->image = $new_img;
            }

            $add->save();
            session()->flash('update', 'cập nhập thành công!');

            return Redirect::to('admin/banner/list');
        }

    }

    //delete
    public function delete(Request $request)
    {
        BannerModel::where('id', $request->id)->delete();
        session()->flash('delete', 'Xóa tác giả thành công!');
        
        return back();
    }
}
