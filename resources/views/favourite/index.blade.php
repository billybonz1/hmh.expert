@extends('website.website')

@section('content')
        @include('layouts._breadcrumbs')
        
        
        <div class="second-screen favourite-block">
            <div class="inner">
    
                <div class="top-experts top-experts-full">
                    <div class="top-experts-child top-experts-title">
                        <h3>{{ $pageTitle }}</h3>
                        <a href="/experts">Все эксперты</a>
                    </div>
                    @if(count($experts) == 0)
                        <div class="no-experts">
                            Вы пока не добавили в избранное ни одного эксперта
                        </div>
                    @else
                        @foreach($experts as $expert)
                            @include('inc.expert')
                        @endforeach
                    @endif
                    
                    
                    <div class="pagination">
                        {!! $pagination !!}
                    </div>
                </div>
                
                
            </div>
        </div>
    
@endsection