@extends('admin_layout.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Catégorie</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active">Catégorie</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Créer une Catégorie</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{-- <form> --}}
                            {!! Form::open(['action' => 'App\Http\Controllers\CategoryController@savecategory', 'method' => 'POST',]) !!}
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        {{-- <labelfor="exampleInputEmail1">Nomdelacatégorie</label> --}}
                                        {{ Form::label('', 'Nom de la catégorie', ['for' => 'exampleInputEmail1']) }}
                                        {{ Form::text('category_name', '', ['class' => 'form-control', 'id' => 'exampleInputEmail1', 'placeholder' => 'Nom de la catégorie']) }}
                                        {{-- <inputtype="text"name="category_name"class="form-control"id="exampleInputEmail1"placeholder="Nomdelacatégorie"> --}}
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            {!! Form::close() !!}
                            {{-- </form> --}}
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('scripts')
    <!-- jquery-validation -->
    <script src="backend/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="backend/plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="backend/dist/js/adminlte.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            $.validator.setDefaults({
                submitHandler: function () {
                    alert( "Form successful submitted!" );
                }
            });
            $('#quickForm').validate({
                rules: {
                    category_name: {
                        required: true,
                        category_name: true,
                    },
                },
                messages: {
                    category_name: {
                        required: "Le nom de la catégorie est obligatoire",
                        category_name: "Le nom de la catégorie est obligatoire"
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
