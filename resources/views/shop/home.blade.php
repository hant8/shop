@extends('shop.layout')

@section('title','Главная')

@if(isset($user))
@section('name')
{{$user->name}}<br>{{$user->role}}
@endsection
@endif

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 mb-20">
        @foreach($products as $product)

            <div class="px-4 py-8 max-w-xl">
                <div class="bg-white shadow-2xl" >
                    <div>
                        <img  height="400px" width="300px" src="/storage/products{{$product->image}}">
                    </div>
                    <div class="px-4 py-2 mt-2 bg-white">
                        <h2 class="font-bold text-2xl text-gray-800">{{$product->name}}</h2>
                        <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                        <h3>{{$product->price.' руб.'}}</h3>
                        <a href="/show/{{$product->id}}">
                            <button type="button" class="btn btn-success">Просмотр</button>
                        </a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection