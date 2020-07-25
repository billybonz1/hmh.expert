<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @isset($pageTitle)
            {{$pageTitle}}
        @else
            HMH.EXPERT
        @endisset
    </title>
    <style>a,abbr,acronym,address,applet,article,aside,audio,b,big,blockquote,body,canvas,caption,center,cite,code,dd,del,details,dfn,div,dl,dt,em,embed,fieldset,figcaption,figure,footer,form,h1,h2,h3,h4,h5,h6,header,hgroup,html,i,iframe,img,ins,kbd,label,legend,li,mark,menu,nav,object,ol,output,p,pre,q,ruby,s,samp,section,small,span,strike,strong,sub,summary,sup,table,tbody,td,tfoot,th,thead,time,tr,tt,u,ul,var,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:after,blockquote:before,q:after,q:before{content:'';content:none}table{border-collapse:collapse;border-spacing:0}</style>
    <link rel="stylesheet" href="/styles/simplebar.min.css">
    <link rel="stylesheet" href="/styles/glide.core.min.css">
    <link rel="stylesheet" href="/styles/common.css" />
    <link rel="stylesheet" href="/styles/all.css" />
    <link rel="stylesheet" href="/styles/home.css" />
    <link rel="stylesheet" href="/styles/single.css">
    <link rel="stylesheet" href="/styles/mobile.css" />
    <link rel="stylesheet" href="/styles/profile-all.css" />
    <link rel="stylesheet" href="/styles/profile.css" />
    <link rel="stylesheet" href="/styles/blogs.css" />
    <link rel="stylesheet" href="/styles/profile-messages.css" />
    <link rel="stylesheet" href="/styles/faqs.css" />
    <link rel="stylesheet" href="/styles/pages.css" />
    @yield('head')
</head>
<body class="@isset($currentUser)logged-in @if($currentUser->hasRole('expert'))is-expert @endif @endisset">
    
    <!--@if(Request::is('/'))-->
    <!--    It is main-->
    <!--@endif-->
    
    @include('inc.header')
    
    @yield('content')
    
    @include('inc.footer')
    
    @if(config('app.env') != 'local')
        @include('partials.analytics')
    @endif
    
    @yield('scripts')
</body>
</html>

