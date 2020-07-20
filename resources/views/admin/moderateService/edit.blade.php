@extends('admin.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(count($post->reasons) > 0)
            <div class="alert alert-warning">
                @foreach($post->reasons as $reason)
                    <strong>Причина отклонения:</strong> {{ $reason->text }}
                @endforeach
            </div>
            @endif

            
            <form action="/admin/moderate-services/{{ $post->id }}/update" method="POST" enctype="multipart/form-data">
                @csrf
                @include("admin.moderateService._form")
            </form>
        </div>
    </div>
</div>
@endsection
