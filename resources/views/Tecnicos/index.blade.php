<x-layout/>
    <h1 class=" title">Tecnicos</h1>


    @if(session('success'))
    <div class="bg-green-100 dark:bg-green-900 border border-green-400 text-green-700 dark:text-green-200 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">¡Éxito!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif


    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>CUIL</th>
            <th>Telefono</th>
            <th>Correo</th>
        </tr>
        @foreach ($tecnicos as $tecnico )
        <tr>
                <th>{{ $tecnico->nombre }}</th>
                <th>{{ $tecnico->apellido }}</th>
                <td>{{ $tecnico->DNI }}</td>
                <td>{{ $tecnico->CUIL }}</td>
                <td>{{ $tecnico->telefono}}</td>
                <td>{{ $tecnico->correo}}</td>
                <th>
                    <a href="{{route("tecnicos.edit", $tecnico)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Editar</a>
                    
                    <form action="{{ route('tecnicos.destroy', $tecnico) }}" method="post" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este tecnico?');">
                        @csrf
                        @method("DELETE")
                        <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"> Eliminar </button>
                    </form>
                </th>
        </tr>
        @endforeach
    </table>
    <div>
        {{$tecnicos->links()}}
    </div>
    <div>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('tecnicos.create') }}" class="bg-green-500 text-white p-2 rounded">
                Añadir tecnico +
            </a>
        </h2>
    </div>

</x-layout/>