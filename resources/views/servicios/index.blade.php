@extends('layout')

@section('title', 'Servicios')

@section('main')
    <x-header-0>todos los servicios</x-header-0>

    <x-table>
        <x-slot name="title">
            <th>Cliente</th>
            <th>Tipo</th>
            <th>Periodo</th>
            <th>Inicio - Fin</th>
            <th>Estado</th>
            <th>Actualizar</th>
            <th>Detalles</th>
        </x-slot>
        <tbody>
            @foreach ($servicios as $servicio)
                <tr>
                    <td>{{ $servicio->nombre }}</td>
                    <td>{{ $servicio->tipo }}</td>
                    <td>{{ $servicio->periodo }}</td>
                    <td>
                        {{ date('d-m-y', strtotime($servicio->fecha_pago)) }}
                        <span class="badge bg-primary">
                            {{ date('d-m-y', strtotime($servicio->proximo_pago)) }}
                        </span>
                    </td>
                    <td>
                        @if ($servicio->proximo_pago > date('Y-m-d'))
                            <i class="fas fa-check-circle text-success"></i> Activo
                        @else
                            @if ($servicio->proximo_pago == date('Y-m-d'))
                                <i class="fas fa-exclamation-circle text-warning"></i> Pagar hoy
                            @else
                                <i class="fas fa-exclamation-circle text-danger"></i>
                                Retrasado
                            @endif
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('servicios.edit', $servicio->id) }}"
                            class="btn btn-sm btn-primary rounded-3">Actualizar</a>
                    </td>
                    <td>
                        <a href="{{ route('servicios.show', $servicio->id) }}"
                            class="btn btn-sm btn-secondary rounded-3">Detalles</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endsection
