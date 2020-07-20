@foreach($categories as $category)
    <option value="{{ $category->id }}" @if(isset($post) && count($post->categories)>0 && $post->categories[count($post->categories) - 1]->id == $category->id) selected @endif>{{ $delimiter ?? "" }} {{ $category->title }}</option>
    
    @isset ($category->children)
        @include('profile._postCats', [
            'categories' => $category->children,
            'delimiter' => ' - ' . $delimiter
        ])
    @endisset
@endforeach 