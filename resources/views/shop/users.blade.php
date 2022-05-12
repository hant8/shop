@extends('shop.layout')

@section('title','Пользователи')

@if(isset($user))
@section('name')
<blockquote class="blockquote">
  <p>{{$user->name}} <br>{{$user->role}}</p>

</blockquote>
@endsection
@endif

@section('content')
    <div class="container mx-auto px-6 py-8">
                            <h3 class="text-gray-700 text-3xl font-medium">Пользователи</h3>

                            @foreach($clients as $client)
                            <div class="flex flex-col mt-8">
                                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                    <div
                                            class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                                        <table class="min-w-full">
                                            <thead>
                                            <tr>
                                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    {{$client->name}}</th>
                                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                                
                                            </tr>
                                            </thead>

                                            <tbody class="bg-white">
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                        <div class="text-sm leading-5 text-gray-900">
                                                            <p>
                                                                <b>Email: </b>{{$client->email}}
                                                                <b>Права доступа: </b>{{$client->role}}
                                                            </p>
                                                        </div>
                                                    </td>
                                                    
                                                    <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                                        @auth('admin')
                                                        @if(!($client->role === 'admin'))
                                                        <a href="/delete/{{$client->id}}" class="text-red-600 hover:text-red-900">Удалить</a>
                                                        @endif
                                                        @endauth
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