@extends('layout')

@section('title', 'Pagar')

@section('main')
    <x-header-0>Renovar servicio</x-header-0>

    <x-main>
        <form action="" method="post">
            @csrf
            @method('PUT')

            <x-input name='periodo_inicio' label="Inicio del servicio" type="date" :val="$servicio->periodo_inicio ?? date('Y-m-d')">
            </x-input>

            <x-select-0 name="periodo" :items="$periodos" :old="$servicio->periodo ?? ''">
            </x-select-0>

            <x-input name='periodo_fin' label="Fin del servicio" type="date" :val="$servicio->periodo_fin ?? ''">
            </x-input>

            <x-input name='monto'></x-input>

            <button type="submit" class="btn btn-secondary float-end">Pagar</button>
        </form>
    </x-main>
@endsection
