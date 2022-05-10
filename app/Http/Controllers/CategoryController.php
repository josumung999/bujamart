<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add_category() {
        return view('admin.addcategory');
    }

    public function categories() {
        return view('admin.categories');
    }
}
