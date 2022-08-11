<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Auth;

class UsersController extends Controller
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
        $users = User::where('level', 0)->orderBy('id', 'DESC')->paginate(12); 
        $admin = User::where('level', 1)->orwhere('level', 2)->orderBy('id', 'DESC')->paginate(12); 
        return view('BE.users.list', compact('users', 'admin'));
    }
}
