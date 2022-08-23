<?php

namespace App\Http\Controllers;

use App\Models\DistrictModel;
use App\Models\ProductModel;
use App\Models\User;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $cities = DistrictModel::where('provinceid','LIKE', '%' . $request->get('country_id') . '%'  )->pluck('name', 'districtid', 'provinceid');
        echo $cities;

        //return response()->json($cities);
    }

    public function dataProduct(request $request){
        $data = [];


        if($request->has('q')){
            $search = $request->q;
            $data = ProductModel::select('id', 'name')->where('name','LIKE',"%$search%")->get();

        }else{
            $data = ProductModel::select('id', 'name')->get();
        }

     return response()->json($data);
       
    }


    public function dataAjax(request $request){
        $data = [];


        if($request->has('q')){
            $search = $request->q;
            $data = User::select('id', 'name', 'email')->where('name','LIKE',"%$search%")->orwhere('email','LIKE',"%$search%")
            		->get();

        }else{
            $data = User::select('id', 'name', 'email')->get();
        }

     return response()->json($data);
    }
    


    public function info(request $request){


        $value = User::findOrFail($request->get('id_user'))->first();
        $data[] = [
            'address'=> $value->address,
            'district_id'=>  $value->district->name,
            'email'=>  $value->email,
            'id'=>  $value->id,
            'name'=>  $value->name,
            'phone'=>  $value->phone,
            'province_id'=>  $value->province->name

        ];
        return response()->json($data);
       
    }

    public function getProduct(request $request){


        $value = ProductModel::where('id',$request->get('id_product'))->first();
        if(isset($value)){
            $data2[] = [
                'code'=> $value->code,
                'id'=> $value->id,
                'image'=> app('url')->asset("image/product/".$value->image),
                'name'=> $value->author->name,
                'price'=> number_format($value->price).' '.'VND',
                'quantity'=> 1,
            ];
            return response()->json($data2);
        }
       
       
    }
    
}