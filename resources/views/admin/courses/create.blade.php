@extends('layouts.admin.main')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Create New Course</h1>

        <form method="POST" action="{{route('admin.courses.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                Name:
                <input type="text" name="course_name" placeholder="Name of Course" class="form-control"/>
                Slug:
                <input type="text" name="course_slug" placeholder="course-slug-1" class="form-control"/>
                Description:
                <textarea class="form-control" rows="5" placeholder="Short course description about the course" name="course_description"></textarea>
                Course Image:
                <br>
                <input type="file" id="course_image" name = "course_image">
                <br>
                <input type="submit" value="Save" class="btn btn-primary">
                <a href="{{url('admin/courses')}}"><button type="button" class="btn btn-light">Return to Courses</button></a>

            </div>
        </form>
    </div>
@endsection
