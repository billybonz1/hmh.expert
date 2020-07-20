@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@isset($success)
    <div class="alert alert-success">
        {{ $success }}
    </div>
@endisset


@if(session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif


@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif