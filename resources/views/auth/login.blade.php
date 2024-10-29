<x-layout/>

    <h1 class=" title">Login</h1>

    <div class=" mx-auto max-w-screen-sm card">
        <form action="{{route('login')}}" method="post">
             
            @csrf

            {{--Email--}}
            <div class=" mb-4">
                <label for="email">Email</label>
                <input type="text" name="email" class=" input" value="{{old('email')}}">
                @error('email')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            {{--Password--}}
            <div class=" mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" class=" input" value="{{old('password')}}">
                @error('password')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            {{--Recordar--}}
            <div class=" mb-4">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>
            @error('failed')
            <p class="error">{{$message}}</p>
            @enderror
            {{--Login Button--}}
            <button class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Login</button>
        </form>
    </div>
</x-layout/>

