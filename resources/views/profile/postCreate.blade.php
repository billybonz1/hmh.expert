@extends('website.website')

@section('content')

    @include('layouts._breadcrumbs')

    <div class="profile">
        <div class="inner">
            
            @include('layouts._profileMenu')
            
            <div class="profile-content">
                <h1>Добавить пост</h1>
        
                
                @include('partials.alerts')
                
                <form action="/profile/blog/create" method="post" class="main-form" enctype="multipart/form-data">
                    @csrf
                    <label>
                        <div>Заголовок:</div>
                        <span style="position: relative;">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror transliterate" data-to="slug" name="title" value="{{ old('title') }}" required   />
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
                            <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" required   />
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
                        <span style="position: relative;">
                            <input type="file" id="img" name="img" class="inputfile form-control @error('img') is-invalid @enderror" required>
                            <label for="img">Выберите картинку</label>
                            <div></div>
                        </span>
                    </label>
                    
                    
                    <label>
                        <div>Категория:</div>
                        <span style="position: relative;">
                            <select name="category" required class="form-control">
                                <option value="">Выберите категорию</option>
                                @include('profile._postCats', [
                                    'delimiter' => ''
                                ])
                            </select>
                            <div></div>
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>
                    </label>
                    
                    <label>
                        <div>Контент:</div>
                        <span style="position: relative;">
                            <textarea id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content"    />{{ old('content') }}</textarea>
                            <div></div>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>
                    </label>
                    <input type="hidden" name="img" value="http://denrakaev.com/wp-content/uploads/2015/03/no-image-800x511.png" />
                    <input type="hidden" name="active" value="0" />
                    <input type="hidden" name="new" value="1" />
                    <input type="hidden" name="author_id" value="{{ $currentUser->id }}" />       
                    <button type="submit">Добавить пост</button>
                </form>
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