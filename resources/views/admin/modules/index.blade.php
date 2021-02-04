@extends('layouts.admin.main')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Course Modules</h1>
        <style>
            .float-right {
                float: right !important;

            . row > & {
                margin-left: auto !important;
            }
            }
        </style>
                @include('components.validation')

        <br/>
        <a href="{{route('admin.modules.create')}}?course_id={{ app('request')->input('course_id') }}" class="btn float-right btn-primary">Create Course Module</a>
        <br/>
        <br>
        <br>

        <table class="table table-striped">
            <tr>
                <th>Module Name</th>
                <th>Action</th>
            </tr>
            @forelse($modules as $module)

                <tr>
                    <td> @if($module->module_type =='video')<span class="label label-success">video</span>@else <span class="label label-danger">text</span>@endif <a href="{{route('module', ['course' => $module->course->course_slug, 'module' => $module->module_slug])}}" target="_blank">{{$module->module_name}}</a></td>
                    <td> <a href="{{ route('admin.modules.edit', $module->id) }}" class="btn btn-xs btn-primary">Edit</a>
                        <form method="POST" action="{{route('admin.modules.destroy', $module->id)}}">
                            @csrf
                            {{method_field('DELETE')}}
                            <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this module?')"
                                   class="btn btn-xs btn-danger" />
                        </form>


                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="2">No modules found</td>
                </tr>
            @endforelse
        </table>
        <a href="{{route('admin.courses.index')}}"><button type="button" class="btn btn-light">Return to Courses</button></a>

    </div>
@endsection
