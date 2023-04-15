<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\AuthorModel;
use App\Models\SearchLog;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function getSearch(Request $request)
    {
        return view('searchajax');
    }


    function getSearchAjax(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = ProductModel::where('name', 'LIKE', "%{$query}%")->get();
            if(isset($data)){
                foreach ($data as $item) {
                    $searchLog = new SearchLog;
                    
                    $searchLog->product_id = $item->id; // Không có sản phẩm liên quan trong trường hợp tìm kiếm từ khóa
                    $searchLog->keyword = $request->get('query');
                    $searchLog->save();
                }
        
            }
            $output = '<ul class="dropdown-menu" style="display:block;">';
            if(!empty($data)){
                foreach($data as $row)
                {
                   $output .= '
                   <li><a href="/chi-tiet-sach-'. $row->id .'">'.$row->name.'</a></li>
                   ';
               }
            }else{
                    $output .= '<li><a>Không có dữ liệu</a></li>';
               
            }
          
           $output .= '</ul>';
           echo $output;
       }
    }
}