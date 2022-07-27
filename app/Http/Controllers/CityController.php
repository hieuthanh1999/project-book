<?php

namespace App\Http\Controllers;

use App\Models\DistrictModel;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $cities = DistrictModel::where('provinceid','LIKE', '%' . $request->get('country_id') . '%'  )->pluck('name', 'districtid');
        echo $cities;
        //return response()->json($cities);
    }
}