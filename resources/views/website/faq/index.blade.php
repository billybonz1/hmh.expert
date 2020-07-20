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
                                <h3>{!! $faq->question !!}</h3>
                               
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
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

@section('scripts')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function () {
            $('.btn-toggle-question').on('click', function (e) {

                if ($(this).hasClass('collapsed')) {
                    $.post('/faq/question/' + $(this).attr('data-id') + '/total_read');
                }
            });

            $('.btn-helpful').on('click', function (e) {
                e.preventDefault();

                // show spinner
                var $footer = $('#faq-footer-' + $(this).attr('data-id'));
                $footer.html("<i class=\"fa fa-spinner fa-spin text-primary text-sm\"></i>");

                // post and show response
                $.post('/faq/question/' + $(this).attr('data-id') + '/' + $(this).attr('data-type'), function () {
                    $footer.html("<div><small><span class=\"text-muted\">Thank you for your feedback.</span></small></div>");
                });
                return false;
            });
        })
    </script>
@endsection
