@extends('layouts.admin.main')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Edit Module</h1>
        <form method="POST" action="{{route('admin.modules.update', $module->id)}}" enctype="multipart/form-data">
            {{method_field('PUT')}}
            @csrf
            <div class="form-group">
                Name:
                <input type="text" name="module_name" value="{{ $module->module_name }}" class="form-control"/>
                Slug:
                <input type="text" name="module_slug" value="{{ $module->module_slug }}" class="form-control"/>
                <input type="hidden" name="course_id" value="{{ $module->course_id }}" class="form-control"/>
                Content:
                <textarea id="summernote"  name="module_content">{!! $module->module_content !!}</textarea>
                Module Image:
                <br>
                <img src="{{url('/images')}}/{{ $module->module_image }}" height="100"/>
                <input type="file" id="module_image" name = "module_image">
                <br>
                <br>
                <input type="submit" value="Save" class="btn btn-primary">
                <button type="button" class="btn btn-light"><a href="{{url('admin/modules?course_id='. $module->course_id)}}" target="_blank">Return to Modules</a></button>
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
