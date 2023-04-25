<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Cart;
use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Client\BasicClass;
use App\Models\WishListModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $wish = User::findOrFail($user_id);
        return BasicClass::handlingView('FE.users.details', ['wish' => $wish]);
    }

    public function update()
    {
        $user_id = Auth::user()->id;
        $wish = User::findOrFail($user_id);
        return BasicClass::handlingView('FE.users.update', ['wish' => $wish]);
    }
    public function updateUser($id, Request $request)
    {
    
        $user_id = Auth::user()->id;
        $wish = User::findOrFail($user_id);
        $wish->name = $request->name;
        $wish->email = $request->email;
        $wish->phone = $request->phone;
        $wish->province_id = $request->province_id;
        $wish->district_id = $request->district_id;
        $wish->address = $request->address;
        $wish->save();
        return BasicClass::handlingView('FE.users.details', ['wish' => $wish]);
    }
    
    public function order()
    {
        $user_id = Auth::user()->id;
        $wish = User::findOrFail($user_id);
        return BasicClass::handlingView('FE.users.order', ['wish' => $wish]);
    }

    public function wishlist()
    {
        $user_id = Auth::user()->id;
        $wish = User::findOrFail($user_id);
        return BasicClass::handlingView('FE.users.wishlist', ['wish' => $wish]);
    }
}
