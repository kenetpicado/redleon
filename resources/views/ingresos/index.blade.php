@extends('layout')

@section('title', 'Ingresos')

@section('main')
    <x-header-0>Ingresos de este mes</x-header-0>

    <x-main>
        <a href="{{ route('facturas') }}" class="btn btn-secondary mb-2" target="_blank">Facturas</a>
        <table class="table table-borderless">
            <tbody>
                @forelse ($ingresos as $ingreso)
                    <tr>
                        <td>
                            <strong>{{ $ingreso->created_at }}:</strong>
                            {{ $ingreso->nombre }} ha realizado un pago por un monto de:
                            <strong>C$ {{ $ingreso->monto }}</strong>
                        </td>
                    </tr>
                    </div>
                @empty
                    <tr>
                        <td>
                            No hay registros
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </x-main>
@endsection
