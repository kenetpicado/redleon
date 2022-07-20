@extends('layout')

@section('title', 'Editar')

@section('main')
    <x-header-0>Editar</x-header-0>

    <x-main>
        <form action="{{ route('clientes.update', $cliente->id) }}" method="post">
            @csrf
            @method('put')
            <x-input name='nombre' :val="$cliente->nombre"></x-input>
            <x-input name='direccion' :val="$cliente->direccion"></x-input>
            <x-input name='telefono' :val="$cliente->telefono"></x-input>
            <x-input name='cedula' :val="$cliente->cedula"></x-input>
            <button type="submit" class="btn btn-secondary rounded-3 float-end">Guardar</button>
        </form>
    </x-main>
@endsection
