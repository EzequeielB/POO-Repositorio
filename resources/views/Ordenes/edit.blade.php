<x-layout/>
<h1 class=" title">Editar Orden</h1>

<div class=" mx-auto max-w-screen-sm card">
    <form action="{{route('ordenes.update', $orden)}}" method="post">
        @csrf
        @method('PUT')
        {{-- Cliente --}}
        <div class="mb-4">
            <label for="cliente_id">Cliente</label>
            <select id="cliente_id" name="cliente_id" class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:text-gray-100 sm:text-sm">
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $orden->cliente_id == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nombre }} {{ $cliente->apellido }}
                    </option>
                @endforeach   
            </select>  
        </div>

        {{-- Equipo --}}
        <div class="mb-4">
            <label for="equipo_id">Equipo</label>
            <select id="equipo_id" name="equipo_id" class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:text-gray-100 sm:text-sm">
                @foreach ($equipos as $equipo)
                    <option value="{{ $equipo->id }}">
                        {{ $equipo->nombre }}
                    </option>
                @endforeach   
            </select>
        </div>

        {{-- Tipo --}}
        <div class="mb-4">
            <label for="tipo_id">Tipo</label>
            <select id="tipo_id" name="tipo_id" class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:text-gray-100 sm:text-sm">
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->id }}">
                        {{ $tipo->nombre }}
                    </option>
                @endforeach   
            </select>
        </div>

        {{-- Descripción --}}
        <div class="mb-4">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="input" cols="30" rows="10">{{$orden->cliente}}</textarea>

            @error('descripcion')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        {{-- Submit Button --}}
        <button class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Crear</button>
    </form>
</div>
</x-layout/>
