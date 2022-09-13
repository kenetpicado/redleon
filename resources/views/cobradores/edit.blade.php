@extends('layout')

@section('title', 'Editar')

@section('main')
    <x-header-0>Editar</x-header-0>

    <x-main>
        <form action="{{ route('cobradors.update', $cobrador->id) }}" method="post">
            @csrf
            @method('put')
            <x-input name='nombre' :val="$cobrador->nombre"></x-input>
            <x-input name='usuario' :val="$cobrador->usuario"></x-input>
            <button type="submit" class="btn btn-secondary rounded-3 float-end">Actualizar</button>
        </form>
    </x-main>
    <x-main>
        <form action="{{ route('cobradors.destroy', $cobrador->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <h4>Eliminar</h4>
            <p class="text-danger">
                Esta acción no se puede deshacer.
            </p>
            <button type="submit" class="btn btn-secondary float-end">Eliminar</button>
        </form>
    </x-main>
@endsection
