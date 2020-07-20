<div class="form-group row">
    <label for="title" class="col-md-2 col-form-label text-md-right">Наименование категории</label>
    <input type="text" class="col-md-6 form-control transliterate" data-to="slug" name="title" value="{{ $category->title ?? "" }}" placeholder="Наименование категории" />

    @error('title')
        <div class="alert alert-danger" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>

<div class="form-group row">
    <label for="slug" class="col-md-2 col-form-label text-md-right">Слаг категории</label>
    <input type="text" class="col-md-6 form-control" name="slug" value="{{ $category->slug ?? "" }}" placeholder="Слаг категории (используется в ссылке)" />

    @error('slug')
        <div class="alert alert-danger" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>

<div class="form-group row">
    <label for="description" class="col-md-2 col-form-label text-md-right">Описание</label>
    <textarea class="col-md-6 form-control" name="description" placeholder="Краткое описание">{{ $category->description ?? "" }}</textarea>
    
    @error('description')
        <div class="alert alert-danger" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>

<div class="form-group row">
    <label for="parent_id" class="col-md-2 col-form-label text-md-right">Родительская категория</label>
    <select name="parent_id" class="col-md-6 form-control" >
        <option value="0">-- без родительской категории --</option>
        @include('admin.serviceCategory._categories')
    </select>
</div>

<hr>

<button type="submit" class="btn btn-primary">Сохранить</button>
