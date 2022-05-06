<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Регистрация</title>

        <link href="https://unpkg.com/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
            <div class="bg-white w-96 shadow-xl rounded p-5">
                <h1 class="text-3xl font-medium">Регистрация</h1>

                <form action="{{route('register_proccess')}}" method="POST" class="space-y-5 mt-5">
                    @csrf
                    @error('name')
                        <p class="text-red-500">Неккоректное имя</p>
                    @enderror
                    <input name="name" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Имя" />
                    @error('email')
                        <p class="text-red-500">Неккоректный email</p>
                    @enderror
                    <input name="email" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Email" />
                    @error('password')
                        <p class="text-red-500">Неккоректный password</p>
                    @enderror
                    <input name="password" type="password" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Пароль" />
                    @error('password_confirmation')
                        <p class="text-red-500">Пароли не совпадают</p>
                    @enderror
                    <input name="password_confirmation" type="password" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Подтверждение пароля" />

                    <div>
                        <a href="{{route('login')}}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Есть аккаунт?</a>
                    </div>

                    <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </body>
</html>
