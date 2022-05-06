@extends('shop.layout')

@section('title', 'Товары')
@if(isset($user))
@section('name')
{{$user->name}}<br>{{$user->role}}
@endsection
@endif

@section('content')

@auth('admin')
    <a href="{{route('create')}}">
      <button type="button" class="btn btn-primary">Добавить</button>
    </a>
  @endauth  
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Наименование</th>
      <th scope="col">Код</th>
      <th scope="col">Колличество</th>
      <th scope="col">Цена</th>
      <th scope="col">Изображение</th>
      <th scope="col">Действие</th>
    </tr>
  </thead>
  <tbody>
      @foreach($products as $product)
    <tr>
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->name}}</td>
      <td>{{$product->code}}</td>
      <td>{{$product->amount}}</td>
      <td>{{$product->price}}</td>
      <td><img  height="100px" width="50px" src="{{$product->image}}"></td>
      <td>
        @auth('admin')
            <a href="{{route('edit',$product->id)}}">
                <button type="button" class="btn btn-warning">Редактирование</button>
            </a>
            <a href="/deleteProduct/{{$product->id}}">
                <button type="button" class="btn btn-danger">Удаление</button>
            </a>
        @endauth
          <a href="/show/{{$product->id}}">
            <button type="button" class="btn btn-success">Просмотр</button>
          </a>
      </td>
    </tr>
        @endforeach   
  </tbody>
</table>
<form action="{{route('filter')}}" method="POST">
  @csrf
<label for="staticEmail" class="col-sm-2 col-form-label">Цена</label>
  <div class="row">
    <div class="col">
      <input name="min" type="text" class="form-control" placeholder="От">
    </div>
    <div class="col">
      <input name="max" type="text" class="form-control" placeholder="До">
    </div>
  </div>
  <br>
  <button type="submit" class="btn btn-dark">Показать</button>
</form>
@endsection

