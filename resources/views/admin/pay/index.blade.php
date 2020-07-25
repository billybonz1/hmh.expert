@extends('admin.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>Статистика оплат</h2>
            <table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Название услуги</th>
			      <th scope="col">Пользователь</th>
			      <th scope="col">Эксперт</th>
			      <th scope="col">Тип количества</th>
			      <th scope="col">Количество</th>
			      <th scope="col">Цена</th>
			      <th scope="col">Баланс эксперта</th>
			      <th scope="col">Баланс платформы</th>
			      <th scope="col">Общий баланс</th>
			      <th scope="col">Дата</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($orders as $order)
			    <tr>
				    <th scope="row">{{ $order->id }}</th>
				    <td><a href="/admin/moderate-services/{{ $order->service()->id }}">{{ $order->service()->name }}</a></td>
				    <td><a href="/admin/accounts/clients/{{ $order->user()->id }}/edit">{{ $order->user()->namef() }}</a></td>
				    <td><a href="/admin/accounts/clients/{{ $order->expert()->id }}/edit">{{ $order->expert()->namef() }}</a></td>
					<td>
						@if($order->quantity_type == "1")
							минуты
						@else
							штуки
						@endif
					</td>
					<td>
						{{ $order->quantity() }}
					</td>
					<td>
						{{ $order->service()->price }}
					</td>
					<td>
						{{ $order->expertPrice() }}
					</td>
					<td>
						{{ $order->platformPrice() }}
					</td>
					<td>
						{{ $order->totalPrice() }}
					</td>
					<td>
						{{ $order->created_at }}
					</td>
			    </tr>
			    @endforeach
			  </tbody>
			</table>
			<div class="pagination">
				{{ $orders->links() }}
			</div>
        </div>
    </div>
</div>
@endsection
