@extends('layout')

@section('title', 'Agregar')

@section('main')
    <x-header-0>Agregar</x-header-0>

    <x-main>
        <form action="{{ route('cobradors.store') }}" method="post">
            @csrf
            <x-input name='nombre'></x-input>
            <x-input name='usuario'></x-input>
            <button type="submit" class="btn btn-secondary rounded-3 float-end">Guardar</button>
        </form>
    </x-main>
@endsection
