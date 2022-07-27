<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategoryModel;
use App\Models\ProductModel;
use App\Models\SizeModel;
use App\Models\AuthorModel;
use App\Models\PublisherModel;
use App\Models\DiscountModel;
use Illuminate\Support\Facades\Redirect;
use Auth;

class ProductController extends Controller
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
        $size = SizeModel::all(); 
        $author = AuthorModel::all(); 
        $sub_categorys = SubCategoryModel::all(); 
        $publisher = PublisherModel::all(); 
        $values = ProductModel::orderBy('id', 'DESC')->paginate(10); 
        return view('BE.product.list', compact('values', 'size', 'author', 'sub_categorys', 'publisher'));
    }

         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_create()
    {
        $sub_categories = SubCategoryModel::all();
        $size = SizeModel::orderBy('id', 'DESC')->where('status', 1)->get();
        $author = AuthorModel::orderBy('id', 'DESC')->where('status', 1)->get();
        $publisher = PublisherModel::orderBy('id', 'DESC')->where('status', 1)->get();
        $discount = DiscountModel::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('BE.product.create', compact('sub_categories', 'size', 'author', 'publisher', 'discount'));
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
            'sub_category_id'=>'required',
            'code'=>'required',
            'name'=>'required',
            'price'=>'required|numeric',
            'quantity_page'=>'required|numeric',
            'quantity'=>'required|numeric',
            'image' =>'required|image',
            'short_description'=>'',
            'long_description'=>'',
            'author_id'=>'required',
            'publisher_id'=>'required',
            'size_id'=>'required',
            'weight'=>'required|numeric',
            'discount_id'=>'',
            'status' =>'',
        ], ['required'=>'không được để trống!', 'numeric'=>'Phải nhập số!', 'image'=>"phải là file ảnh"]);
        
        $get_img=$request->file('image');
        if($get_img) {

            $add = new ProductModel();

            $get_name = $get_img->getClientOriginalName();
            $name_img = current(explode('.', $get_name));     // $get_img.rand(0, 99)
            $new_img =  $name_img.'.'.$get_img->getClientOriginalExtension();
            $get_img->move('image/product', $new_img);


            $add->code = $data['code'];
            $add->sub_category_id = $request->sub_category_id;
            $add->author_id = $request->author_id;
            $add->publisher_id = $request->publisher_id;
            $add->size_id = $request->size_id;
            $add->discount_id = $request->discount_id;
            $add->name = $data['name'];
            $add->short_description = $data['short_description'];
            $add->long_description = $data['long_description'];
            $add->quantity = $data['quantity'];
            $add->price = $data['price'];
            $add->image = $new_img;
            $add->quantity_page = $data['quantity_page'];
            $add->weight = $data['weight'];
            $add->status =  $request->status;

            $add->save();
            session()->flash('save', 'Thêm Thành Công!');
        
            return Redirect::to('admin/product/list');
        }
    }

    public function edit(Request $request)
    {
        $values = ProductModel::where('id',$request->id)->first();
        $sub_categories = SubCategoryModel::orderBy('id', 'DESC')->where('status', 1)->get();
        $size = SizeModel::orderBy('id', 'DESC')->where('status', 1)->get();
        $author = AuthorModel::orderBy('id', 'DESC')->where('status', 1)->get();
        $publisher = PublisherModel::orderBy('id', 'DESC')->where('status', 1)->get();
        $discount = DiscountModel::orderBy('id', 'DESC')->where('status', 1)->get();

        return view('BE.product.edit', compact('values' ,'sub_categories', 'size', 'author', 'publisher', 'discount'));
    }

    public function update($id, Request $request)
    {
        $data=$request->validate([
            'sub_category_id'=>'required',
            'code'=>'required',
            'name'=>'required',
            'quantity_page'=>'required|numeric',
            'quantity'=>'required|numeric',
            'short_description'=>'',
            'long_description'=>'',
            'author_id'=>'required',
            'publisher_id'=>'required',
            'size_id'=>'required',
            'weight'=>'required|numeric',
            'discount_id'=>'',
        ], ['required'=>'không được để trống!', 'numeric'=>'Phải nhập số!', 'image'=>"phải là file ảnh"]);
        
        if($request->isMethod('post'))
        {
            $add= ProductModel::where('id', $request->id)->first();
            
            $get_img=$request->file('image');
            if($get_img) {
                $get_name = $get_img->getClientOriginalName();
                $name_img = current(explode('.', $get_name));     // $get_img.rand(0, 99)
                $new_img =  $name_img.'.'.$get_img->getClientOriginalExtension();
                $get_img->move('image/product', $new_img);
    
            }
            $add->code = $data['code'];
            $add->sub_category_id = $request->sub_category_id;
            $add->author_id = $request->author_id;
            $add->publisher_id = $request->publisher_id;
            $add->size_id = $request->size_id;
            $add->discount_id = $request->discount_id;
            $add->name = $data['name'];
            $add->short_description = $data['short_description'];
            $add->long_description = $data['long_description'];
            $add->quantity = $data['quantity'];
            $add->price = $request->price;
            if(isset($get_img)) {
                $add->image = $new_img;
            }
            $add->quantity_page = $data['quantity_page'];
            $add->weight = $data['weight'];

            $add->save();
            session()->flash('update', 'cập nhập danh mục thành công!');

            return Redirect::to('admin/product/list');
        }

    }

    public  function disable_status($id)
    {
        ProductModel::where('id', $id)->update(['status'=>0]);
        session()->flash('disable_status', 'Tắt trạng thái thành công!');

        return Redirect::to('admin/product/list');
    }

    public  function enable_status($id)
    {
        ProductModel::where('id', $id)->update(['status'=>1]);
        session()->flash('enable_status', 'Bật trạng thái thành công!');

        return Redirect::to('admin/product/list');
    }

    //delete
    public function delete(Request $request)
    {
        ProductModel::where('id', $request->id)->delete();
        session()->flash('delete', 'Xóa tác giả thành công!');
        
        return back();
    }
    
}
