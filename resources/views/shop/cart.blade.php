@extends('shop.layout')

@section('title','Корзина')
@if(isset($user))
@section('name')
<blockquote class="blockquote">
  <p>{{$user->name}} <br>{{$user->role}}</p>
</blockquote>
@endsection
@endif

@section('content')
@if($message)
<div class="alert alert-success" role="alert">
  {{$message}}
</div>
@endif
@foreach($cart as $product)
<div class="card">
  <div class="card-header">
  </div>
    <div class="card-body">
      <h5 class="card-title">{{$product->name}}</h5>
      <img height="100" width="300" class="float-left" src="/storage/products{{$product->attributes->image}}"  alt="..." >
      <div class="card-body">
      <p class="card-text" ><b>Количество - </b>{{$product->quantity}}</p>
        <p class="card-text" ><b>Цена - </b>{{$product->price.' руб'}}</p>
        <a href="{{route('removeProductCart',['id' => $product->id])}}" class="btn btn-warning">Удалить</a>
      </div>
  </div>
</div>
@endforeach
<h1 class="display-5">
  <p>Общая  сумма покупки - <mark>{{$sum}}</mark> руб.</p>
</h1>

  <form action="{{route('buy')}}" method="POST">
    @csrf
    <div  class="form-group">
      <label for="exampleInputPhone">Ваш номер</label>
      <input  name="phone" type="text" class="form-control">
    </div>
      @error('phone')
        <p class="text-red-500">Незаполненое поле</p>
      @enderror
     <button type="submit" class="btn btn-primary">Купить</button>
  </form>
  

  <div class="container mx-auto px-6 py-8">
                            <h3 class="text-gray-700 text-3xl font-medium">Ваши заказы</h3>

                            @foreach($orders as $order)
                            <div class="flex flex-col mt-8">
                                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                    <div
                                            class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                                        <table class="min-w-full">
                                            <thead>
                                            <tr>
                                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Заказ номер: {{$order->id}} </th>
                                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                                
                                            </tr>
                                            </thead>

                                            <tbody class="bg-white">
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                        <div class="text-sm leading-5 text-gray-900">
                                                            <p>
                                                              @foreach($order->cart_data as $product)
                                                              <b>Название товара </b>{{$product->name}}<br> 
                                                              <b>Количество </b>{{$product->quantity}}<br> 
                                                              <b>Цена </b>{{$product->price}}<br>
                                                              <img  height="100px" width="50px" src="/storage/products{{$product->attributes['image']}}">
                                                              @endforeach
                                                            </p>                                                         
                                                        </div>
                                                    </td>
                                                    
                                                    <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                                      <p class="h4">Сумма заказа: {{$order->total_sum}}</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>

  
@endsection