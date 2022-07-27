@extends('layout')

@section('title', 'Clientes')

@section('main')
    <x-header-1 route="clientes.create">todos los Clientes</x-header-1>

    <x-table>
        <x-slot name="title">
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Cedula</th>
            <th>Nota</th>
            <th>Opciones</th>
        </x-slot>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->cedula }}</td>
                    <td>{{ $cliente->nota }}</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Opciones
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ route('clientes.show', $cliente->id) }}">Pagar</a></li>
                                <li><a class="dropdown-item" href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('registros.index', $cliente->id) }}">Registros</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endsection
