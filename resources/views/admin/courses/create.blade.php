@extends('layouts.admin.main')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Create New Course</h1>

        <form method="POST" action="{{route('admin.courses.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                Name:
                <input type="text" id="course_name" name="course_name" placeholder="ex: Name of Course" class="form-control"/>
                Slug:
                <input type="text" id="course_slug" name="course_slug" placeholder="ex: name-of-course" class="form-control"/>
                Description:
                <textarea class="form-control" rows="5" placeholder="Short course description about the course" name="course_description"></textarea>
                Course Image:
                <br>
                <input name="course_image" style="display: none">
                <div>
                    <img class="img-responsive responsive-img" id="thumbnail">
                </div>
                <a class="btn btn-info" id="getNewImage">Get Unsplash Image</a>
                <br>
                <br>
                <input type="submit" value="Save" class="btn btn-primary">
                <a href="{{url('admin/courses')}}"><button type="button" class="btn btn-light">Return to Courses</button></a>

            </div>
        </form>
    </div>
@endsection


@section('additional_scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#course_name').on("input", function(e) {
        var str = $("#course_name").val();
        str = str.replace(/[^a-zA-Z0-9\s]/g,"");
        str = str.toLowerCase();
        str = str.replace(/\s/g,'-');
        $("#course_slug").val(str);

        });

        $("#course_slug").on("click", function (e) {
        $("#course_slug").attr("readonly", false);
        });

        $("#getNewImage").on("click", function(){
            let query = $("#course_name").val();
            if(query == ""){
                alert("Please provide a course name to get an image!")
            }else{
                $.ajax({
                url: "https://api.unsplash.com/search/photos?query=" + query + "&client_id=" + "{{env('UNSPLASH_ACCESS_KEY')}}",
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