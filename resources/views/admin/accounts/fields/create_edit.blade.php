@extends('admin.admin')

@section('content')
    <div class="card  card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <span><i class="fa fa-edit"></i></span>
                <span>{{ isset($item)? 'Редактировать поле: ' . $item->title . ' entry': 'Создать новое поле' }}</span>
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <form method="POST" action="{{$selectedNavigation->url . (isset($item)? "/{$item->id}" : '')}}" accept-charset="UTF-8">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <input name="_method" type="hidden" value="{{isset($item)? 'PUT':'POST'}}">

            <div class="card-body">
                @include('admin.partials.card.info')

                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">Тип поля</label>
                                @php
                                    $types = array(
                                        "text" => "Текстовое поле",
                                        "textarea" => "Текстовая область",
                                        "file" => "Файл"
                                    );
                                @endphp
                                {!! form_select('type', $types, ($errors && $errors->any()? old('type') : (isset($item)? $item->type : '')), ['class' => 'select2 form-control ' . form_error_class('type', $errors)]) !!}
                            	{!! form_error_message('type', $errors) !!}
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" data-to="slug" class="transliterate form-control {{ form_error_class('name', $errors) }}" id="name" name="name" placeholder="Введите имя поля" value="{{ ($errors && $errors->any()? old('name') : (isset($item)? $item->name : '')) }}">
                                {!! form_error_message('name', $errors) !!}
                            </div>
                        </div>
                     
                    </div>

               
                </fieldset>
                
                <fieldset>
                    <div class="row">
              
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Слаг</label>
                                <input type="text" class="form-control {{ form_error_class('slug', $errors) }}" id="slug" name="slug" placeholder="Введите слаг поля" value="{{ ($errors && $errors->any()? old('slug') : (isset($item)? $item->slug : '')) }}">
                                {!! form_error_message('slug', $errors) !!}
                            </div>
                        </div>
                     
                    </div>

               
                </fieldset>
            </div>
            @include('admin.partials.form.form_footer')
        </form>
    </div>
@endsection
