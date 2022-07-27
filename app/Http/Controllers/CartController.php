<?php

namespace App\Http\Controllers;
use App\Models\ProductModel;
use Cart;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $id = $request->input('id');
        $quantity = $request->input('quantity');
        $product = ProductModel::find($id);
        $name = $product->name;
        $image = $product->image;
        $price = $product->price;
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
}
