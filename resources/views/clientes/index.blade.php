@extends('layout')

@section('title', 'Clientes')

@section('main')
    @if (auth()->user()->rol == 'admin')
        <x-header-1>TODOS LOS CLIENTES</x-header-1>

        <x-modal title="Agregar - Cliente">
            <form action="{{ route('clientes.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <x-input name='nombre'></x-input>
                    <x-input name='direccion'></x-input>
                    <x-input name='telefono' type='number'></x-input>
                    <x-input name='cedula'></x-input>
                    <x-select-0 name="cobrador_id" :items="$cobradores" text="Asignar cobrador"></x-select-0>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary float-end">Guardar</button>
                </div>
            </form>
        </x-modal>
    @else
        <x-header-0>todos los Clientes</x-header-0>
    @endif

    <x-table>
        <x-slot name="title">
            <th>Nombre</th>
            <th>Dirección</th>
            <th>telefono</th>
            <th>Servicio</th>
            <th>Opciones</th>
        </x-slot>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td><a class="btn btn-sm btn-primary" href="{{ route('clientes.show', $cliente->id) }}">Servicio</a>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button"
                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Opciones
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ route('clientes.edit', $cliente->id) }}">Detalles</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('registros.index', $cliente->id) }}">Registros</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endsection
