@extends('website.website')

@section('content')

    @include('layouts._breadcrumbs')


    <div class="profile">
        <div class="inner">
            
            @include('layouts._profileMenu')
            
            
            <div class="profile-content">
                
    
                
                <div class="profile-content-wrap">
                    @if(count($post->reasons) > 0)
                    <div class="alert alert-danger">
                        @foreach($post->reasons as $reason)
                            <strong>Причина отклонения:</strong> {{ $reason->text }}
                        @endforeach
                    </div>
                    @endif
                    <form action="/profile/blog/update" method="post" class="main-form" enctype="multipart/form-data">
                        @csrf
                        <label>
                            <div>Заголовок:</div>
                            <span style="position: relative;">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror transliterate" data-to="slug" name="title" value="{{ $post->title }}" required   />
                                <div></div>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </span>
                        </label>
                        
                        <label>
                            <div>Слаг:</div>
                            <span style="position: relative;">
                                <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $post->slug }}" required   />
                                <div></div>
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </span>
                        </label>
                        
                        <label>
                            <div>Картинка:</div>
                            <img src="{{ $post->img }}" alt="{{ $post->title }}">
                            <span style="position: relative;">
                                <input type="file" id="img" name="img" class="inputfile form-control @error('img') is-invalid @enderror">
                                <label for="img">Выберите картинку</label>
                                <div></div>
                            </span>
                        </label>
                        
                        
                        <label>
                            <div>Категория:</div>
                            <span style="position: relative;">
                                <select name="category" required class="form-control">
                                    <option value="">Выберите категоию</option>
                                    @include('profile._postCats', [
                                        'delimiter' => ''
                                    ])
                                </select>
                                <div></div>
                            </span>
                        </label>
                        
                        <label>
                            <div>Контент:</div>
                            <span style="position: relative;">
                                <textarea id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content"    />{{ $post->content }}</textarea>
                                <div></div>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </span>
                        </label>
                        <input type="hidden" name="new" value="1" />
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        <button type="submit">Обновить пост</button>
                    </form>
                </div>
                
                
                
                
            </div>
        
        </div>
    </div>
    
    <script type="application/javascript" src="/public/js/admin/main.js"></script>
    <script src="https://cdn.tiny.cloud/1/l1u3o1js0cwjyquibfr97r7u29iyjolvj6glhb9dgfxewlcz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="application/javascript">
        tinymce.init({
          selector: '#content',
          height : "480",
          language: 'ru'
        });
    </script>
@endsection