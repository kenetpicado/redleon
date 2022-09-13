@extends('layout')

@section('title', 'Pagar')

@section('main')
    <x-header-0>Renovar servicio</x-header-0>

    <x-main>
        <form action="{{ route('pay', $cliente->servicio->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                El cliente <label class="fw-bolder">{{ $cliente->nombre }}</label> tiene un plan contratado, edite los datos solicitados para actualizar el plan.
            </div>
            <x-select-0 name="periodo" :items="$periodos" :old="$cliente->servicio->periodo"></x-select-0>
            <x-input name='fecha_pago' label="Inicio periodo (Fecha de pago)" type="date" :val="$cliente->servicio->fecha_pago"></x-input>
            <x-input name='proximo_pago' label="Fin periodo (Próximo pago)" type="date" :val="$cliente->servicio->proximo_pago"></x-input>
            <x-input name='monto' :val="$cliente->servicio->monto"></x-input>
            <button type="submit" class="btn btn-secondary float-end">Pagar</button>
        </form>
    </x-main>
@endsection
