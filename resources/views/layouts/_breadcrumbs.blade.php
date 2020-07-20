@isset($breadcrumbs)
<div class="breadcrumbs">
    <div class="inner">
        <ul>
        @foreach($breadcrumbs as $breadcrumb)
            <li>
                @isset($breadcrumb['url'])
                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a>
                @else
                    <span>{{ $breadcrumb['title'] }}</span>
                @endisset
            </li>
        @endforeach
        </ul>
        <a href="javascript:history.back();">< Назад</a>
    </div>
</div>
@endisset


@isset($breadcrumbItems)
<div class="breadcrumbs">
    <div class="inner">
        <ul>
            @foreach($breadcrumbItems as $breadcrumb)
                <li>
                    @isset($breadcrumb->url)
                        <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->name }}</a>
                    @else
                        <span>{{ $breadcrumb->name }}</span>
                    @endisset
                </li>
            @endforeach
        </ul>
        <a href="javascript:history.back();">< Назад</a>
    </div>
</div>
@endisset