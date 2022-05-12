@extends('shop.layout')

@section('title', isset($product)?'Редактирование':'Создание')

@section('name')
<blockquote class="blockquote">
  <p>{{$user->name}} <br>{{$user->role}}</p>

</blockquote>
@endsection

@section('content')
                            <div class="container mx-auto px-6 py-8">
                                    <h3 class="text-gray-700 text-3xl font-medium">{{isset($product)?'Редактирование товара':'Добавление товара'}}</h3>

                                    <div class="mt-8">

                                    </div>

                                    <div class="mt-8">
                                <form  enctype="multipart/form-data" class="space-y-5 mt-5" method="POST" action="{{isset($product)?'/update/'.$product->id:'/store'}}">
                                    @csrf
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text" id="inputGroup-sizing-lg">Название</span>
                                    <input name="name" type="text" value="{{isset($product)?$product->name:''}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                    @error('name')
                                    <p class="text-red-500">Незаполненое поле</p>
                                    @enderror
                                </div>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text" id="inputGroup-sizing-lg">Код</span>
                                    <input  name="code" type="text" value="{{isset($product)?$product->code:''}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                    @error('code')
                                    <p class="text-red-500">Незаполненое поле</p>
                                    @enderror
                                </div>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text" id="inputGroup-sizing-lg">Количество</span>
                                    <input name="amount" type="text" value="{{isset($product)?$product->amount:''}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                    @error('amount')
                                    <p class="text-red-500">Незаполненое поле</p>
                                    @enderror
                                </div>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text" id="inputGroup-sizing-lg">Цена</span>
                                    <input name="price" type="text" value="{{isset($product)?$product->price:''}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                    @error('price')
                                    <p class="text-red-500">Незаполненое поле</p>
                                    @enderror
                                </div>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text" id="inputGroup-sizing-lg">Описание</span>
                                    <input name="description" type="text" value="{{isset($product)?$product->description:''}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                    @error('description')
                                    <p class="text-red-500">Незаполненое поле</p>
                                    @enderror
                                </div>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text" id="inputGroup-sizing-lg">Категория</span>
                                    <select name="category_id">
                                        @foreach($categories as $category)
	                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @if(isset($product) && $product->image)
                                
                                    <div>
                                        <img  class="h-64 w-64" src="/storage/products{{$product->image}}">
                                    </div>
                
                                @endif  
                                    @error('image')
                                    <p class="text-red-500">Незаполненое поле</p>
                                    @enderror 
                                    <input name="image" type="file" class="w-full h-12" placeholder="Обложка" />

                                    <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Сохранить</button>
                                </form>
                            </div>
                        </div>                        
@endsection