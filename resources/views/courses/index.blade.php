
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

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.3/examples/album/album.css" rel="stylesheet">
</head>
<body>
<header>

    <div class="navbar navbar-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="{{url('dashboard')}}" target="_blank" class="navbar-brand d-flex align-items-center">
                <strong>LMSEANG</strong>
                <a class="btn btn-sm btn-warning float-right" href="{{url('/admin')}}" target="_blank">Admin Panel</a>
                <a class="btn btn-sm btn-primary" href="{{url('dashboard')}}" target="_blank">Dashboard</a>
            </a>
        </div>
    </div>
</header>

<style>
    .navbar {
        background-color: #2F3955;
    }
</style>

<style>
    .video-responsive{
        overflow:hidden;
        padding-bottom:56.25%;
        position:relative;
        height:0;
    }
    .video-responsive iframe{
        left:0;
        top:0;
        height:100%;
        width:100%;
        position:absolute;
    }
</style>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{$course->course_name}} - Online Course</div>
                @if(!is_null($module->video_url) and $module->module_type =='video')
                    <div class="video-responsive">
                        <style>
                            .video-responsive{
                                overflow:hidden;
                                padding-bottom:56.25%;
                                position:relative;
                                height:0;
                            }
                            .video-responsive iframe{
                                left:0;
                                top:0;
                                height:100%;
                                width:100%;
                                position:absolute;
                            }
                        </style>
                        <iframe sandbox="allow-same-origin allow-scripts allow-forms"  width="410" height="400" src="{{$module->video_url}}?rel=0" frameborder="0" allowfullscreen></iframe>
                    </div>
                @else
                    <div class="card-body">

                        <div class="card-body">
                            {!! $module->module_content !!}
                        </div>
                    </div>
                @endif
            </div>
            <br>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Description</div>
                    <div class="card-body">
                       {{$course->course_description}}
                    </div>
            </div>
        </div>
        <hr>
            <div class="col-md-12">
                <hr>
                <!--  Demos -->
                <div class="row">
                    <div class="container-fluid lesson-footer">
                        <style>
                            .lesson-footer{
                                padding-top: 1rem;
                                padding-right: 1.5rem;
                                padding-left: 1.5rem;
                            }
                        </style>
                        <h5>COURSE MODULES</h5>
            <div class="owl-carousel">
                <a href="{{url('/course')}}/{{$course->course_slug}}"><div class="lesson-scroller-item {{ (request()->is('*/'. $module->module_slug)) ? 'active' : '' }}">
                        <div class="image-container">
                            <img alt="" class="media-object img-responsive" src="{{url('/images/getting-started.jpg')}}">
                            <div class="lesson-title">
                                <span class="lesson-module-number">1</span> <span class="text-uppercase">Getting Started</span>
                            </div></div>
                    </div></a>
                @foreach ($modules as $module)
                    <a href="{{url('/course')}}/{{$course->course_slug}}/{{$module->module_slug}}"><div class="lesson-scroller-item {{ (request()->is('*/'. $module->module_slug)) ? 'active' : '' }}">
                            <div class="image-container">
                                <img alt="" class="media-object img-responsive" src="{{url('/images/modules')}}/{{$module->module_image}}">
                                <div class="lesson-title">
                                    <span class="lesson-module-number">{{ $loop->iteration+1}}</span> <span class="text-uppercase">{!! $module->module_name !!}</span>
                                </div></div>
                    </div></a>
                @endforeach
                <a href="{{url('/')}}/{{$course->course_slug}}/summary"><div class="lesson-scroller-item {{ (request()->is('*/'. $module->module_slug)) ? 'active' : '' }}">
                        <div class="image-container">
                            <img alt="" class="media-object img-responsive" src="{{url('/images/summary.png')}}">
                            <div class="lesson-title">
                                <span class="lesson-module-number"></span> <span class="text-uppercase">Summary</span>
                            </div></div>
                </div></a>

            </div>
        </div>
    </div>
</div>
<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="https://getbootstrap.com/">Visit the homepage</a> or read our <a href="/docs/4.3/getting-started/introduction/">getting started guide</a>.</p>
    </div>
</footer>

<script>
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            margin: 10,
            dots: true,
            nav: true,
            loop: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })

    })
</script>

<script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script>
    (function () {
        'use strict'

        feather.replace()
    }())
</script>
</body>
</html>
