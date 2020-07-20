@extends('admin.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <form action="/admin/moderate-services/store" method="POST" enctype="multipart/form-data">
                @csrf
                @include("admin.moderateService._form")
            </form>
        </div>
    </div>
</div>
@endsection
