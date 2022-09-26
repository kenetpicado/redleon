@extends('layout')

@section('title', 'Detalles servicio')

@section('main')
    <x-header-0>Detalles</x-header-2>
        <x-main>

            @if ($servicio->periodo_fin > date('Y-m-d'))
                <div class="alert alert-success mb-0" role="alert">
                    El servicio se encuentra activo.
                </div>
            @else
                @if ($servicio->periodo_fin == date('Y-m-d'))
                    <div class="alert alert-warning mb-0" role="alert">
                        El nuevo pago deberia efectuarse hoy.
                    </div>
                @else
                    <div class="alert alert-danger mb-0" role="alert">
                        El nuevo pago se encuentra retrasado.
                        @php
                            $date2 = new DateTime($servicio->periodo_fin);
                            $date1 = new DateTime(date('Y-m-d'));
                            $diff = $date1->diff($date2);
                            echo $diff->days . ' dias ';
                        @endphp
                    </div>
                @endif
            @endif
            <a class="btn btn-secondary mt-3" href="{{ route('servicios.edit', $servicio->id) }}">Realizar pago</a>
            <a class="btn btn-secondary mt-3" href="{{ route('servicios.recibo', $servicio->id) }}" target="_blank">Ver recibo</a>

            <table class="table table-borderless">
                <th>
                    <tr class="text-uppercase small fw-bolder">
                        <td colspan="2">Información del Cliente</td>
                    </tr>
                </th>
                <tr>
                    <td width="50%">Nombre:</td>
                    <td>{{ $servicio->nombre }}</td>
                </tr>
                <tr>
                    <td>Dirección:</td>
                    <td>{{ $servicio->direccion }}</td>
                </tr>
                <tr>
                    <td>Nota:</td>
                    <td>{{ $servicio->nota }}</td>
                </tr>
                @admin
                    <tr>
                        <td>Teléfono:</td>
                        <td>{{ $servicio->telefono }}</td>
                    </tr>
                    <tr>
                        <td>Cédula:</td>
                        <td>{{ $servicio->cedula }}</td>
                    </tr>
                @endadmin

                <th>
                    <tr class="text-uppercase small fw-bolder">
                        <td colspan="2">Información del servicio</td>
                    </tr>
                </th>
                <tr>
                    <td>Inicio: </td>
                    <td>
                        {{ date('d-m-Y', strtotime($servicio->inicio)) }}
                    </td>
                </tr>

                <tr>
                    <td>Periodo: </td>
                    <td>{{ $servicio->periodo }}</td>
                </tr>
                <tr>
                    <td>Inicio del servicio: </td>
                    <td>
                        {{ date('d-m-Y', strtotime($servicio->periodo_inicio)) }}
                    </td>
                </tr>
                <tr>
                    <td>Fin del servicio: </td>
                    <td>
                        {{ date('d-m-Y', strtotime($servicio->periodo_fin)) }}
                    </td>
                </tr>
                <tr>
                    <td>Monto</td>
                    <td>
                        C$ {{ $servicio->monto ?? '-' }}
                    </td>
                </tr>
                @admin
                    <tr>
                        <td>Tipo: </td>
                        <td>{{ $servicio->tipo }}</td>
                    </tr>
                    <tr>
                        <td>Operador: </td>
                        <td>{{ $servicio->operador }}</td>
                    </tr>
                    <tr>
                        <td>Equipo: </td>
                        <td>{{ $servicio->equipo_instalado }}</td>
                    </tr>
                    <tr>
                        <td>MAC: </td>
                        <td>{{ $servicio->mac }}</td>
                    </tr>
                    <tr>
                        <td>Velocidad: </td>
                        <td>{{ $servicio->velocidad }}</td>
                    </tr>
                @endadmin
            </table>
        </x-main>
    @endsection
