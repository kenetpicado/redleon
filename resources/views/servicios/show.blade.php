@extends('layout')

@section('title', 'Detalles servicio')

@section('main')
    <x-header-2 text="Detalles">
        <a class="dropdown-item">Eliminar</a>
    </x-header-2>

    <x-main>
        <div class="table-responsive">
            <table class="table table-borderless" width="100%" cellspacing="0">
                <tr>
                    <td colspan="2">
                        @if ($servicio->proximo_pago > date('Y-m-d'))
                            <div class="alert alert-success" role="alert">
                                El servicio se encuentra activo.
                            </div>
                        @else
                            @if ($servicio->proximo_pago == date('Y-m-d'))
                                <div class="alert alert-warning" role="alert">
                                    El nuevo pago deberia efectuarse hoy.
                                </div>
                            @else
                                <div class="alert alert-danger" role="alert">
                                    El nuevo pago se encuentra retrasado.
                                    @php
                                        $date2 = new DateTime($servicio->proximo_pago);
                                        $date1 = new DateTime(date('Y-m-d'));
                                        $diff = $date1->diff($date2);
                                        echo $diff->days . ' dias ';
                                    @endphp
                                </div>
                            @endif
                        @endif
                    </td>
                </tr>
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
                    <td>Teléfono:</td>
                    <td>{{ $servicio->telefono }}</td>
                </tr>
                <tr>
                    <td>Cédula:</td>
                    <td>{{ $servicio->cedula }}</td>
                </tr>
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
                    <td>Tipo: </td>
                    <td>{{ $servicio->tipo }}</td>
                </tr>
                <tr>
                    <td>Operador: </td>
                    <td>{{ $servicio->operador }}</td>
                </tr>
                <tr>
                    <td>Periodo: </td>
                    <td>{{ $servicio->periodo }}</td>
                </tr>
                <tr>
                    <td>Inicio periodo: </td>
                    <td>
                        {{ date('d-m-Y', strtotime($servicio->fecha_pago)) }}
                    </td>
                </tr>
                <tr>
                    <td>Fin periodo: </td>
                    <td>
                        {{ date('d-m-Y', strtotime($servicio->proximo_pago)) }}
                    </td>
                </tr>
                <tr>
                    <td>Monto: </td>
                    <td>$ {{ $servicio->monto }}</td>
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
            </table>
        </div>
    </x-main>
@endsection
