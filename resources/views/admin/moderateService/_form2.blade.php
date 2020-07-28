<div class="form-group row">
    <label for="name" class="col-md-2 col-form-label text-md-right">Название услуги</label>
    <input type="text" class="col-md-6 form-control transliterate" data-to="slug" name="name" value="{{ $post->name ?? old('name') }}" placeholder="Название услуги" />
    
    @error('name')
        <div class="alert alert-danger" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>

<div class="form-group row">
    <label for="slug" class="col-md-2 col-form-label text-md-right">Слаг услуги</label>
    <input type="text" class="col-md-6 form-control" name="slug" value="{{ $post->slug ?? old('slug') }}" placeholder="Слаг услуги (используется в ссылке)" />
    
    @error('slug')
        <div class="alert alert-danger" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>

<div class="form-group row">
    <label for="shortdesc" class="col-md-2 col-form-label text-md-right">Краткое описание</label>
    <textarea class="col-md-6 form-control" name="shortdesc" placeholder="Краткое описание">{{ $post->shortdesc ?? old('shortdesc') }}</textarea>
    
    @error('shortdesc')
        <div class="alert alert-danger" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>


<div class="form-group row">
    <label for="desc" class="col-md-2 col-form-label text-md-right">Полное описание</label>
    <div class="col-md-6">
        <textarea class="form-control note-codable" id="content-content" name="desc" placeholder="Полное описание" style="height: 300px;">{{ $post->desc ?? old('desc') }}</textarea>
        @error('desc')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    
</div>

<div class="form-group row">
    <label for="category" class="col-md-2 col-form-label text-md-right">Категория</label>
    <select name="category" class="form-control col-md-6">
        <option value="">Выберите категорию</option>
        @include('profile._postCats', [
            'delimiter' => ''
        ])
    </select>
    @error('category')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div> 



<div class="form-group row">
    <label for="saleinfo" class="col-md-2 col-form-label text-md-right">Информация для покупателя</label>
    <textarea class="col-md-6 form-control" name="saleinfo" placeholder="Информация для покупателя" />{{ $post->saleinfo ?? old('saleinfo') }}</textarea>
    @error('saleinfo')
        <div class="alert alert-danger" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>


<div class="form-group row">
    <label for="image" class="col-md-2 col-form-label text-md-right">Картинка</label>
    <div class="col-md-6" style="padding: 0;">
        @if(isset($post) && $post->image)
            <img src="{{ $post->getThumbUrlAttribute() }}" alt="{{ $post->name }}" />
        @endif
        <input type="file" class="form-control" name="image"  placeholder="Картинка" style="margin-top: 15px;"/>
    </div>

    @error('image')
        <div class="alert alert-danger" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>

<div class="form-group row">
    <label for="visible" class="col-md-2 col-form-label text-md-right">Видимость</label>
    <select name="visible" required class="form-control col-md-6">
        <option value="1" @if(isset($post) && $post->visible == '1') selected @endif>Показать</option>
        <option value="0" @if(isset($post) && $post->visible == '0') selected @endif>Скрыть</option>
    </select>
    @error('visible')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div> 


<div class="form-group row">
    <label for="expert_id" class="col-md-2 col-form-label text-md-right">Эксперт</label>
    <select name="expert_id" class="form-control col-md-6">
        <option value="0">Для всех экспертов</option>
        @foreach($experts as $expert)
        <option value="{{ $expert->id }}" @if(isset($post) && $expert->id == $post->id) selected @endif>{{ $expert->namef() }}</option>
        @endforeach
    </select>
    @error('expert_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div> 

<input type="hidden" name="expert_id" value="{{ $post->expert_id ?? "" }}" />

<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Цены услуги для экспертов</label>
    <div class="col-md-6">
        <div class="form-group row" style="margin-bottom: 10px;">
            <div class="col-md-3">
                <strong>Имя эксперта</strong>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <strong>Цена</strong>
                    </div>
                    <div class="col-md-6">
                        <strong>Процент</strong>
                    </div>
                </div>
            </div>
        </div>
        @foreach($experts as $expert)
        <div class="form-group row" style="margin-bottom: 10px;">
            <input type="hidden" name="experts[]" value="{{ $expert->id }}" />
            <div class="col-md-3">
                {{ $expert->namef() }}
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="price[]" @isset($expert->price)value="{{ $expert->price }}"@endisset placeholder="Цена за услугу (в клеверах)" />
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="procent[]" @isset($expert->procent)value="{{ $expert->procent }}"@endisset placeholder="Процент выплаты" />
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<hr>
                        
<button type="submit" class="btn btn-primary">Сохранить</button>

<input type="hidden" name="editall" value="1" />



@include('admin.partials.summernote.document', ['summernote' => '#content-content'])
@section('scripts')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function () {
            pageSummerNote('#content-content', {{ $height ?? '300' }});

            function pageSummerNote(selector, height)
            {
                $(selector).summernote({
                    height: height ? height : 120,
                    focus: false,
                    tabsize: 2,
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
                        ['color', ['color']],
                        ['layout', ['ul', 'ol', 'paragraph']],
                        ['insert', ['table', 'link', 'document', /*, 'picture', 'video',*/ 'hr']],
                        ['misc', ['fullscreen', 'codeview', 'undo']]
                    ],
                    buttons: {
                        document: DocumentButton
                    },
                    onCreateLink: function (originalLink) {
                        return originalLink; // return original link
                    }
                });
            }
        });
    </script>
@endsection