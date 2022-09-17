@extends('layout')

@section('title', 'Detalles')

@section('main')
    <x-header-0>Detalles</x-header-0>

    <x-main>
        <form action="{{ route('clientes.update', $cliente->id) }}" method="post">
            @csrf
            @method('put')
            <x-input name='nombre' :val="$cliente->nombre"></x-input>
            <x-input name='direccion' :val="$cliente->direccion"></x-input>
            <x-input name='telefono' :val="$cliente->telefono"></x-input>
            <x-input name='cedula' :val="$cliente->cedula"></x-input>
            <x-select-0 name="cobrador_id" :items="$cobradores" text="Asignar cobrador" :old="$cliente->cobrador_id"></x-select-0>

            <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
            <button type="submit" class="btn btn-secondary rounded-3 float-end">Guardar</button>
        </form>
    </x-main>
@endsection
