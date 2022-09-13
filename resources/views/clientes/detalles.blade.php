@extends('layout')

@section('title', 'Detalles cliente')

@section('main')
    <x-header-0>Detalles del cliente</x-header-0>

    <x-main>
        <table class="table table-borderless">
            <th>
                <tr class="text-uppercase small fw-bolder">
                    <td colspan="2">DATOS PERSONALES</td>
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
    </x-main>
@endsection
