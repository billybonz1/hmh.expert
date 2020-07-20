@extends('admin.admin')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                Отзывы для модерации
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            @include('admin.partials.card.info')


            <table id="tbl-list" data-page-length="25" class="dt-table table table-sm table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th class="desktop">Текст отзыва</th>
                    <th>Рейтинг</th>
                    <th>Пользователь</th>
                    <th>Эксперт</th>
                    <th>Статус</th>
                    <th>Дата создания</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{!! $item->text !!}</td>
                        <td>{{ $item->rating }}</td>
                        <td>{!! $item->getUser() !!}</td>
                        <td>{!! $item->getExpert() !!}</td>
                        <td>{{ $item->getStatus() }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            @if($item->status != 1)
                                <button class="btn btn-success approve-review" data-token="{{ csrf_token() }}" data-review-id="{{ $item->id }}">Подтвердить</button>
                            @endif
                            <button class="btn btn-danger reject-review" data-token="{{ csrf_token() }}" data-review-id="{{ $item->id }}">Отклонить</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.querySelectorAll(".approve-review").forEach(function(btn){
            btn.addEventListener("click", function(e){
                var token = btn.getAttribute("data-token");
                var review_id = btn.getAttribute("data-review-id");
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/reviews/approve?_token='+token+'&review_id='+review_id);
                xhr.onload = function() {
                    var td = btn.parentElement.parentElement.querySelector("td:nth-child(5)");
                    if (xhr.status === 200) {
                        if(xhr.responseText == "1"){
                            td.innerHTML = "Подтвержден";
                            btn.remove();
                        }
                    }
                    else {
                        console.log(xhr.status);
                    }
                };
                xhr.send();
            });
        });

        document.querySelectorAll(".reject-review").forEach(function(btn){
            btn.addEventListener("click", function(e){
                var token = btn.getAttribute("data-token");
                var review_id = btn.getAttribute("data-review-id");
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/reviews/reject?_token='+token+'&review_id='+review_id);
                xhr.onload = function() {
                    var td = btn.parentElement.parentElement.querySelector("td:nth-child(5)");
                    if (xhr.status === 200) {
                        if(xhr.responseText == "1"){
                            td.innerHTML = "Отклонен";
                        }
                    }
                    else {
                        console.log(xhr.status);
                    }
                };
                xhr.send();
            });
        });
    </script>
@endsection
