@extends('admin_layout.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Produits</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active">Produits</li>
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
                        <div class="card card-yellow">
                            <div class="card-header">
                                <h3 class="card-title">Modifier Produit</h3>
                            </div>
                            @if (Session::has('status'))
                                <div class="alert alert-success mx-2 my-2">
                                    {{ Session::get('status') }}
                                </div>
                            @endif

                            @if (count($errors) > 0)
                                    <div class="alert alert-danger mx-2 my-2">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>
                                                    {{ $error }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                            @endif

                            <!-- /.card-header -->
                            <!-- form start -->
                            {{-- <form> --}}
                            {!! Form::open(['action' => 'App\Http\Controllers\ProductController@updateproduct', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                      {{ Form::hidden('id', $product->id) }}
                                        {{-- <labelfor="product_name">Nom du produit</label> --}}
                                        {{-- <inputtype="text"name="product_name"class="form-control"id="product_name"placeholder="Nomduproduit"> --}}
                                        {{ Form::label('', 'Nom du produit', ['for' => 'product_name']) }}
                                        {{ Form::text('product_name', $product->product_name, ['class' => 'form-control', 'id' => 'product_name', 'placeholder' => 'Nom du produit']) }}
                                    </div>
                                    <div class="form-group">
                                        {{-- <labelfor="product_description">Descriptionduproduit</label> --}}
                                        {{-- <textareatype="text"name="product_description"class="form-control"id="product_description"placeholder="Descriptionduproduit"></textarea> --}}
                                        {{ Form::label('', 'Description du produit', ['for' => 'product_description']) }}
                                        {{ Form::text('product_description', $product->product_description, ['class' => 'form-control', 'id' => 'product_description', 'placeholder' => 'Description du produit']) }}
                                    </div>
                                    <div class="form-group">
                                        {{-- <labelfor="product_price">PrixduProduit</label> --}}
                                        {{-- <inputtype="text"name="product_price"class="form-control"id="product_price"placeholder="Prixduproduit"> --}}
                                        {{ Form::label('', 'Prix du produit', ['for' => 'product_price']) }}
                                        {{ Form::text('product_price', $product->product_price, ['class' => 'form-control', 'id' => 'product_price', 'placeholder' => 'Prix du produit']) }}
                                    </div>
                                    <div class="form-group">
                                      {{-- <labelfor="product_category">Catégorieduproduit</label> --}}
                                      {{ Form::label('', 'Catégorie du produit', ['for' => 'product_category']) }}
                                      {{ Form::select('product_category', $categories, $product->product_category, ['class' => 'form-control select2']) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="product_image">Image du Produit</label>
                                          <div class="input-group">
                                            <div class="custom-file">
                                                {{-- <input type="file" name="product_image" class="custom-file-input" id="exampleInputFile">
                                                <label for="exampleInputFile" class="custom-file-label">Selectionnez une image</label> --}}
                                                {{ Form::file('product_image', ['class' => 'custom-file-input', 'id' => 'product_image',]) }}
                                                {{ Form::label('', 'Selectionnez une image', ['class' => 'custom-file-label', 'for' => 'product_image']) }}
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Télécharger</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    {{-- <buttontype="submit"class="btnbtn-warning">Enregistrer</button> --}}
                                    {{ Form::submit('Mettre à Jour', ['class' => 'btn btn-warning']) }}
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
                    alert( "Formulaire Soumis avec Succès!" );
                }
            });
            $('#quickForm').validate({
                rules: {
                    product_name: {
                        required: true,
                        product_name: true,
                    },
                    product_description: {
                        required: true,
                        product_description: true,
                    },
                    product_price: {
                        required: true,
                        product_price: true,
                    },
                    
                    product_category: {
                        required: true,
                        product_category: true,
                    },
                    product_image: {
                        required: true,
                        product_name: true,
                    },
                },
                messages: {
                    product_name: {
                        required: "Le titre du product est obligatoire",
                        category_name: "Le titre du product est obligatoire"
                    },
                    product_description: {
                        required: "La description du product est obligatoire",
                        product_description: "La description du product est obligatoire"
                    },
                    product_price: {
                        required: "Le Prix du produit est obligatoire",
                        product_price: "Le Prix du produit est obligatoire"
                    },
                    
                    product_category: {
                        required: "La Catégorie du produit est obligatoire",
                        product_category: "La Catégorie du produit est obligatoire"
                    },
                    product_image: {
                        required: "L'image du product est obligatoire",
                        product_image: "L'image du product est obligatoire"
                    },
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