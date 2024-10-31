<x-layout/>
    <h1 class=" title">Vehiculos</h1>


    @if(session('success'))
    <div class="bg-green-100 dark:bg-green-900 border border-green-400 text-green-700 dark:text-green-200 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">¡Éxito!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif


    <table>
        <tr>
            <th>Patente</th>
            <th>Chasis</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Opciones</th>
        </tr>
        @foreach ($vehiculos as $vehiculo )
        <tr>
                <th>{{ $vehiculo ->patente }}</th>
                <th>{{ $vehiculo ->chasis }}</th>
                <td>{{ $vehiculo->modelo->nombre }}</td>
                <td>{{ $vehiculo->modelo->marca->nombre }}</td>
                <th>
                    <a href="{{route("vehiculos.edit", $vehiculo)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Editar</a>
                    
                    <form action="{{ route('vehiculos.destroy', $vehiculo) }}" method="post" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este vehiculo?');">
                        @csrf
                        @method("DELETE")
                        <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"> Eliminar </button>
                    </form>
                </th>
        </tr>
        @endforeach
    </table>
    <div>
        {{$vehiculos->links()}}
    </div>
    <div>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('vehiculos.create') }}" class="bg-green-500 text-white p-2 rounded">
                Crear Vehículo +
            </a>
        </h2>
    </div>

</x-layout/>