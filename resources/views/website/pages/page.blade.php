@extends('website.website')

@section('content')
    @include('layouts._breadcrumbs')
    <section class="page">
        <div class="inner">
            @include('website.partials.page_header')

       
    
            @foreach($activePage->components as $content)
                @include('website.pages.page_heading')
                @include('website.pages.page_content')
    
                @include('website.pages.page_gallery')
                @include('website.pages.page_documents')
            @endforeach
    
    
            <!--@include('website.partials.social_share')-->
             
        </div>
    </section>
@endsection