@extends('layouts.admin.main')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Modules</h1>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @elseif(session()->has('danger-message'))
            <div class="alert alert-danger">
                {{ session()->get('danger-message') }}
            </div>
        @endif
        <style>
            .float-right {
                float: right !important;

            . row > & {
                margin-left: auto !important;
            }
            }
        </style>
        <br/>
        <a href="{{route('admin.modules.create')}}?course_id={{ app('request')->input('course_id') }}" target="_blank" class="btn float-right btn-primary">Create Module</a>
        <br/>
        <br>
        <br>

        <table class="table table-striped">
            <tr>
                <th>Course ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            @forelse($modules as $module)

                <tr>
                    <td>{{$module->course_id}}</td>
                    <td>{{$module->module_name}}</td>
                    <td> <a href="{{ route('admin.modules.edit', $module->id) }}" target="_blank" class="btn btn-xs btn-info">Edit</a>
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
                    <td colspan="2">No records found</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
