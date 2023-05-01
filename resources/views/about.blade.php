@extends('layouts.main')

@include('partials.navbar')

@section('container')
    <!doctype html>
    <html lang="en">

    <head>

        <title>Heroes · Bootstrap v5.3</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/heroes/">

        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">




        <!-- Custom styles for this template -->
        <link href="heroes.css" rel="stylesheet">
    </head>

    <body>

        <h1 class="visually-hidden">Heroes examples</h1>

        <div class="container col-xxl-8 ">
            <div class="row flex-lg-row-reverse align-items-center g-5 ">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="https://source.unsplash.com/500x500/" class="d-block img-fluid mt-4" alt="Bootstrap Themes"
                        width="500" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Bootstrap Hero</h1>
                    <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the
                        world’s most popular front-end open source toolkit, featuring Sass variables and mixins,
                        responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
                        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="b-example-divider"></div>

        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


    </body>

    </html>
@endsection
