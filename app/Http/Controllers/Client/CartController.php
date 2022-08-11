<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Cart;
use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Client\BasicClass;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }

    public function index()
    {
        return BasicClass::handlingView('FE.cart.list');
    }

    public function save(Request $request)
    {
        $id = $request->input('id');
        $quantity = $request->input('quantity');
        $product = ProductModel::find($id);
        $name = $product->name;
        $image = $product->image;

        if($product->sale && $product->sale > 0){
            $sale = (100-$product->sale)/100;
            $price = $product->price * $sale;
        }else{
            $price = $product->price;
        }
        $weight = $product->weight;

        $data = [
            'id' => $id,
            'qty' => $quantity,
            'name' => $name,
            'price' => $price,
            'weight' => $weight,
            'options' => [
                'image' => $image,
            ],
        ];
        Cart::add($data);

        return redirect()->back();
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);

        return redirect()->back();
    }

    public function update(Request $request, $rowId)
    {
        
        Cart::update($rowId, $request->input('update_qty'));

        return redirect()->back();
    }
}

