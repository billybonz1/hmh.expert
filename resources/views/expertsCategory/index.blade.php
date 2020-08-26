@extends('website.website')

@section('content')
        
        @include('layouts._topChat')
    
        
        <div class="second-screen">
            <div class="inner">
    
                <div class="top-experts top-experts-full @isset($cat)category-{{$cat->id}}@endisset">
                    <div class="top-experts-child top-experts-title">
                        <h3>{{ $pageTitle }}</h3>
                        <a href="/experts">Все эксперты</a>
                    </div>
                    
                    
                    @foreach($experts as $expert)
                        @include('inc.expert')
                    @endforeach
                </div>
            </div>
        </div>
    
@endsection