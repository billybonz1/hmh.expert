@extends('website.website')

@section('content')

    @include('layouts._breadcrumbs')


    <div class="profile">
        <div class="inner">

            @include('layouts._profileMenu')


            <div class="profile-content">
                <h1>Мои покупки</h1>
                @include('partials.alerts')
                <table class="orders-table">
    			  <thead>
    			    <tr>
    			      <th scope="col">#</th>
    			      <th scope="col">Название услуги</th>
    			      <th scope="col">Эксперт</th>
    			      <th scope="col">Тип количества</th>
    			      <th scope="col">Количество</th>
    			      <th scope="col">Цена</th>
    			      <th scope="col">Статус</th>
    			      <th scope="col">Дата</th>
    			    </tr>
    			  </thead>
    			  <tbody>
    			  	@foreach($orders as $order)
    			    <tr>
    				    <th scope="row">{{ $order->id }}</th>
    				    <td><a href="{{ $order->service()->url() }}">{{ $order->service()->name }}</a></td>
    				    <td><a href="/experts/{{ $order->expert()->id }}">{{ $order->expert()->namef() }}</a></td>
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
    					<td>Выполняется</td>
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
