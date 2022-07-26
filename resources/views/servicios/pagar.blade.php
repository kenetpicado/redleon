@extends('layout')

@section('title', 'Pagar')

@section('main')
    <x-header-0>Pagar</x-header-0>

    <x-main>
        <form action="{{ route('pay', $cliente->servicio->id) }}" method="post">
            @csrf
            @method('PUT')
            <x-input name='fecha_pago' label="Inicio periodo (Fecha de pago)" type="date" :val="$cliente->servicio->proximo_pago"></x-input>
            <x-input name='monto' :val="$cliente->servicio->monto"></x-input>
            <input type="hidden" name="periodo" value="{{ $cliente->servicio->periodo }}">
            <button type="submit" class="btn btn-secondary rounded-3">Pagar</button>
        </form>
    </x-main>
@endsection
