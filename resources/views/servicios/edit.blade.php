@extends('layout')

@section('title', 'Contratar servicio')

@section('main')
    <x-header-0>Actualizar servicio</x-header-0>

    <x-main>
        <form action="{{ route('servicios.update', $servicio->id) }}" method="post">
            @csrf
            @method('PUT')
            <x-input name='inicio' label="Inicio servicio" type="date" :val="$servicio->inicio"></x-input>
            <x-select-0 name="tipo" :items="$tipos" :old="$servicio->tipo"></x-select-0>
            <x-select-0 name="periodo" :items="$periodos" :old="$servicio->periodo"></x-select-0>
            <x-input name='fecha_pago' label="Inicio periodo (Fecha de pago)" type="date" :val="$servicio->fecha_pago"></x-input>
            <div class="mb-3">
                <label class="form-label">Fin periodo (Proximo pago)</label>
                <input type="date" disabled class="form-control text-muted" value="{{$servicio->proximo_pago}}">
            </div>
            <x-input name='monto' :val="$servicio->monto"></x-input>
            <x-input name='equipo_instalado' label="Equipo Instalado" :val="$servicio->equipo_instalado"></x-input>
            <x-input name='mac' :val="$servicio->mac"></x-input>
            <button type="submit" class="btn btn-secondary rounded-3">Actualizar</button>
        </form>
    </x-main>
@endsection
