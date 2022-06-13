@extends('client_layout.client')

@section('title')
    Mon Panier
@endsection

@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Accueil</a></span> <span>Panier</span></p>
                    <h1 class="mb-0 bread">Mon Panier</h1>
                </div>
            </div>
        </div>
    </div>
    @if (!Session::has('cart'))
        <section class="ftco-section ftco-cart">
            <div class="container">
                @if (Session::has('status') && Session::has('type'))
                    <div class="alert alert-{{ Session::get('type') }}">
                        {{ Session::get('status') }}
                    </div>
                @endif

                <h1 class="text-secondary mb-4">Aucun Produit dans le Panier</h1>
                <a href="{{ url('/shop') }}" class="btn btn-primary">Voir Nos Produits </a>
            </div>
        </section>
        
    @else
        <section class="ftco-section ftco-cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <div class="cart-list">
                            
                                <table class="table">
                                    <thead class="thead-primary">
                                        <tr class="text-center">
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                            <th>Nom du Produit</th>
                                            <th>Prix</th>
                                            <th>Quantité</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr class="text-center">
                                                <td class="product-remove">
                                                    <a href="{{ url('remove_from_cart/'.$product['product_id']) }}">
                                                        <span class="ion-ios-close"></span>
                                                    </a>
                                                </td>

                                                <td class="image-prod"><div class="img" style="background-image:url('{{ asset('/storage/product_images/'.$product['product_image']) }}');"></div></td>

                                                <td class="product-name">
                                                    <h3>{{ $product['product_name'] }}</h3>
                                                    <p>{{ $product['product_description'] }}</p>
                                                </td>

                                                <td class="price">{{ $product['product_price'] }} BIF</td>

                                                <form action="{{ url('/update_qty/'.$product['product_id']) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <td class="quantity">
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="quantity" class="quantity form-control input-number" value="{{ $product['qty'] }}" min="1" max="100">
                                                            <input type="submit" value="Soumettre" class="btn btn-small btn-primary">
                                                        </div>
                                                    </td>
                                                </form>

                                                <td class="total">{{ $product['product_price'] * $product['qty'] }} BIF</td>
                                            </tr><!-- END TR-->
                                        @endforeach
                                    </tbody>
                                </table>                           
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-lg-6 mt-5 cart-wrap ftco-animate">
                        <div class="cart-total mb-3">
                            <h3>Coupon de Réduction</h3>
                            <p>Veuillez Saisir votre bon de réduction si vous en avez</p>
                            <form action="#" class="info">
                                <div class="form-group">
                                    <label for="">Code du Coupon</label>
                                    <input type="text" class="form-control text-left px-3" placeholder="">
                                </div>
                            </form>
                        </div>
                        <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Appliquer</a></p>
                    </div>
                    <div class="col-lg-6 mt-5 cart-wrap ftco-animate">
                        <div class="cart-total mb-3">
                            <h3>Total du Panier</h3>
                            <p class="d-flex">
                                <span>Sous-Total</span>
                                <span>
                                    {{ Session::get('cart')->totalPrice }} BIF
                                </span>
                            </p>
                            <p class="d-flex">
                                <span>Livraison</span>
                                @if (Session::get('cart')->totalPrice > 50000)
                                <span>00 BIF</span> 
                                @else
                                    <span title="Nous faisons payer un montant forfaitaire pour les commande de moins de 50.000 BIF">3000 BIF</span>
                                @endif
                            </p>
                            <p class="d-flex">
                                <span>Reduction</span>
                                <span>00 BIF</span>
                            </p>
                            <hr>
                            <p class="d-flex total-price">
                                <span>Total</span>
                                @if (Session::get('cart')->totalPrice > 50000)
                                <span>{{ Session::get('cart')->totalPrice }} BIF</span> 
                                @else
                                    <span>{{ Session::get('cart')->totalPrice + 3000 }} BIF</span>
                                @endif
                            </p>
                        </div>
                        <p><a href="{{ url('/checkout') }}" class="btn btn-primary py-3 px-4">Passer la Commande</a></p>
                    </div>
                </div>
            </div>
        </section>
    @endif

     <!-- End Content -->

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            var quantitiy=0;
            $('.quantity-right-plus').click(function(e){

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function(e){
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if(quantity>0){
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>
@endsection
