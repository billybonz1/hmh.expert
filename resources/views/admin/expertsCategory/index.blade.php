@extends('admin.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Категории экспертов</div>
                @can('create-categories')
                <a href="{{ route('experts-categories.create') }}" class="btn btn-primary">
                  Создать новую 
                </a>
                @endcan
                <div class="card-body">
                    
                    
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Имя</th>
                          <th scope="col">Слаг</th>
                          <th scope="col">Действия</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($categories as $category)
                            <tr>
                              <th scope="row">{{ $category->id }}</th>
                              <td>{{ $category->title }}</td>
                              <td>{{ $category->slug }}</td>
                              <td>
                                <div class="btn-group" role="group" aria-label="Basic example" style="width: 100%;">
                                  <a href="{{ route('experts-categories.edit', $category) }}" class="btn btn-primary">Редактировать</a>
                                  @can('delete-categories')
                                    <form action="{{ route('experts-categories.destroy', $category) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="_id" value="{{ $category->id }}" />
                                        <button type="submit" class="btn btn-warning">Удалить</button>
                                    </form>
                                  @endcan
                                </div>
                                
                              </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
