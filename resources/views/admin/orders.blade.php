@extends('admin_layout.admin')

@section('styles')

    <!-- DataTables -->
    <link rel="stylesheet" href="backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@endsection

@section('content')
    {{ Form::hidden('', $increment = 1) }}
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Commandes</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active">Commandes</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Toutes les commandes</h3>
                            </div>

                            @if (Session::has('error'))
                                    <div class="alert alert-danger mx-2 my-2">
                                        {{ Session::get('error') }}
                                    </div>
                            @endif
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Num.</th>
                                        <th>ID.</th>
                                        <th>Nom du Client</th>
                                        <th>Adresse Compl??te</th>
                                        <th>T??l??phone</th>
                                        <th>E-mail</th>
                                        <th>Montant</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>
                                                    {{ $increment }}
                                                </td>
                                                <td>
                                                    {{ $order->id }}
                                                </td>
                                                <td>
                                                    {{ $order->firstname.' '.$order->lastname }}
                                                </td>
                                                <td>
                                                    {{ $order->address.', '.$order->commune.' ('.$order->address_description.')' }}
                                                </td>
                                                
                                                <td>
                                                    {{ $order->phone }}
                                                </td>
                                                <td>
                                                    {{ $order->client_email }}
                                                </td>
                                                <td>
                                                    {{-- @foreach ($order->cart->items as $item)
                                                        {{ $item['product_name'] }}
                                                    @endforeach --}}
                                                    {{ $order->cart->totalPrice }} BIF
                                                </td>
                                                <td>
                                                    {{ $order->status }}
                                                </td>
                                                <td>
                                                    <span class="d-flex flex-row">
                                                        <a href="#" class="btn btn-primary btn-sm mx-2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{ url('/view-pdf/'.$order->id) }}" type="Voir la facture" class="btn btn-info btn-sm mx-2">
                                                            <i class="fas fa-file-pdf"></i>
                                                        </a>
                                                    </span>
                                                </td>
                                            </tr>
                                            {{ Form::hidden('', $increment = $increment + 1) }}
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Num.</th>
                                        <th>ID.</th>
                                        <th>Nom du Client</th>
                                        <th>Adresse Compl??te</th>
                                        <th>T??l??phone</th>
                                        <th>E-mail</th>
                                        <th>Montant</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('scripts')
    <!-- DataTables  & Plugins -->
    <script src="backend/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="backend/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="backend/plugins/jszip/jszip.min.js"></script>
    <script src="backend/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="backend/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="backend/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="backend/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="backend/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="backend/dist/js/bootbox.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $(document).on('click', '#delete', function (e) {
                e.preventDefault();
                var link = $(this).attr('href');
                bootbox.confirm('Voulez vous vraiment effacer cette Commande ?', function (confirmed) {
                    if (confirmed) {
                        window.location.href = link;
                    };
                });
            });
        });
    </script>
    <script src="backend/dist/js/adminlte.js"></script>
@endsection
