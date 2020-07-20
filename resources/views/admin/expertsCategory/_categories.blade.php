@foreach($categories as $categoryItem)
    <option value="{{ $categoryItem->id ?? '' }}"
    @isset ($category->id)
        @if($category->parent_id == $categoryItem->id)
            selected="selected"
        @endif
        @if($category->id == $categoryItem->id)
            disabled="disabled"
        @endif
    @endisset
    >
        {{ $delimiter ?? '' }}{{ $categoryItem->title ?? '' }}
    </option>
    
    @isset ($categoryItem->children)
        @include('admin.expertsCategory._categories', [
            'categories' => $categoryItem->children,
            'delimiter' => ' - ' . $delimiter
        ])
    @endisset
@endforeach