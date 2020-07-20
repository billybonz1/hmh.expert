@extends('admin.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Создание категории услуг</div>

                <div class="card-body">

                    <form action="{{ route('service-categories.store') }}" method="post">
                        @csrf

                        @include('admin.serviceCategory._form')


                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
