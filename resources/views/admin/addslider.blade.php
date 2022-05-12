@extends('admin_layout.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sliders</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active">Sliders</li>
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
                                <h3 class="card-title">Créer un Slider</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="slider_title">Titre du Slider</label>
                                        <input type="text" name="slider_title" class="form-control" id="slider_title" placeholder="Nom du Slider">
                                    </div>
                                    <div class="form-group">
                                        <label for="slider_description">Description du Slider</label>
                                        <input type="text" name="slider_description" class="form-control" id="slider_description" placeholder="Description du Slider">
                                    </div>
                                    <div class="form-group">
                                        <label for="slider_link">Lien du Slider</label>
                                        <input type="text" name="slider_link" class="form-control" id="slider_link" placeholder="Lien du Slider">
                                    </div>
                                    <div class="form-group">
                                        <label for="slider_link">Image du Slider</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="slider_image" class="custom-file-input" id="exampleInputFile">
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
                    slider_title: {
                        required: true,
                        slider_title: true,
                    },
                    slider_description: {
                        required: true,
                        slider_description: true,
                    },
                    slider_link: {
                        required: true,
                        slider_link: true,
                    },
                    slider_image: {
                        required: true,
                        slider_title: true,
                    },
                },
                messages: {
                    slider_title: {
                        required: "Le titre du Slider est obligatoire",
                        category_name: "Le titre du Slider est obligatoire"
                    },
                    slider_description: {
                        required: "La description du Slider est obligatoire",
                        slider_description: "La description du Slider est obligatoire"
                    },
                    slider_link: {
                        required: "Le lien du Slider est obligatoire",
                        slider_link: "Le lien du Slider est obligatoire"
                    },
                    slider_image: {
                        required: "L'image du Slider est obligatoire",
                        slider_image: "L'image du Slider est obligatoire"
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
