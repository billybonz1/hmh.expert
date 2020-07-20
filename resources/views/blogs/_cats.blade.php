@if(count($categories) > 0)
<ul>
    @foreach($categories as $category)
    <li @if($category->isCurrent()) class="active" @endif>
        <a href="{{ $category->url() }}">{{ $category->title }}</a>
        @include('blogs._cats', ['categories' => $category->children])
    </li>
    @endforeach
</ul>
@endif