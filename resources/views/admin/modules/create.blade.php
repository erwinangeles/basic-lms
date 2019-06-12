@extends('layouts.admin.main')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

        <h1 class="page-header">Create New Module</h1>

        <form method="POST" action="{{route('admin.modules.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                Name:
                <input type="text" name="module_name" placeholder="Name of Module" class="form-control"/>
                Slug:
                <input type="text" name="module_slug" placeholder="module-slug-test-1" class="form-control"/>
                <input type="hidden" name="course_id" value ="{{ app('request')->input('course_id') }}" class="form-control"/>
                <div id="text" class="group">
                    Content:
                    <textarea id="summernote" rows="15" name="module_content"></textarea>
                </div>
                Module Type:
                <select class="form-control" id="module_type" name="module_type">
                <option value="text">Text</option>
                    <option value="video">Video</option>
                </select>
                <div id="video" class="group">
                    Video Embed URL: eg; https://player.vimeo.com/video/8733915 or https://www.youtube.com/embed/6p_yaNFSYao
                    <input type="text" name="video_url" placeholder="e.g.; https://www.youtube.com/embed/6p_yaNFSYao" class="form-control"/>
                </div>
                <script>
                    $(document).ready(function () {
                        $('.group').hide();
                        $('#text').show();
                        $('#module_type').change(function () {
                            $('.group').hide();
                            $('#'+$(this).val()).show();
                        })
                    });
                </script>
                Module Image:
                <br>
                <input type="file" id="module_image" name = "module_image">
                <br>
                <input type="submit" value="Save" class="btn btn-primary">
                <a href="{{url('admin/modules?course_id=')}}{{ app('request')->input('course_id') }}"><button type="button" class="btn btn-light">Return to Modules</button></a>
            </div>
        </form>
        <script>
            $('#summernote').summernote({
                tabsize: 2,
                height: 400
            });
        </script>
    </div>
@endsection
