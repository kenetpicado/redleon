@extends('layout')

@section('title', 'Editar')

@section('main')
    <x-header-0>Editar</x-header-0>

    <x-main>
        <form action="{{ route('gastos.update', $gasto->id) }}" method="post">
            @csrf
            @method('put')
            <x-input name='descripcion' :val="$gasto->descripcion"></x-input>
            <x-input name='monto' :val="$gasto->monto"></x-input>
            <x-input type="date" name='created_at'  :val="$gasto->created_at" label="Fecha"></x-input>
            <button type="submit" class="btn btn-secondary rounded-3 float-end">Guardar</button>
        </form>
    </x-main>
@endsection
