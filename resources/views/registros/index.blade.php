@extends('layout')

@section('title', 'Registros')

@section('main')
    <x-header-0>Registros del cliente</x-header-0>

    <x-main>

        <table class="table table-borderless">
            <thead>
                <tr>
                    <td>
                        A continuacion se muestra el historial de pagos del cliente: {{ $cliente->nombre }}
                    </td>
                </tr>
            </thead>
            <tbody>
                @forelse ($registros as $registro)
                    <tr>
                        <td>
                            <strong>{{ $registro->created_at }}:</strong>
                            Se ha realizado un pago. {{ $registro->message }} por un monto de:
                            <strong>$ {{ $registro->monto }}</strong>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>No hay registros</td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </x-main>
@endsection
