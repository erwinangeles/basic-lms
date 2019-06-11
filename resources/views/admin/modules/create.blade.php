@extends('layouts.admin.main')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Create New Module</h1>

        <form method="POST" action="{{route('admin.modules.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                Name:
                <input type="text" name="module_name" class="form-control"/>
                Slug:
                <input type="text" name="module_slug" class="form-control"/>
                <input type="hidden" name="course_id" value ="{{ app('request')->input('course_id') }}" class="form-control"/>
                Content:
                <textarea id="summernote" rows="15" name="module_content"></textarea>
                Module Image:
                <br>
                <input type="file" id="module_image" name = "module_image">
                <br>
                <input type="submit" value="Save" class="btn btn-primary">
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
