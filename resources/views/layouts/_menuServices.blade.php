@foreach($serviceCategories as $category)
    @if ($category->children->count())
        <li class="mb-has-children">
            <a href="{{ $category->url() }}">{{ $category->title }}</a>

            <ul>
                @include('layouts._menuServices', ['serviceCategories' => $category->children, 'is_child' => true, 'parent_slug' => $category->slug])
            </ul>
        </li>
    @else
        @isset($is_child)
            <li>
                <a href="{{ $category->url() }}">{{ $category->title }}</a>
            </li>
            @continue
        @endisset
        <li>
            <a href="{{ $category->url() }}">{{ $category->title }}</a>
        </li>
    @endif
    
@endforeach