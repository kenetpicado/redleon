@extends('layout')

@section('title', 'Clientes')

@section('main')
    <x-header-0>Todos los Clientes</x-header-0>

    <x-table>
        <x-slot name="title">
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Cedula</th>
            <th>Nota</th>
        </x-slot>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->cedula }}</td>
                    <td>{{ $cliente->nota }}</td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endsection
