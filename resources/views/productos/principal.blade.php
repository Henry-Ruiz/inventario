@extends('layout.plantilla')

@section('titulo', 'Principal')

@section('contenido')
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Aquí se va a mostrar todos los productos</h1>
    </div>
</header>
<br>

<div class="container mx-auto">
    <a href="{{ route('producto.crear') }}">
        <button class="bg-red-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Nuevo Registro</button>
    </a>
    <br><br>

    <!-- component -->
    <table class="min-w-full border-collapse block md:table">
        <thead class="block md:table-header-group">
            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative">
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nombre</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Precio</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Descripción</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Categoría</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Operaciones</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group">
            @foreach ($prod as $produ)
                <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <span class="inline-block w-1/3 md:hidden font-bold">Nombre</span>
                        <a href="{{ route('producto.mostrar', $produ->id) }}">{{ $produ->nombre }}</a>
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <span class="inline-block w-1/3 md:hidden font-bold">Precio</span>{{ $produ->precio }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <span class="inline-block w-1/3 md:hidden font-bold">Descripción</span>{{ $produ->descripcion }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <span class="inline-block w-1/3 md:hidden font-bold">Categoría</span>{{ $produ->categoria }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <span class="inline-block w-1/3 md:hidden font-bold">Operaciones</span>
                        <a href="{{ route('producto.mostrar', $produ->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-green-500 rounded">Ver</a>
                        <a href="{{ route('producto.editar', $produ->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Editar</a>
                        <form action="{{ route('producto.eliminar', $produ->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Confirma eliminar?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $prod->links() }}
</div>
@endsection
