@if($errors->any())
<div class="alert alert-danger">
    {{ $errors->first() }}
</div>
@endif

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@elseif(session()->has('danger-message'))
<div class="alert alert-danger">
    {{ session()->get('danger-message') }}
</div>
@endif