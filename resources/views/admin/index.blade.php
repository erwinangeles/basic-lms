@extends('layouts.admin.main')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Welcome to LMS Admin</h1>

        <p>This is the dashboard for the admin panel. To edit courses and modules click on the Manage Courses menu item or click the button below</p>
        <p>To go back to the front-end view, click on the Dashboard button above</p>
      <a href="{{route('admin.courses.index')}}"><button type="button" class="btn btn-primary">Manage Courses</button></a>
    </div>
    @endsection
