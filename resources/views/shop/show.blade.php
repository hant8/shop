@extends('shop.layout')

@section('title',$product->code)
@if(isset($user))
@section('name')
{{$user->name}}<br>{{$user->role}}
@endsection
@endif

@section('content')

<div class="card">
  <div class="card-header">
  ID:{{$product->id}}
  </div>
    <div class="card-body">
      <h5 class="card-title">{{$product->name}}</h5>
      <img height="100" width="300" class="float-left" src="{{$product->image}}"  alt="..." >
      <div class="card-body">
        <p class="card-text" >{{$product->description}}</p>
        <a href="#" class="btn btn-warning">{{$product->price.' руб'}}</a>
      </div>
  </div>
</div>
@endsection