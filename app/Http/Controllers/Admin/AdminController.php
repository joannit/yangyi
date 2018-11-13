<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //

    public function index ()
    {
        // echo 111;
        return view("Admin.index");
    }
}
