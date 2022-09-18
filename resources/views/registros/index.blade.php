@extends('layout')

@section('title', 'Registros')

@section('main')
    <x-header-0>Registros del cliente</x-header-0>

    <x-main>
        <p>
            Historial de pagos del cliente:
        </p>
        <h5 class="fw-bolder">{{ $cliente->nombre }}</h5>
        <hr>
        <table class="table table-borderless">
            <tbody>
                @forelse ($registros as $registro)
                    <tr>
                        <td>
                            {{ $registro->message }}.
                            <br>
                            Nuevo pago realizado el: {{ $registro->created_at }} por la cantidad de
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
