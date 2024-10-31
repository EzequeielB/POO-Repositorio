<x-layout/>
<h1 class=" title">Registrar Equipo de Trabajo</h1>

<div class=" mx-auto max-w-screen-sm card">
    <form action="{{route('equiposdetrabajo.store')}}" method="post">
         
        @csrf

        {{--vehiculo--}}
        <div class=" mb-4">
             <select id="select_opcion" name="vehiculo_id"
                    class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:text-gray-100 sm:text-sm"
            >
            @foreach ($vehiculos as $vehiculo)
                <option value="{{ $vehiculo->id }}">
                    {{ $vehiculo->patente }}
                </option>
            @endforeach   
        </select>
        
        {{--equipo--}}
        <div class=" mb-4">
            <select id="select_opcion" name="equipo_id"
            class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:text-gray-100 sm:text-sm"
        >
            @foreach ($equipos as $equipo)
                <option value="{{ $equipo->id }}">
                    {{ $equipo->nombre }}
                </option>
            @endforeach   
        </select>

                {{--tecnico--}}
                <div class=" mb-4">
                    <select id="select_opcion" name="tecnico_id"
                    class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:text-gray-100 sm:text-sm"
                >
                    @foreach ($tecnicos as $tecnico)
                        <option value="{{ $tecnico->id }}">
                            {{ $tecnico->nombre }} {{ $tecnico->apellido }}
                        </option>
                    @endforeach   
                </select>

        {{--Submit Button--}}
        <button class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Create</button>
    </form>
</div>
</x-layout/>