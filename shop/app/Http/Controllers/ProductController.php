<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function execute(){
        return view('admin.product.index');
    }
}
