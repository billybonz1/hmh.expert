@extends('website.website')

@section('content')
    @include('layouts._breadcrumbs')
    <div class="faqs">
        <div class="inner">
            <h1>{!! isset($pageTitle) ? $pageTitle : $page->name !!}</h1>
            
            @foreach($items as $category)
                <div id="acc-category{{ $category->id }}" class="faqs-category">
                    <h2>
                        {{ $category->name }}
                    </h2>
                    <div class="faqs-answers">
                        @foreach($category->faqs as $faq)
                            <div id="acc-faq{{ $faq->id }}" data-id="{{ $faq->id }}" class="faqs-answer">
                                <h3>
                                    <div>
                                        {!! $faq->question !!}
                                    </div>
                                    <span class="faqs-toggle">+</span>
                                </h3>
                                
                                <div class="faqs-toggled">
                                    <div class="faqs-answer-content">
                                        {!! $faq->answer !!}
                                    </div>
        
                                    <div id="faq-footer-{{ $faq->id }}" class="faqs-answer-footer">
                                        <span>Был ли вопрос полезен?</span>
                                        <a class="btn btn-small btn-success btn-helpful" href="#" data-id="{{ $faq->id }}" data-type="helpful_yes">
                                            <i class="fa fa-thumbs-up"></i> Да
                                        </a>
                                        <a class="btn btn-small btn-danger btn-helpful" href="#" data-id="{{ $faq->id }}" data-type="helpful_no">
                                            <i class="fa fa-thumbs-down"></i> Нет
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        var token = document.querySelector("[name='_token']").value;
        document.querySelectorAll(".faqs-answer h3").forEach(function(el){
            el.addEventListener("click", function(){
                var toggled = el.nextElementSibling;
                toggled.classList.toggle("active");
                if(toggled.classList.contains("active")){
                    el.querySelector(".faqs-toggle").innerHTML = "-";
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '/faq/question/' + el.parentElement.getAttribute('data-id') + '/total_read?_token='+token);
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText);
                        }
                        else {
                            console.log('Request failed.  Returned status of ' + xhr.status);
                        }
                    };
                    xhr.send();
                }else{
                    el.querySelector(".faqs-toggle").innerHTML = "+";
                }
            });
        });
        
        
        document.querySelectorAll(".btn-helpful").forEach(function(el){
            el.addEventListener("click", function(e){
                e.preventDefault();
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/faq/question/' + el.getAttribute('data-id') + '/' + el.getAttribute('data-type') + "?_token="+token);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText);
                        el.parentElement.innerHTML = "Спасибо! Мы очень ценим Ваше мнение";
                    }else{ 
                        console.log('Request failed.  Returned status of ' + xhr.status);
                    }
                };
                xhr.send();
            });
        });
    </script>
@endsection
