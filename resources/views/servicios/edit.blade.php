@extends('layout')

@section('title', 'Pagar')

@section('main')
    <x-header-0>Renovar servicio</x-header-0>

    <x-main>
        <form action="{{ route('servicios.update', $servicio->id) }}" method="post">
            @csrf
            @method('PUT')
            <p>
                Realizar pago del cliente:
            </p>
            <h5 class="fw-bolder">{{$cliente->nombre}}</h5>
            <hr>

            <x-input name='periodo_inicio' label="Inicio del servicio" type="date" :val="date('Y-m-d')">
            </x-input>

            <x-select-0 name="periodo" :items="$periodos" :old="$servicio->periodo ?? ''">
            </x-select-0>

            <x-input name='periodo_fin' label="Fin del servicio" type="date">
            </x-input>

            <x-input name='monto'></x-input>

            <p class="text-muted">Por favor, revise que la informacion ingresada sea correcta.</p>

            <button type="submit" class="btn btn-secondary float-end">Pagar</button>
        </form>
    </x-main>
@endsection
