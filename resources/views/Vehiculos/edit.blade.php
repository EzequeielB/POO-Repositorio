<x-layout/>
<h1 class=" title">Editar Vehiculo</h1>

<div class=" mx-auto max-w-screen-sm card">
    <form action="{{route('vehiculos.update',$vehiculo)}}" method="post">
        @csrf
        @method('PUT')

        {{--Patente--}}
        <div class=" mb-4">
            <label for="patente">Patente</label>
            <input type="text" name="patente" class="input" value="{{$vehiculo->patente}}">
            @error('patente')
                <p class="error">{{$message}}</p>
            @enderror
        </div>
        {{--Chasis--}}
        <div class=" mb-4">
            <label for="chasis">Chasis</label>
            <input type="text" name="chasis" class="input" value="{{$vehiculo->chasis}}">
            @error('chasis')
                <p class="error">{{$message}}</p>
            @enderror
        </div>
        {{--Modelo--}}
        <div class=" mb-4">
            <select id="select_opcion" name="modelo_id"
        >
            @foreach ($modelos as $modelo)
                <option value="{{ $modelo->id }}" {{ $vehiculo->modelo_id == $modelo->id ? 'selected' : '' }}">
                    {{ $modelo->mostrarDatosMarca() }}
                </option>
            @endforeach   
        </select>

        {{--Submit Button--}}
        <button class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Update</button>
    </form>
</div>
</x-layout/>