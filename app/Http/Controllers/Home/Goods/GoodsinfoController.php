<?php

namespace App\Http\Controllers\Home\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsinfoController extends Controller
{
    //
    public function index()
    {
        return view('Home.Goods.public');
    }
}
