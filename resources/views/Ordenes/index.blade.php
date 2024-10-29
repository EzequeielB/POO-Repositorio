<x-layout/>
<h1>ORDENES</h1>
<div>
    <table>
        <tr>
            <th>Titulo</th>
            <th>Cliente</th>
            <th>Equipo</th>
            <th>Tipo</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
        @foreach ($ordenes as $orden )
        <tr>
                <th>{{ $orden->id }}</th>
                <th>{{ $orden->cliente->nombre }}</th>
                <td>{{ $orden->equipo->nombre }}</td>
                <td>{{ $orden->tipo->nombre_estado }}</td>
                <td>{{ $orden->estado->nombre_estado }}</td>
                <th>
                    <a href="{{route("ordenes.edit", $orden)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Editar</a>
                    
                    <form action={{route("ordenes.destroy", $orden)}} method="post">
                        @csrf
                        @method("DELETE")
                        <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"> Eliminar </button>
                    </form>
                </th>
        </tr>
        @endforeach
    </table>
</div>
<div>
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        <a href="{{ route('ordenes.create') }}" class="bg-green-500 text-white p-2 rounded">
            Crear Orden +
        </a>
    </h2>
</div>
</x-layout/>