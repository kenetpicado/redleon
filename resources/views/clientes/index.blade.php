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
            <th>Servicio</th>
            <th>Editar</th>
        </x-slot>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->cedula }}</td>
                    <td>
                        <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-sm btn-primary rounded-3">
                            Pagar</a>
                        </td>
                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id) }}"
                            class="btn btn-sm btn-secondary rounded-3">Editar</a></td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endsection
