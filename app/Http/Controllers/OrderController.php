<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function orders() {
        $orders = Order::All();

        $orders->transform(function ($order, $key) {
            $order->cart = unserialize($order->cart);

            return $order;
        });

        return view('admin.orders')->with('orders', $orders);
    }
}
