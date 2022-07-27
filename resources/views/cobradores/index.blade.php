@extends('layout')

@section('title', 'Cobradores')

@section('main')
    <x-header-1 route="cobradors.create">todos los cobradores</x-header-1>

    <x-table>
        <x-slot name="title">
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Ver clientes</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </x-slot>
        <tbody>
            @foreach ($cobradores as $cobrador)
                <tr>
                    <td>{{ $cobrador->nombre }}</td>
                    <td>{{ $cobrador->usuario }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('cobradors.clientes', $cobrador->id) }}">Ver clientes</a>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('cobradors.edit', $cobrador->id) }}">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('cobradors.destroy', $cobrador->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endsection
