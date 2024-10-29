<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    @vite('resources/css/app.css')
</head>
<body class=" bg-slate-100 text-slate-900">
    <header class=" bg-slate-800 shadow-lg">
        <nav>
            <a href="{{route('home')}}" class="nav-link">home</a>
            @auth
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Logout</button>
            </form>

            @endauth
            @guest
            <div class=" flex items-center gap-4">
                <a href="{{route('login')}}" class="nav-link">Login</a>
                <a href="{{route('register')}}" class="nav-link">Register</a>
            </div>                
            @endguest
        </nav>
    </header>
    <Main class=" py-8 px-4 mx-auto max-w-screen-lg">
       {{$slot}}
    </Main>
</body>
</html>