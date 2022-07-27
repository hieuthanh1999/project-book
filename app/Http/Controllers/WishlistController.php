<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use Cart;
use Session;

class WishlistController extends Controller
{
    public function save_wishlist(Request $request)
    {
        // $id = $request->input('id');
        // $quantity = $request->input('quantity');
        // $product = ProductModel::find($id);
        // $name = $product->name;
        // $image = $product->image;
        // $price = $product->price;
        // $weight = $product->weight;

        // $data = [
        //     'id' => $id,
        //     'qty' => $quantity,
        //     'name' => $name,
        //     'price' => $price,
        //     'weight' => $weight,
        //     'options' => [
        //         'image' => $image,
        //     ],
        // ];
        // Cart::add($data);

        return redirect()->back();
    }
}
