@extends('layout')

@section('title', 'Ingresos')

@section('main')
    <x-header-0>Ingresos</x-header-0>

    <div class="card-body">
        <h5>Ingresos totales de {{ $mes }}: C$ {{ $ingresos->sum('monto') }}</h5>
        <a href="{{ route('facturas') }}" class="btn btn-secondary btn-sm m-1" target="_blank">Facturas</a>
        <a href="{{ route('balance') }}" class="btn btn-secondary btn-sm m-1" target="_blank">Balance</a>
    </div>

    <x-table>
        @slot('title')
            <th>Concepto</th>
            <th>Monto</th>
            <th>Fecha</th>
        @endslot
        @foreach ($ingresos as $ingreso)
            <tr>
                <td>
                    {{ $ingreso->nombre }} ha realizado un pago.
                </td>
                <td>C$ {{ $ingreso->monto }}</td>
                <td>{{ $ingreso->created_at }}</td>
            </tr>
        @endforeach
    </x-table>
@endsection
