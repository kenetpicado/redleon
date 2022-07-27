@extends('layout')

@section('title', 'Agregar')

@section('main')
    <x-header-0>Agregar</x-header-0>

    <x-main>
        <form action="{{ route('clientes.store') }}" method="post">
            @csrf
            <x-input name='nombre'></x-input>
            <x-input name='direccion'></x-input>
            <x-input name='telefono' type='number'></x-input>
            <x-input name='cedula'></x-input>
            <x-input name='nota'></x-input>
            <x-select-0 name="cobrador_id" :items="$cobradores" text="Asignar cobrador"></x-select-0>
            <button type="submit" class="btn btn-secondary rounded-3 float-end">Guardar</button>
        </form>
    </x-main>
@endsection
