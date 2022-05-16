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
                                <h3 class="card-title">Créer un Produit</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="product_name">Nom du produit</label>
                                        <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Nom du produit">
                                    </div>
                                    <div class="form-group">
                                        <label for="product_description">Description du produit</label>
                                        <input type="text" name="product_description" class="form-control" id="product_description" placeholder="Description du produit">
                                    </div>
                                    <div class="form-group">
                                        <label for="product_price">Prix du Produit</label>
                                        <input type="text" name="product_price" class="form-control" id="product_price" placeholder="Prix du produit">
                                    </div>
                                    <div class="form-group">
                                      <label for="product_category">Catégorie du produit</label>
                                      <input type="text" name="product_category" class="form-control" id="product_category" placeholder="Catégorie produit">
                                    </div>
                                    <div class="form-group">
                                        <label for="product_image">Image du Produit</label>
                                          <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="product_image" class="custom-file-input" id="exampleInputFile">
                                                <label for="exampleInputFile" class="custom-file-label">Selectionnez une image</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Télécharger</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">Enregistrer</button>
                                </div>
                            </form>
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