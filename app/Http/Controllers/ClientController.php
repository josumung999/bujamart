<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Cart;
use App\Mail\SendMail;
use Session;

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

    public function addtocart($id) {
        $product = Product::find($id);

        // Check if there was a previous cart in session
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        // If not create a new instance of the cart object
        $cart = new Cart($oldCart);
        // then add the selected product to the cart
        $cart->add($product, $id);

        // finally put cart in session
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return back();
    }

    public function update_qty(Request $request, $id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->updateQty($id, $request->quantity);
        Session::put('cart', $cart);

        return back();
    }

    public function remove_from_cart($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return back();
    }

    public function cart() {
        if(!Session::has('cart')) {
            return view('client.cart');
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        // If not create a new instance of the cart object
        $cart = new Cart($oldCart);

        return view('client.cart', ['products' => $cart->items]);
    }

    public function checkout() {
        if (!Session::has('client')) {
            return view('client.login');
        }
        return view('client.checkout');
    }

    public function place_order(Request $request) {


        try {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            // If not create a new instance of the cart object
            $cart = new Cart($oldCart);

           $payer_id = time();

            // Get user email from Session
            $client = Session::get('client');

            $order = new Order();
            $order->firstname = $request->input('firstname');
            $order->lastname = $request->input('lastname');
            $order->commune = $request->input('commune');
            $order->address = $request->input('address');
            $order->address_description = $request->input('address_description');
            $order->phone = $request->input('phone');
            $order->client_email = $client['email'];
            $order->cart = serialize($cart);


            Session::put('order', $order);

            $checkoutData = $this->checkoutData();

            $provider = new ExpressCheckout();

            $response = $provider->setExpressCheckout($checkoutData);

            return redirect($response['paypal_link']);


        } catch (Exception $e) {
            return redirect('/checkout')->with("error", $e->getMessage());
        }

    }

    private function checkoutData() {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        // If not create a new instance of the cart object
        $cart = new Cart($oldCart);


        $data['items'] = [];

        foreach($cart->items as $item) {
            $itemDetails = [
                'name' => $item['product_name'],
                'price' => $this->priceInUsd($item['product_price']),
                'qty' => $item['qty'],
            ];

            $data['items'][] = $itemDetails;
        }

        $deliveryFee = 3000;
        $totalInUsd = $this->priceInUsd(Session::get('cart')->totalPrice + $deliveryFee); // Converting BIF to USD

        $checkoutData = [
            'items' => $data['items'],
            'return_url' => url('/payment-success'),
            'cancel_url' => url('/checkout'),
            'invoice_id' => uniqid(),
            'invoice_description' => "Paiement Commande via PayPal",
            'total' => $totalInUsd
        ];


        return $checkoutData;
    }

    private function priceInUsd($bifPrice) {
        $usdRate = 2100;
        return $bifPrice / $usdRate;
    }


    public function payment_success(Request $request) {

        try {
            $token = $request->get('token');
            $payerId = $request->get('PayerId');
            $checkoutData = $this->checkoutData();

            $provider = new ExpressCheckout();
            $response = $provider->getExpressCheckoutDetails($token);
            $response = $provider->doExpressCheckoutPayment($checkoutData, $token, $payerId);

            $payer_id = $payerId.'_'.time();

            Session::get('order')->payer_id = $payer_id; 

            Session::get('order')->save();

            // Sending email to users with order details
            $orders = Order::where('payer_id', $payer_id)->get();

            $orders->transform(function ($order, $key) {
                $order->cart = unserialize($order->cart);

                return $order;
            });

            // Getting the email from session
            $email = $client['email'];

            // Sending the actual Mail
            Mail::to($email)->send(new SendMail($orders));
            

            Session::forget('cart');


            return redirect('/cart')->with('status', 'Votre Paiement a été effectué avec succès!! Nous Vous avons envoyé un email avec les détails de votre commande')->with('type', 'success');
        }
        catch (Exception $e) {
            return redirect('/checkout')->with("error", $e->getMessage());
        }
    }

    public function login() {
        return view('client.login');
    }

    public function signup() {
        return view('client.signup');
    }

    public function create_account(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|unique:clients',
            'password' => 'required|min:4'
        ]);

        $client = new Client();
        $client->email = $request->input('email');
        $client->password = bcrypt($request->input('password'));

        $client->save();
        
        return redirect('/login')->with('status', 'Votre compte utilisateur a été créé! Connectez-vous')->with('type', 'success');
    }

    public function access_account(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|',
            'password' => 'required'
        ]);

        $client = Client::where('email', $request->input('email'))->first();

        if ($client) {
            if (Hash::check($request->input('password'), $client->password)) {
                Session::put('client', $client);

                return redirect('/shop');
            } else {
                return back()->with('status', 'Email ou Mot de passe incorrect')->with('type', 'danger');
            }
        } else {
            return back()->with('status', 'Addresse email non reconnue')->with('type', 'danger');
        }
    }

    public function logout() {
        Session::forget('client');

        return redirect('/');
    }
}
