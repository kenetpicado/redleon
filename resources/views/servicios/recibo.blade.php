@extends('layout')

@section('title', 'Detalles servicio')

@section('main')
    <x-header-0>Recibo</x-header-0>

    <x-main>
        <div class="table-responsive">
            <table class="table table-borderless table-sm" width="100%" cellspacing="0">
                <th>
                    <tr class="text-uppercase text-center fw-bolder">
                        <td colspan="2">
                            <img src="{{asset('img/logo.png')}}" alt="" width="15%" height="auto">
                            <br>
                            RED LEON
                        </td>
                    </tr>
                </th>
                <th>
                    <tr class="text-center small fw-bolder">
                        <td colspan="2">
                            RUC: 2811611860004
                            <br>
                            Tel: 88893518
                            <br>
                            Direccion: Implagsa 3 C abajo. 1 C al sur.
                            <br>
                            Correo: sistemainformaticoempresarial@gmail.com
                        </td>
                    </tr>
                </th>
                <th>
                    <tr class="text-uppercase small fw-bolder">
                        <td colspan="2">Información del servicio</td>
                    </tr>
                </th>
                <tr>
                    <td width="50%">Factura:</td>
                    <td class="fw-bolder">N° {{ str_pad($registro->id ?? 'X', 4, "0", STR_PAD_LEFT)  }}</td>
                </tr>
                <tr>
                    <td>Cliente:</td>
                    <td>{{ $servicio->nombre }}</td>
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
                    <td>Cobrador: </td>
                    <td>
                        {{ $servicio->nombre_cobrador ?? '-'}}
                    </td>
                </tr>
                <tr>
                    <td> <strong>Monto: </strong> </td>
                    <td class="fw-bolder">C$ {{ $servicio->monto ?? '-' }}</td>
                </tr>
            </table>
        </div>
    </x-main>
@endsection
