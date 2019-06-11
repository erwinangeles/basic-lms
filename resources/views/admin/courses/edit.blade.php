
@extends('layouts.admin.main')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Edit Course</h1>
        <style>
            .float-right {
                float: right !important;

            . row > & {
                margin-left: auto !important;
            }
            }
        </style>
        <form method="POST" action="{{route('admin.courses.update', $course->id)}}" enctype="multipart/form-data">
            {{method_field('PUT')}}
            @csrf
            <div class="form-group">
                Name:
                <input type="text" name="course_name" value="{{$course->course_name}}" class="form-control"/>
                Slug:
                <input type="text" name="course_slug" value="{{$course->course_slug }}" class="form-control"/>
                Description:
                <textarea class="form-control" rows="5" name="course_description">{{$course->course_description}}</textarea>
                <br>
                <img src="{{url('/images')}}/{{ $course->course_image }}" height="100"/>
                <input type="file" id="course_image" name = "course_image">
                <br>
                <br>
                <input type="submit" value="Save" class="btn btn-primary">
                <button type="button" class="btn btn-light"><a href="{{url('/admin/courses')}}" target="_blank">Return to Modules</a></button>
            </div>
        </form>
    </div>
@endsection

