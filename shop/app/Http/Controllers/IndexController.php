<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Page;
class IndexController extends Controller
{
    public function execute(Request $request){

        $product = Product::all();
        $category = Category::all();
        $page =  Page::all()->find(1);
        return view('layouts.site');

    }
}
