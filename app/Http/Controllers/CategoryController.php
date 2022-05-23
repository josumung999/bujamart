<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function add_category() {
        return view('admin.addcategory');
    }

    public function savecategory(Request $request) {
        $this->validate($request, ['category_name' => 'required|unique:categories']);

        $category = new Category();
        $category->category_name = $request->input('category_name');
        $category->save();
     
        return back()->with('status', 'La catégorie a été créée avec succès');
    }

    public function categories() {
        return view('admin.categories');
    }

}
