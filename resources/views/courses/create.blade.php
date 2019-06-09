@extends('layouts.main')
@section('content')
    <br>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Course </div>

                <div class="card-body">

                    <form method="POST" action="{{route('courses.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            Name:
                            <input type="text" name="course_name" class="form-control"/>
                            Slug:
                            <input type="text" name="course_slug" class="form-control"/>
                            Description:
                            <textarea class="form-control" rows="5" name="course_description"></textarea>
                            Course Image:
                            <br>
                            <input type="file" id="course_image" name = "course_image">
                            <br>
                            <input type="submit" value="Save" class="btn btn-primary">
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    </div>
    <br>
@endsection
