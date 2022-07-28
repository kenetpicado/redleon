@extends('layout')

@section('title', 'Clientes')

@section('main')
    @if (auth()->user()->rol == 'admin')
        <x-header-1 route="clientes.create">todos los Clientes</x-header-1>
    @else
        <x-header-0>todos los Clientes</x-header-0>
    @endif

    <x-table>
        <x-slot name="title">
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Nota</th>
            <th>Pagar</th>
            @if (auth()->user()->rol == 'admin')
                <th>Opciones</th>
            @endif
        </x-slot>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->nota }}</td>
                    <td><a class="btn btn-sm btn-primary" href="{{ route('clientes.show', $cliente->id) }}">Pagar</a></td>
                    @if (auth()->user()->rol == 'admin')
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button"
                                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Opciones
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item"
                                            href="{{ route('clientes.detalles', $cliente->id) }}">Detalles</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('registros.index', $cliente->id) }}">Registros</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endsection
