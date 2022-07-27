@extends('layout')

@section('title', 'Detalles cliente')

@section('main')
    <x-header-0>
        Detalles
    </x-header-0>

    <x-main>
        <div class="table-responsive">
            <table class="table table-borderless" width="100%" cellspacing="0">
                <th>
                    <tr class="text-uppercase small fw-bolder">
                        <td colspan="2">Información del Cliente</td>
                    </tr>
                </th>
                <tr>
                    <td width="50%">Nombre:</td>
                    <td>{{ $cliente->nombre }}</td>
                </tr>
                <tr>
                    <td>Dirección:</td>
                    <td>{{ $cliente->direccion }}</td>
                </tr>
                <tr>
                    <td>Teléfono:</td>
                    <td>{{ $cliente->telefono }}</td>
                </tr>
                <tr>
                    <td>Cédula:</td>
                    <td>{{ $cliente->cedula }}</td>
                </tr>
            </table>
        </div>
    </x-main>
@endsection
