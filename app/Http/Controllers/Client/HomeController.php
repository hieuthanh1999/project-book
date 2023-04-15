<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use App\Http\Controllers\Client\BasicClass;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\BannerModel;
use App\Models\ProductModel;
use App\Models\AuthorModel;
use App\Models\SizeModel;
use App\Models\PublisherModel;
use App\Models\User;

class HomeController extends Controller
{
    
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            // Lấy danh sách các sản phẩm đã được tìm kiếm nhiều nhất
            $popular_products = DB::table('search_logs')
            ->select('product_id', DB::raw('COUNT(*) as search_count'))
            ->groupBy('product_id')
            ->orderByDesc('search_count')
            ->limit(10)
            ->get();
         
            // Lấy danh sách các sản phẩm liên quan dựa trên sản phẩm được tìm kiếm nhiều nhất
            $related_products = DB::table('search_logs')
            ->whereIn('product_id', $popular_products->pluck('product_id'))
            ->select('product_id', DB::raw('COUNT(*) as search_count'))
            ->groupBy('product_id')
            ->orderByDesc('search_count')
            ->limit(10)
            ->get();
            $recommended_products = $popular_products->merge($related_products)->unique('product_id')->take(10);
            // foreach ($recommended_products as $product) {
            //     // Lấy thông tin sản phẩm từ cơ sở dữ liệu
            //     $product_info = DB::table('table_product')->where('id', $product->product_id)->first();
            
            //     // Hiển thị sản phẩm
            //     dd($product_info);
            // }
            // // dd($recommended_products);
            // die();
        $list_product_new = ProductModel::getAll()->take(5);
        $product_sale = ProductModel::getProductWithDiscount();
        $product_top_view = ProductModel::getProductTopView();
        return BasicClass::handlingView('FE.layout', [
            'list_product_new'=> $list_product_new,
            'product_sale' => $product_sale,
            'product_top_view' => $product_top_view,
            'recommended_products'=> $recommended_products
        ]);
    }

    public function categoryPage($id)
    {
        $products = ProductModel::where('sub_category_id', $id)->get(); 
        $authors = AuthorModel::orderBy('id', 'DESC')->get(); 
        $sub_category_details = SubCategoryModel::getSub($id); 
     
        return BasicClass::handlingView('FE.layouts.category',[
            'products'=> $products, 'sub_category_details' => $sub_category_details, 'authors' => $authors
        ]);
    }

    public function productDetailsPage($id)
    {
        $product_details =  ProductModel::getProduct($id);
        $sizes = SizeModel::getSize($product_details['size_id']);
        $publishers = PublisherModel::getPublisher($product_details['publisher_id']); 
        $authors = AuthorModel::getAuthor($product_details['author_id']); 
        $sub_category_details = SubCategoryModel::getSub($id);
        $list_product = ProductModel::getProductRelated($product_details['author_id'], $product_details['id']);  
        $product_details->increment('view_count');

        // Product Ralated
        $products        =  ProductModel::all();
        $products = json_decode(json_encode($products), true);
        // dd($products)
        $selectedId      = intval($id);
    
        $selectedProduct = $products[0];
     
        $selectedProducts = array_filter($products, function ($product) use ($selectedId) { return $product['id'] === $selectedId; });

        if (count($selectedProducts)) {
            $selectedProduct = $selectedProducts[array_keys($selectedProducts)[0]];
        }
    
        $productSimilarity = new ProductSimilarity($products);
        $similarityMatrix  = $productSimilarity->calculateSimilarityMatrix();
        $products          = $productSimilarity->getProductsSortedBySimularity($selectedId, $similarityMatrix);

        #end
        //return view('FE.layouts.product_details', compact('categorys', 'sub_categorys', 'banners', 'product_details', 'sub_category_details', 'authors', 'sizes', 'publishers'));
        return BasicClass::handlingView('FE.layouts.product_details',[
            'product_details'=> $product_details, 'sizes' => $sizes, 'publishers' => $publishers,
            'sub_category_details'=> $sub_category_details, 'authors'=> $authors, 'list_product' => $list_product,
            'selectedId'=> $selectedId, 'selectedProduct'=> $selectedProduct, 'products' => $products
         ]);
    }

    public function authorDetailsPage($id)
    {
        $author_details = AuthorModel::getAuthor($id); 
        $list_product =  ProductModel::getAllProductByIdAuthor($id);
        $count_book =  $list_product->count();
        $author_details->increment('view_count');
        //return view('FE.layouts.product_details', compact('categorys', 'sub_categorys', 'banners', 'product_details', 'sub_category_details', 'authors', 'sizes', 'publishers'));
        return BasicClass::handlingView('FE.layouts.author_details',[
            'author_details'=> $author_details,
            'list_product' => $list_product,
            'count_book' => $count_book
         ]);
    }
    
}
