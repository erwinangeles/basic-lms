@extends('layouts.admin.main')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Edit Module</h1>
        @include('components.validation')

        <form method="POST" action="{{route('admin.modules.update', $module->id)}}" enctype="multipart/form-data">
            {{method_field('PUT')}}
            @csrf
            <div class="form-group">
                Name:
                <input type="text" name="module_name" value="{{ $module->module_name }}" class="form-control"/>
                Slug:
                <input type="text" name="module_slug" value="{{ $module->module_slug }}" class="form-control"/>
                <input type="hidden" name="course_id" value="{{ $module->course_id }}" class="form-control"/>
                <div id="text" class="group">
                    Content:
                    <textarea id="summernote" rows="15" name="module_content">{{$module->module_content}}</textarea>
                </div>
                Module Type:
                <select class="form-control" id="module_type" name="module_type">
                    <option value="text" <?php if ($module->module_type == 'text') echo ' selected="selected"'; ?>>Text</option>
                    <option value="video" <?php if ($module->module_type == 'video') echo ' selected="selected"'; ?>>Video</option>
                </select>
                <div id="video" class="group">
                    Video Embed URL:
                    <input type="text" name="video_url" value="{{$module->video_url}}" class="form-control"/>
                </div>
                <script>
                    $(document).ready(function () {
                        $('.group').hide();
                        $('#text').hide();
                        $('#{{$module->module_type}}').show();
                        $('#module_type').change(function () {
                            $('.group').hide();
                            $('#'+$(this).val()).show();
                        })
                    });
                </script>
                Module Image:
                <br>
                <input value="{{$module->module_image}}" name="module_image" style="display: none">
                <div>
                    <img src="{{$module->module_image}}" class="img-responsive responsive-img" id="thumbnail">
                </div>
                <a class="btn btn-info" id="getNewImage">Get New Unsplash Image</a>
                <br>
                <br>
                <input type="submit" value="Save" class="btn btn-primary">
                <a href="{{url('admin/modules?course_id='. $module->course_id)}}"><button type="button" class="btn btn-light">Return to Modules</button></a>
            </div>
        </form>
        <script>
            $('#summernote').summernote({
                tabsize: 2,
                height: 400
            });
        </script>

        <script>
                $(document).ready(function() {

                $('#module_name').on("input", function(e) {
                var str = $("#module_name").val();
                str = str.replace(/[^a-zA-Z0-9\s]/g,"");
                str = str.toLowerCase();
                str = str.replace(/\s/g,'-');
                $("#module_slug").val(str);

                });

                $("#module_slug").on("click", function (e) {
                $("#module_slug").attr("readonly", false);
                });

                $("#getNewImage").on("click", function(){
                    let query = $("#module_name").val();
                    if(query == ""){
                        alert("Please provide a module name to get an image!")
                    }else{
                        $.ajax({
                        url: "https://api.unsplash.com/search/photos?query=" + query + "&client_id=sFURTAcLZSn8VyIeBIDl-zIcfSW04RaBDbaHWofJt_8",
                        type: 'GET',
                        success: function(res) {
                            let random = Math.floor(Math.random() * res.results.length);
                            let img = res.results[random].urls.raw + "&fit=crop&h=140&w=240";
                            $("#thumbnail").attr("src", img);
                            $("input[name=module_image").val(img);

                            console.log(img);
                        }
                    });
                    }
                });

            });
        </script>
    </div>
@endsection
