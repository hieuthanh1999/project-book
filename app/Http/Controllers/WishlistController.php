<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use Cart;
use Session;
use App\Models\WishListModel;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }
    
    public function save(Request $request)
    {
        WishListModel::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->input('id'),
        ]);

        return redirect()->back();
    }

    public function delete($id)
    {
        $wish = WishListModel::findOrFail($id);
        $wish->delete();

        return redirect()->back();
    }
}
