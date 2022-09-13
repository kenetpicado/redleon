@extends('layout')

@section('title', 'Cobradores')

@section('main')
    <x-header-1>todos los cobradores</x-header-1>

    <x-modal title="Agregar - Cobrador">
        <form action="{{ route('cobradors.store') }}" method="post">
            @csrf
            <div class="modal-body">
                <x-input name='nombre'></x-input>
                <x-input name='usuario'></x-input>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary float-end">Guardar</button>
            </div>
        </form>
    </x-modal>

    <x-table>
        <x-slot name="title">
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Clientes</th>
            <th>Editar</th>
        </x-slot>
        <tbody>
            @foreach ($cobradores as $cobrador)
                <tr>
                    <td>{{ $cobrador->nombre }}</td>
                    <td>{{ $cobrador->usuario }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('cobradors.clientes', $cobrador->id) }}">Clientes</a>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-secondary" href="{{ route('cobradors.edit', $cobrador->id) }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endsection
