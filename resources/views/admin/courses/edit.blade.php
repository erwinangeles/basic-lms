
@extends('layouts.admin.main')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Edit Course  <a href="{{url('/course')}}/{{$course->course_slug}}"><button type="button" class="btn float-right btn-warning">Go to Course</button></a></h1>
        <style>
            .float-right {
                float: right !important;

            . row > & {
                margin-left: auto !important;
            }
            }
        </style>
        @include('components.validation')
        <form method="POST" action="{{route('admin.courses.update', $course->id)}}" enctype="multipart/form-data">
            {{method_field('PUT')}}
            @csrf
            <div class="form-group">
                Name:
                <input type="text" id="course_name" name="course_name" value="{{$course->course_name}}" class="form-control"/>
                Slug:
                <input type="text" name="course_slug" value="{{$course->course_slug }}" class="form-control"/>
                Description:
                <textarea class="form-control" rows="5" name="course_description">{{$course->course_description}}</textarea>
                <br>
                Course Image:
                <br>
                <input value="{{$course->course_image}}" name="course_image" style="display: none">
                <div>
                    <img src="{{$course->course_image}}" class="img-responsive responsive-img" id="thumbnail">
                </div>
                <a class="btn btn-info" id="getNewImage">Get Unsplash Image</a>
                <br>
                <br>
                <input type="submit" value="Save" class="btn btn-primary">
                <button type="button" class="btn btn-light"><a href="{{url('/admin/courses')}}">Return to Courses</a></button>
            </div>
        </form>
    </div>
@endsection

@section('additional_scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $("#getNewImage").on("click", function(){
            let query = $("#course_name").val();
            if(query == ""){
                alert("Please provide a course name to get an image!")
            }else{
                $.ajax({
                url: "https://api.unsplash.com/search/photos?query=" + query + "&client_id=sFURTAcLZSn8VyIeBIDl-zIcfSW04RaBDbaHWofJt_8",
                type: 'GET',
                success: function(res) {
                    let random = Math.floor(Math.random() * res.results.length);
                    let img = res.results[random].urls.raw + "&fit=crop&h=300&w=525";
                    $("#thumbnail").attr("src", img);
                    $("input[name=course_image").val(img);

                    console.log(img);
                }
            });
            }
        });
    });
</script>
@endsection