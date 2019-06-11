<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Learning Management System - Laravel </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">

    <!-- javascript -->
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>

    <!-- include libraries(jQuery, bootstrap) -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <style>
        a {
            color: #000000 ;
            text-decoration: none;
        }

        a:hover, a:focus {
            color: #2A6496;
            text-decoration: none;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.3/examples/album/album.css" rel="stylesheet">
</head>
<body>
<header>

    <div class="navbar navbar-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="{{url('dashboard')}}" class="navbar-brand d-flex align-items-center">
                <strong>LMSEANG</strong>
                <a class="btn btn-sm btn-primary" href="{{url('dashboard')}}">Dashboard</a>
            </a>
        </div>
    </div>
</header>

<style>
    .navbar {
        background-color: #2F3955;
    }
</style>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">

                    <form method="POST" action="{{route('modules.destroy', $module->id)}}">
                        Edit Module
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="submit" value="Delete" onclick="return confirm('Are you sure?')"
                               class="btn btn-sm btn-danger float-right" />
                    </form></div>


                <div class="card-body">
                    <form method="POST" action="{{route('modules.update', $module->id)}}" enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        @csrf
                        <div class="form-group">
                            Name:
                            <input type="text" name="module_name" value="{{ $module->module_name }}" class="form-control"/>
                            Slug:
                            <input type="text" name="module_slug" value="{{ $module->module_slug }}" class="form-control"/>
                            <input type="hidden" name="course_id" value="{{ $module->course_id }}" class="form-control"/>
                            Content:
                            <textarea id="summernote"  name="module_content">{!! $module->module_content !!}</textarea>
                            Module Image:
                            <br>
                            <img src="{{url('/images')}}/{{ $module->module_image }}" height="100"/>
                            <input type="file" id="module_image" name = "module_image">
                            <br>
                            <br>
                            <input type="submit" value="Save" class="btn btn-primary">
                            <button type="button" class="btn btn-light"><a href="{{url('dashboard')}}">Return to Dashboard</a></button>
                        </div>
                    </form>
                    <script>
                        $('#summernote').summernote({
                            tabsize: 2,
                            height: 400
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
<br>
<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="https://getbootstrap.com/">Visit the homepage</a> or read our <a href="/docs/4.3/getting-started/introduction/">getting started guide</a>.</p>
    </div>
</footer>

<script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script>
    (function () {
        'use strict'

        feather.replace()
    }())
</script>

</html>
