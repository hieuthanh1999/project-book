<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SizeModel;
use Illuminate\Support\Facades\Redirect;
use Auth;

class SizeController extends Controller
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
        $values = SizeModel::orderBy('id', 'DESC')->paginate(12); 
        return view('BE.size.list', compact('values'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_create()
    {
        return view('BE.size.create');
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
            'status' =>'',
        ], ['required'=>'không được để trống!']);

        $add = new SizeModel();
        $add->name = $data['name'];
        $add->status = $request->status;
        $add->save();
        session()->flash('save', 'Thêm kích thước thành công!');
        
        return Redirect::to('admin/size/list');
    }

    public  function disable_status($id)
    {
        SizeModel::where('id', $id)->update(['status'=>0]);
        session()->flash('disable_status', 'Tắt trạng thái thành công!');

        return Redirect::to('admin/size/list');
    }

    public  function enable_status($id)
    {
        SizeModel::where('id', $id)->update(['status'=>1]);
        session()->flash('enable_status', 'Bật trạng thái thành công!');

        return Redirect::to('admin/size/list');
    }

    public function edit(Request $request)
    {
        $value = SizeModel::where('id',$request->id)->first();

        return view('BE.size.edit', compact('value'));
    }

    public function update($id, Request $request)
    {
        $data=$request->validate([
            'name'=>'required',
            'status' =>'',
        ], ['required'=>'không được để trống!']);
        
        if($request->isMethod('post'))
        {
            $up= SizeModel::where('id', $request->id)->first();
            $up->name = $request->name;
            $up->save();

            session()->flash('update', 'Cập nhập kích thước thành công!');

            return Redirect::to('admin/size/list');
        }

    }

    //delete
    public function delete(Request $request)
    {
        SizeModel::where('id', $request->id)->delete();
        session()->flash('delete', 'Xóa kích thước Thành Công!');
        
        return back();
    }
}
