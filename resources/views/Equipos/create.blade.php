<x-layout/>
<h1 class=" title">Registrar equipo</h1>

<div class=" mx-auto max-w-screen-sm card">
    <form action="{{route('equipos.store')}}" method="post">
         
        @csrf
        
        {{--Nombre--}}
        <div class=" mb-4">
            <label for="nombre">nombre</label>
            <input type="text" name="nombre" class="input" value="{{old('nombre')}}">
            @error('nombre')
                <p class="error">{{$message}}</p>
            @enderror

        {{--Submit Button--}}
        <button class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Create</button>
    </form>
</div>
</x-layout/>