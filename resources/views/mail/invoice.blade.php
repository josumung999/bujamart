<!DOCTYPE html>
<html>
  <head>
    <title>Confirmation de Commande - BujaMart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style  type="text/css">
      body{margin-top:20px;
            color: #2e323c;
            background: #f5f6fa;
            position: relative;
            height: 100%;
        }
        .invoice-container {
            padding: 1rem;
        }
        .invoice-container .invoice-header .invoice-logo {
            margin: 0.8rem 0 0 0;
            display: inline-block;
            font-size: 1.6rem;
            font-weight: 700;
            color: #2e323c;
        }
        .invoice-container .invoice-header .invoice-logo img {
            max-width: 130px;
        }
        .invoice-container .invoice-header address {
            font-size: 0.8rem;
            color: #9fa8b9;
            margin: 0;
        }
        .invoice-container .invoice-details {
            margin: 1rem 0 0 0;
            padding: 1rem;
            line-height: 180%;
            background: #f5f6fa;
        }
        .invoice-container .invoice-details .invoice-num {
            text-align: right;
            font-size: 0.8rem;
        }
        .invoice-container .invoice-body {
            padding: 1rem 0 0 0;
        }
        .invoice-container .invoice-footer {
            text-align: center;
            font-size: 0.7rem;
            margin: 5px 0 0 0;
        }

        .invoice-status {
            text-align: center;
            padding: 1rem;
            background: #ffffff;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
        .invoice-status h2.status {
            margin: 0 0 0.8rem 0;
        }
        .invoice-status h5.status-title {
            margin: 0 0 0.8rem 0;
            color: #9fa8b9;
        }
        .invoice-status p.status-type {
            margin: 0.5rem 0 0 0;
            padding: 0;
            line-height: 150%;
        }
        .invoice-status i {
            font-size: 1.5rem;
            margin: 0 0 1rem 0;
            display: inline-block;
            padding: 1rem;
            background: #f5f6fa;
            -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
            border-radius: 50px;
        }
        .invoice-status .badge {
            text-transform: uppercase;
        }

        @media (max-width: 767px) {
            .invoice-container {
                padding: 1rem;
            }
        }


        .custom-table {
            border: 1px solid #e0e3ec;
        }
        .custom-table thead {
            background: #007ae1;
        }
        .custom-table thead th {
            border: 0;
            color: #ffffff;
        }
        .custom-table > tbody tr:hover {
            background: #fafafa;
        }
        .custom-table > tbody tr:nth-of-type(even) {
            background-color: #ffffff;
        }
        .custom-table > tbody td {
            border: 1px solid #e6e9f0;
        }


        .card {
            background: #ffffff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }

        .text-success {
            color: #00bb42 !important;
        }

        .text-muted {
            color: #9fa8b9 !important;
        }

        .custom-actions-btns {
            margin: auto;
            display: flex;
            justify-content: flex-end;
        }

        .custom-actions-btns .btn {
            margin: .3rem 0 .3rem .3rem;
        }
    </style>
  </head>
  <body>  
    <div class="container">
      <div class="row gutters">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
              <div class="card-body p-0">
                <div class="invoice-container">
                  <div class="invoice-header">
                    <!-- Row start -->
                    <div class="row gutters">
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="custom-actions-btns mb-5">
                          <a href="#" class="btn btn-primary">
                            <i class="icon-file-pdf"></i> Télécharger
                          </a>
                          <a href="#" class="btn btn-secondary">
                            <i class="icon-printer"></i> Imprimer
                          </a>
                        </div>
                      </div>
                    </div>
                    <!-- Row end -->
                    <!-- Row start -->
                    <div class="row gutters">
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <a href="index.html" class="invoice-logo">
                          BujaMart
                        </a>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <address class="text-right">
                          N°05, Avenude de la Révolution, Rohero<br>
                          Bujumbura, Burundi.<br>
                          +257 22 02 23 22
                        </address>
                      </div>
                    </div>
                    <!-- Row end -->
                    <!-- Row start -->
                    <div class="row gutters">
                      <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="invoice-details">
                          @foreach ($orders as $order)
                            <address>
                              {{ $order->firstname.' '.$order->lastname }}<br>
                              Email: {{ $order->client_email }} <br>
                              Phone: {{ $order->phone }}
                              {{ $order->address.', '.$order->commune.' ('.$order->address_description.')' }}
                            </address>
                          @endforeach
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="invoice-details">
                          <div class="invoice-num">
                            @foreach ($orders as $order)
                              <div>Facture - #{{ $order->payer_id }}</div>
                              <div>{{ $order->created_at }}</div>
                            @endforeach
                          </div>
                        </div>													
                      </div>
                    </div>
                    <!-- Row end -->
                  </div>
                  <div class="invoice-body">
                    <!-- Row start -->
                    <div class="row gutters">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="table-responsive">
                          <table class="table custom-table m-0">
                            <thead>
                              <tr>
                                <th>Produit</th>
                                <th>Prix Unitaire</th>
                                <th>Quantité</th>
                                <th>Sous Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($orders as $order)
                                  @foreach ($order->cart->items as $item)
                                    <tr>
                                      <td>
                                        {{ $item['product_name'] }}
                                        <p class="m-0 text-muted">
                                          {{ $item['product_description'] }}
                                        </p>
                                      </td>
                                      <td>
                                        {{ $item['product_price'] }} BIF
                                      </td>
                                      <td>
                                        {{ $item['qty'] }}
                                      </td>
                                      <td>
                                        {{ $item['product_price'] * $item['qty'] }} BIF
                                      </td>
                                    </tr>
                                  @endforeach
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td colspan="2">
                                      <p>
                                        Sous-Total<br>
                                        Livraison<br>
                                        TVA<br>
                                      </p>
                                      <h5 class="text-success"><strong>Total Général</strong></h5>
                                    </td>			
                                    <td>
                                      <p>
                                        {{ $order->cart->totalPrice }} BIF<br>
                                        3000 BIF<br>
                                        00 BIF<br>
                                      </p>
                                      <h5 class="text-success">
                                        <strong>
                                          {{ $order->cart->totalPrice + 3000 }} BIF
                                        </strong>
                                      </h5>
                                    </td>
                                  </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <!-- Row end -->
                  </div>
                  <div class="invoice-footer">
                    Merci de choisir BujaMart
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  </body>
</html>