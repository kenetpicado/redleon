@extends('layout')

@section('title', 'Contratar servicio')

@section('main')
    <x-header-0>Contratar servicio</x-header-0>

    <x-main>
        <form action="{{ route('servicios.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bolder">{{ $cliente->nombre }}</label>
            </div>
            <x-input name='inicio' label="Inicio servicio" type="date"></x-input>
            <x-select-0 name="tipo" :items="$tipos"></x-select-0>
            <x-select-0 name="periodo" :items="$periodos"></x-select-0>
            <x-input name='fecha_pago' label="Inicio periodo (Fecha de pago)" type="date"></x-input>
            <x-input name='monto'></x-input>
            <x-input name='equipo_instalado' label="Equipo Instalado"></x-input>
            <x-input name='mac'></x-input>
            <x-input name='velocidad'></x-input>
            <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
            <button type="submit" class="btn btn-secondary rounded-3 float-end">Guardar</button>
        </form>
    </x-main>
@endsection
