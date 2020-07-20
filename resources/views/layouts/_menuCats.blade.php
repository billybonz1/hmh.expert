@foreach($categories as $category)
    @if ($category->children->count())
        <li class="mb-has-children">
            <a href="/experts/{{ $category->slug }}">{{ $category->title }}</a>

            <ul>
                @include('layouts._menuCats', ['categories' => $category->children, 'is_child' => true, 'parent_slug' => $category->slug])
            </ul>
        </li>
    @else
        @isset($is_child)
            <li>
                <a href="/experts/{{$parent_slug}}/{{ $category->slug }}">{{ $category->title }}</a>
            </li>
            @continue
        @endisset
        <li>
            <a href="/experts/{{ $category->slug }}">{{ $category->title }}</a>
        </li>
    @endif
    
@endforeach