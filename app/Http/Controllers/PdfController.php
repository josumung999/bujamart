<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Order;

class PdfController extends Controller
{
    

    public function view_pdf($id) {
        Session::put('id', $id);


        try {
            $pdf = \App::make('dompdf.wrapper')->setPaper('a4', 'landscape');
            $pdf->loadHTML($this->convert_orders_data_to_html());

            return $pdf->stream();
        } 
        catch(Exception $e) {
            return redirect('/orders')->with('error', $e->getMessage());
        }
    }

    public function convert_orders_data_to_html() {
        $orders = Order::where('id', Session::get('id'))->get();


        foreach($orders as $order) {
            $fullname = $order->firstname.' '.$order->lastname;
            $fulladdress = $order->address.', '.$order->commune.' ('.$order->address_description.')';
            $phone = $order->phone;
            $email = $order->client_email;
            $status = $order->status;
            $date = $order->created_at;
        }

        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);

            return $order;
        });

        $output = '
            <link rel="stylesheet" href="frontend/css/style.css">
                <table class="table">
                    <thead class="thead">
                        <tr class="text-left">
                            <th>
                                Nom du Client: '.$fullname.'<br> Adresse: '.$fulladdress.'<br> Date: '.$date.'<br> Téléphone: '.$phone.'<br> Email: '.$email.'
                            </th>
                            <th>
                                <h4 class="text-secondary">Pour les Paiements via Lumicash/Ecoscash</h4>
                                Lumicash: 45683 <br>
                                EcoCash: 4948394 <br>
                                Nom: BUJAMART SA <br>
                            </th>
                        </tr>
                    </thead>
                </table>

                <table class="table">
                    <thead class="thead-primary">
                        <tr class="text-center">
                            <th>Image</th>
                            <th>Nom du Produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>';
        
        foreach($orders as $order) {
            foreach($order->cart->items as $item) {
                $output .= '
                    <tr class="text-center">
                        <td class="image-prod">   
                            <img src="storage/product_images/'.$item['product_image'].'" style="height: 80px; width: 80px;">
                        </td>
                        <td class="product-name">
                            <h3>'.$item['product_name'].'</h3>
                        </td>
                        <td class="price">'.$item['product_price'].'</td>
                        <td class="qty">'.$item['qty'].'</td>
                        <td class="total">'.$item['product_price'] * $item['qty'].'</td>
                    </tr>
                    </tbody>
                ';
            }

            $totalPrice = $order->cart->totalPrice;
        }

        $output .= '</table>';

        $output .= '<table class="table">
            <thead class="thead">
                <tr class="text-center">
                    <th>
                        <h3 class="text-danger">'.$status.'</h3>
                    </th>
                    <th>Total à payer (Plus frais de livraison)</th>
                    <th>'.($totalPrice + 3000).' BIF</th>
                </tr>
            </thead>
        </table>';

        return $output;
    }
}
