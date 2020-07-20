@foreach($categories as $categoryItem)
    <div class="profile-experts-cat">
        <label>
            <input type="checkbox" name="categories[]" value="{{ $categoryItem->id }}" @if($currentUser->categories->contains('id', $categoryItem->id)) checked @endif/>
            <span>{{ $categoryItem->title }}</span>
        </label>
    
        @isset($categoryItem->children)
            <div class="profile-experts-cats">
                @include('profile._categories', [
                    'categories' => $categoryItem->children
                ])
            </div>
        @endisset
    </div>
@endforeach