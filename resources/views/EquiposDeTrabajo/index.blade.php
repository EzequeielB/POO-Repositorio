<x-layout/>
    <h1 class=" title">equiposDeTrabajo</h1>


    @if(session('success'))
    <div class="bg-green-100 dark:bg-green-900 border border-green-400 text-green-700 dark:text-green-200 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">¡Éxito!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif


    <table>
        <tr>
            <th>Vehiculo</th>
            <th>Equipo</th>
            <th>Tecnico</th>
            <th>Opciones</th>
        </tr>
        @foreach ($equiposdetrabajo as $equipodetrabajo )
        <tr>
                <th>{{ $equipodetrabajo ->vehiculo->patente }}</th>
                <th>{{ $equipodetrabajo ->equipo->nombre}}</th>
                <td>{{ $equipodetrabajo->tecnico->nombre}}</td>
                <th>
                    <a href="{{route("equiposdetrabajo.edit", $equipodetrabajo)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Editar</a>
                    
                    <form action="{{ route('equiposdetrabajo.destroy', $equipodetrabajo) }}" method="post" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este Equipo De Trabajo?');">
                        @csrf
                        @method("DELETE")
                        <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"> Eliminar </button>
                    </form>
                </th>
        </tr>
        @endforeach
    </table>
    <div>
        {{$equiposdetrabajo->links()}}
    </div>
    <div>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('equiposdetrabajo.create') }}" class="bg-green-500 text-white p-2 rounded">
                Crear Equipo de Trabajo +
            </a>
        </h2>
    </div>

</x-layout/>