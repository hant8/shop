@extends('shop.layout')

@section('title',$product->code)
@if(isset($user))
@section('name')
<blockquote class="blockquote">
  <p>{{$user->name}} <br>{{$user->role}}</p>

</blockquote>
@endsection
@endif

@section('content')


<div class="card">
  <div class="card-header">
  ID:{{$product->id}}
  </div>
  <dl class="row">
  <dt class="col-sm-3"><img height="100" width="300" class="float-left" src="/storage/products{{$product->image}}"  alt="..." ></dt>
  <dd class="col-sm-9"><h1 class="display-4">{{$product->name}}</h1></dd>

  <dt class="col-sm-3"> Цена</dt>
  <dd class="col-sm-9">
    <p>{{$product->price.' руб.'}}</p>
  </dd>

  <dt class="col-sm-3">Описание товара</dt>
  <dd class="col-sm-9">{{$product->description}}</dd>

  <dt class="col-sm-3 text-truncate">Купить</dt>
  <dd class="col-sm-9"><a href="{{route('cartAdd',['id' => $product->id])}}" class="btn btn-warning">Добавит в корзину</a></dd>
</dl>
</div>
@endsection