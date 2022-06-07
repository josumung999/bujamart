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
                                <h3 class="card-title">Modifier Slider</h3>
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
                            {{-- <formid="quickForm"> --}}
                            {!! Form::open(['action' => 'App\Http\Controllers\SliderController@updateslider', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'quickForm']) !!}
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        {{-- <labelfor="slider_title">TitreduSlider</label> --}}
                                        {{-- <inputtype="text"name="slider_title"class="form-control"id="slider_title"placeholder="NomduSlider"> --}}
                                        {{ Form::label('', 'Titre du slider', ['for' => 'slider_title']) }}
                                        {{ Form::text('slider_title', '', ['class' => 'form-control', 'id' => 'slider_title', 'placeholder' => 'Titre du slider']) }}
                                    </div>
                                    <div class="form-group">
                                        {{-- <labelfor="slider_description">DescriptionduSlider</label> --}}
                                        {{-- <inputtype="text"name="slider_description"class="form-control"id="slider_description"placeholder="DescriptionduSlider"> --}}
                                        {{ Form::label('', 'Description du slider', ['for' => 'slider_description']) }}
                                        {{ Form::text('slider_description', '', ['class' => 'form-control', 'id' => 'slider_description', 'placeholder' => 'Description du slider']) }}
                                    </div>
                                    <div class="form-group">
                                        {{-- <labelfor="slider_link">LienduSlider</label> --}}
                                        {{-- <inputtype="text"name="slider_link"class="form-control"id="slider_link"placeholder="LienduSlider"> --}}
                                        {{ Form::label('', 'Lien du slider', ['for' => 'slider_link']) }}
                                        {{ Form::text('slider_link', '', ['class' => 'form-control', 'id' => 'slider_link', 'placeholder' => 'Lien du slider']) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="slider_link">Image du Slider</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                {{-- <inputtype="file"name="slider_image"class="custom-file-input"id="exampleInputFile"> --}}
                                                {{-- <labelfor="exampleInputFile"class="custom-file-label">Selectionnezuneimage</label> --}}
                                                {{ Form::file('slider_image', ['class' => 'custom-file-input', 'id' => 'slider_image',]) }}
                                                {{ Form::label('', 'Selectionnez une image', ['class' => 'custom-file-label', 'for' => 'slider_image']) }}
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
                    slider_title: {
                        required: true,
                        slider_title: true,
                    },
                    slider_description: {
                        required: false,
                        slider_description: true,
                    },
                    slider_link: {
                        required: false,
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
