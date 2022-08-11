<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\AuthorModel;
use Cart;
use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Client\BasicClass;

class AuthorController extends Controller
{
    public function index()
    {
        return BasicClass::handlingView('FE.author.list',
        [ 
            'authors' => AuthorModel::getAll(),
        ]);
    }

}
