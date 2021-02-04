@extends('layouts.main')
@section('content')
<style>
    .jumbotron{
        background-image: url("{{asset('images/new-bg.jpg')}}");
        background-size: cover;
        height: 100%;}
</style>
        <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <font color="white"><h1 class="jumbotron-heading">Learning Management System</h1>
                <p class="lead text-muted"></p>
                <p>A learning management system is a software application for the administration, documentation, tracking, reporting, and delivery of educational courses, training programs, or learning and development programs.</p>
                <p>You can view, edit, or create a course below.</p>
                <p>
                    <a href="{{route('admin.courses.create')}}" class="btn btn-primary my-2">Create Course</a>
                </p>
                </font>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                @forelse($courses as $course)

                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <a href="course/{{$course->course_slug}}"><img src="@if($course->course_image) {{$course->course_image}} @else {{asset('images/noimage.jpg')}} @endif" width="100%" height="225"/></a>
                            <div class="card-body">
                                <h4><a href="course/{{$course->course_slug}}">{{$course->course_name}}</a></h4>
                                <p class="card-text">{{$course->course_description}}
                                </p>
                              <a href="course/{{$course->course_slug}}">  <button class="btn btn-info col-md-12">View Course</button></a>
                            </div>
                        </div>
                    </div>
                    @empty
                        <tr>
                            <td colspan="2">No courses found</td>
                        </tr>
                    @endforelse



            </div>
        </div>

</main>
@endsection
