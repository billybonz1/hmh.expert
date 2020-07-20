@extends('website.website')

@section('content')

    @include('layouts._breadcrumbs')

    <div class="profile">
        <div class="inner">

            @include('layouts._profileMenu')

            <div class="profile-content">
                <h1>Обновить услугу</h1>


                @include('partials.alerts')
                <div class="profile-content-wrap">
                    @if(count($post->reasons) > 0)
                        <div class="alert alert-danger">
                            @foreach($post->reasons as $reason)
                                <strong>Причина отклонения:</strong> {{ $reason->text }}
                            @endforeach
                        </div>
                    @endif
                    <form action="/profile/services/update" method="post" class="main-form" enctype="multipart/form-data">
                    @csrf

                    <label>
                        <div>Заголовок:</div>
                        <span style="position: relative;">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror transliterate" data-to="slug" name="name" value="{{ $post->name }}" required   />
                            <div></div>
                            @error('name')
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
                        <div>Короткое описание:</div>
                        <span style="position: relative;">
                            <textarea class="form-control @error('shortdesc') is-invalid @enderror" name="shortdesc" required>{{ $post->shortdesc }}</textarea>
                            <div></div>
                            @error('shortdesc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>
                    </label>

                    <label>
                        <div>Полное описание:</div>
                        <span style="position: relative;">
                            <textarea id="desc" class="form-control @error('desc') is-invalid @enderror" name="desc">{{ $post->desc }}</textarea>
                            <div></div>
                            @error('desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>
                    </label>

                    <label>
                        <div>Информация для покупателя:</div>
                        <span style="position: relative;">
                            <textarea class="form-control @error('saleinfo') is-invalid @enderror" name="saleinfo" required>{{ $post->saleinfo }}</textarea>
                            <div></div>
                            @error('saleinfo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>
                    </label>

                    <label>
                        <div>Цена в клеверах:</div>
                        <span style="position: relative;">
                            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $post->price }}" required   />
                            <div></div>
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>
                    </label>


                    <label>
                        <div>Картинка:</div>
                        <img src="{{ $post->getThumbUrlAttribute() }}" alt="{{ $post->title }}">
                        <span style="position: relative;">
                            <input type="file" id="image" name="image" class="inputfile form-control @error('image') is-invalid @enderror">
                            <label for="image">Выберите картинку</label>
                            <div></div>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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

                    <input type="hidden" name="visible" value="0" />
                    <input type="hidden" name="new" value="1" />
                    <input type="hidden" name="expert_id" value="{{ $currentUser->id }}" />
                    <input type="hidden" name="service_id" value="{{ $post->id }}">
                    <button type="submit">Обновить услугу</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript" src="/public/js/admin/main.js"></script>
    <script src="https://cdn.tiny.cloud/1/l1u3o1js0cwjyquibfr97r7u29iyjolvj6glhb9dgfxewlcz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="application/javascript">
        tinymce.init({
            selector: '#desc',
            height : "480",
            language: 'ru'
        });
    </script>
@endsection
