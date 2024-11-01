<x-layout/>
<h1 class=" title">Editar cliente</h1>

<div class=" mx-auto max-w-screen-sm card">
    <form action="{{route('clientes.update',$cliente)}}" method="post">
        @csrf
        @method('PUT')

        {{--nombre--}}
        <div class=" mb-4">
            <label for="nombre">nombre</label>
            <input type="text" name="nombre" class="input" value="{{$cliente->nombre}}">
            @error('nombre')
                <p class="error">{{$message}}</p>
            @enderror
        </div>
        {{--apellido--}}
        <div class=" mb-4">
            <label for="apellido">apellido</label>
            <input type="text" name="apellido" class="input" value="{{$cliente->apellido}}">
            @error('apellido')
                <p class="error">{{$message}}</p>
            @enderror
        </div>

        {{--DNI--}}
        <div class=" mb-4">
            <label for="DNI">DNI</label>
            <input type="text" name="DNI" class="input" value="{{$cliente->DNI}}">
            @error('DNI')
                <p class="error">{{$message}}</p>
            @enderror
        </div>

            {{--telefono--}}
        <div class=" mb-4">
            <label for="telefono">telefono</label>
            <input type="text" name="telefono" class="input" value="{{$cliente->telefono}}">
            @error('telefono')
                <p class="error">{{$message}}</p>
            @enderror
        </div>
        {{--correo--}}
        <div class=" mb-4">
            <label for="correo">correo</label>
            <input type="text" name="correo" class="input" value="{{$cliente->correo}}">
            @error('correo')
                <p class="error">{{$message}}</p>
            @enderror
        </div>

        {{--Submit Button--}}
        <button class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Update</button>
    </form>
</div>
</x-layout/>