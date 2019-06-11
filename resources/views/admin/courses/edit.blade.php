@extends('layouts.main')
@section('content')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">

                        <form method="POST" action="{{route('courses.destroy', $course->id)}}">
                            Edit Course
                            @csrf
                            {{method_field('DELETE')}}
                            <input type="submit" value="Delete" onclick="return confirm('Are you sure?')"
                                   class="btn btn-sm btn-danger float-right" />
                        </form></div>
                    <div class="card-body">

                        <div class="card-body">

                            <form method="POST" action="{{route('courses.update', $course->id)}}" enctype="multipart/form-data">
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
                                    <button type="button" class="btn btn-light"><a href="{{url('dashboard')}}">Return to Dashboard</a></button>
                                </div>
                            </form>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
