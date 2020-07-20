@extends('admin.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Создание категории блога</div>

                <div class="card-body">
                    
                    <form action="{{ route('posts-categories.store') }}" method="post">
                        @csrf
                        
                        @include('admin.postsCategory._form')
                            
                        
                    </form>
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
