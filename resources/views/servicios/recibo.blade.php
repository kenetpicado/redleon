@extends('layout')

@section('title', 'Detalles servicio')

@section('main')
    <x-header-0>Recibo</x-header-0>

    <x-main>
        <div class="table-responsive">
            <table class="table table-borderless table-sm" width="100%" cellspacing="0">
                <th>
                    <tr class="text-uppercase text-center fw-bolder">
                        <td colspan="2">RED LEON</td>
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
                    <td width="50%">Cliente:</td>
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
            </table>
        </div>
    </x-main>
@endsection