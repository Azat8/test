<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function execute(){
        return view('admin.category.index');
    }
}
