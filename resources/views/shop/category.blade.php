@extends('shop.layout')

@section('title', 'Товары Категории')
@if(isset($user))
@section('name')
{{$user->name}}<br>{{$user->role}}
@endsection
@endif

@section('content')
 
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Наименование</th>
      <th scope="col">Колличество</th>
      <th scope="col">Цена</th>
      <th scope="col">Изображение</th>
      <th scope="col">Действие</th>
    </tr>
  </thead>
  <tbody>
      @foreach($category->productСategory as $product)
    <tr>
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->name}}</td>
      <td>{{$product->amount}}</td>
      <td>{{$product->price}}</td>
      <td><img  height="100px" width="50px" src="/storage/products{{$product->image}}"></td>
      <td>
          <a href="/show/{{$product->id}}">
            <button type="button" class="btn btn-success">Просмотр</button>
          </a>
      </td>
    </tr>
        @endforeach   
  </tbody>
</table>
   
@endsection