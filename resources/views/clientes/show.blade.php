@extends('layout')

@section('title', 'Servicio')

@section('main')
    <x-header-0>Servicio</x-header-0>

    <x-main>
        <form action="{{ route('servicios.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <p>Crear o Editar el servicio contratado por el cliente:</p>
                <h5 class="fw-bolder">{{ $cliente->nombre }}</h5>
                <hr>
            </div>

            <x-input name='inicio' type="date" :val="$cliente->servicio->inicio ?? ''"></x-input>

            <x-select-0 name="tipo" :items="$tipos" :old="$cliente->servicio->tipo ?? ''">
            </x-select-0>

            <x-input name="operador" :val="$cliente->servicio->operador ?? ''">
            </x-input>

            <x-input name='periodo_inicio' label="Inicio del servicio" type="date" :val="$cliente->servicio->periodo_inicio ?? date('Y-m-d')">
            </x-input>

            <x-select-0 name="periodo" :items="$periodos" :old="$cliente->servicio->periodo ?? ''">
            </x-select-0>

            <x-input name='periodo_fin' label="Fin del servicio" type="date" :val="$cliente->servicio->periodo_fin ?? ''">
            </x-input>

            <x-input name='equipo_instalado' label="Equipo Instalado" :val="$cliente->servicio->equipo_instalado ?? ''">
            </x-input>

            <x-input name='mac' label="MAC" :val="$cliente->servicio->mac ?? ''">
            </x-input>

            <x-input name='velocidad' :val="$cliente->servicio->velocidad ?? ''">
            </x-input>

            <x-input name='nota' :val="$cliente->servicio->nota ?? ''">
            </x-input>

            <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
            <input type="hidden" name="servicio_id" value="{{ $cliente->servicio->id ?? ''}}">
            <button type="submit" class="btn btn-secondary rounded-3 float-end">Guardar</button>
        </form>
    </x-main>
@endsection
