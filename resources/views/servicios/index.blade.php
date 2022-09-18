@extends('layout')

@section('title', 'Servicios')

@section('main')
    <x-header-0>todos los servicios</x-header-0>

    <x-table>
        <x-slot name="title">
            <th>Cliente</th>
            <th>Tipo</th>
            <th>Fin</th>
            <th>Estado</th>
            <th>Detalles</th>
        </x-slot>
        <tbody>
            @foreach ($servicios as $servicio)
                <tr>
                    <td>{{ $servicio->nombre }}</td>
                    <td>{{ $servicio->tipo }}</td>
                    <td>{{ $servicio->periodo_fin }}</td>
                    <td>
                        @if ($servicio->periodo_fin > date('Y-m-d'))
                            <i class="fas fa-check-circle text-success"></i> Activo
                            @php
                                $date2 = new DateTime($servicio->periodo_fin);
                                $date1 = new DateTime(date('Y-m-d'));
                                $diff = $date1->diff($date2);
                                echo '(' . $diff->days . ' dias)';
                            @endphp
                        @else
                            @if ($servicio->periodo_fin == date('Y-m-d'))
                                <i class="fas fa-exclamation-circle text-warning"></i> Pagar hoy
                            @else
                                <i class="fas fa-exclamation-circle text-danger"></i>
                                Retrasado
                                @php
                                $date2 = new DateTime($servicio->periodo_fin);
                                $date1 = new DateTime(date('Y-m-d'));
                                $diff = $date1->diff($date2);
                                echo '(' . $diff->days . ' dias)';
                            @endphp
                            @endif
                        @endif
                    </td>
                    <td> <a class="btn btn-sm btn-primary" href="{{ route('servicios.show', $servicio->id) }}">Detalles</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endsection
