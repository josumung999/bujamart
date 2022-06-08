<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Category;

class ClientController extends Controller
{
    public function home() {
        $sliders = Slider::All()->where('status', 1);
        $products = Product::All()->where('status', 1);

        return view('client.home')->with('sliders', $sliders)->with('products', $products); 
    }

    public function shop() {
        $categories = Category::All();
        $products = Product::All()->where('status', 1);

        return view('client.shop')->with('products', $products)->with('categories', $categories);
    }

    public function cart() {
        return view('client.cart');
    }

    public function checkout() {
        return view('client.checkout');
    }

    public function login() {
        return view('client.login');
    }

    public function signup() {
        return view('client.signup');
    }
}
