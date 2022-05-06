@extends('shop.layout')

@section('title','Каталог')

@if(isset($user))
@section('name')
{{$user->name}}<br>{{$user->role}}
@endsection
@endif

@section('content')

<div class="container mx-auto px-6 py-8">
                            <h3 class="text-gray-700 text-3xl font-medium">Каталог</h3>

                            <div class="mt-8">

                            </div>
                            @foreach($categories as $category)
                            <div class="flex flex-col mt-8">
                                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                    <div
                                            class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                                        <table class="min-w-full">
                                            <thead>
                                            <tr>
                                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    <h5>{{$category->name}}</h5></th>
                                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                                
                                            </tr>
                                            </thead>

                                            <tbody class="bg-white">
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                        <div class="text-sm leading-5 text-gray-900">
                                                            <p>
                                                                @foreach($category->productСategory as $product)
                                                                    <b>{{$product->name}}</b>
                                                                    <br>
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                    </td>
                                                    
                                                    <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                                        
                                                        <a href="/showCategory/{{$category->id}}">
                                                            <button type="button" class="btn btn-success">Просмотр каталога</button>
                                                        </a>
                                                        
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