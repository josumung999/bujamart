<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    public function addproduct() {
        $categories = Category::All()->pluck('category_name');

        return view('admin.addproduct')->with('categories', $categories);
    }

    public function saveproduct(Request $request) {
        $this->validate($request, [
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'product_category' => 'required',
            'product_image' => 'image|nullable|1999',
        ]);

        print($request->input('product_category'));
    }

    public function products() {
        return view('admin.products');
    }
}
