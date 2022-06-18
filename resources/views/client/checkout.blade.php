@extends('client_layout.client')

@section('title')
    Valider la Commande
@endsection

@section('content')


    <div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Accueil</a></span> <span>Commander</span></p>
                    <h1 class="mb-0 bread">Commander</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 ftco-animate">
                    @if(Session::has('client'))
                        <div class="alert alert-info">
                            Vous êtes connecté en tant que {{ Session::get('client')['email'] }}
                        </div>
                    @endif
                    <form action="{{ url('/place-order') }}" method="POST" class="billing-form">
                        {{ csrf_field() }}
                        <h3 class="mb-4 billing-heading">Informations de Livraison</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Prénom</label>
                                    <input name="firstname" type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Nom de Famille</label>
                                    <input name="lastname" type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="commune">Commune</label>
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="commune" id="commune" class="form-control">
                                            <option value="Mukaza">Mukaza</option>
                                            <option value="Muha">Muha</option>
                                            <option value="Ntahangwa">Ntahangwa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Adresse Complète</label>
                                    <input type="text" name="address" class="form-control" placeholder="Exemple: N°11, Avenue Buragane, Kinindo">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="address_description" class="form-control" placeholder="Détails Supplementaire">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="phone">Téléphone</label>
                                    <input type="tel" name="phone" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group mt-4">
                                    <div class="radio">
                                        <label class="mr-3"><input type="radio" name="optradio"> Paiement par Carte </label>
                                        <label><input type="radio" name="optradio"> Cash à la Livraison</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Placer la Commande" class="btn btn-primary py-3 px-4">
                    </form><!-- END -->
                </div>
                <div class="col-xl-5">
                    <div class="row mt-5 pt-3">
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Panier</h3>
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
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section>

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
