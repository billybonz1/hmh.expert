@extends('website.website')

@section('content')
        @include('layouts._breadcrumbs')
        
        
        <div class="second-screen">
            <div class="inner">
    
                <div class="top-experts top-experts-full">
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