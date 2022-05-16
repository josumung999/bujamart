<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addproduct() {
        return view('admin.addproduct');
    }
}
