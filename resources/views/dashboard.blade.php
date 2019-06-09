@extends('layouts.main')
@section('content')
<style>
    .jumbotron{
        background-image: url({{url('/images/new-bg.jpg')}} );
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
                    <a href="{{route('courses.create')}}" class="btn btn-primary my-2">Create Course</a>
                </p>
                </font>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                    @if(session()->has('danger-message'))
                        <div class="alert alert-danger">
                            {{ session()->get('danger-message') }}
                        </div>
                    @endif
                <div class="row">
                @forelse($courses as $course)

                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">

                            <a href="course/{{$course->course_slug}}"><img src="images/{{ $course->course_image }}" width="100%" height="225"/></a>
                            <div class="card-body">
                                <h4><a href="course/{{$course->course_slug}}">{{$course->course_name}}</a></h4>
                                <p class="card-text">{{$course->course_description}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('courses.edit', $course->id) }}"><button type="button" class="btn btn-info btn-sm">Edit</button></a>
                                        <form method="POST" action="{{route('courses.destroy', $course->id)}}">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this course?')"
                                                   class="btn btn-sm btn-danger" />
                                        </form>
                                    </div>
                                </div>
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
