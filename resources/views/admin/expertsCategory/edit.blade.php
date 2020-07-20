@extends('admin.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Редактирование категории экспертов</div>

                <div class="card-body">
                    
                    <form action="{{ route('experts-categories.update', $category) }}" method="post">
                        @method('PUT')
                        @csrf
                        
                        @include('admin.expertsCategory._form')
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
