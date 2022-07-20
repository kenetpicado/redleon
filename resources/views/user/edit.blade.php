@extends('layout')

@section('title', 'Perfil')

@section('main')
    <x-header-0>Perfil</x-header-0>

    <x-main>
        <form action="{{ route('user.update', auth()->user()->id) }}" method="post">
            @csrf
            @method('PUT')
            <x-input name='name' label="Nombre" :val="$user->name"></x-input>
            <x-input name='email' label="Usuario" :val="$user->email"></x-input>
            <button type="submit" class="btn btn-secondary rounded-3 float-end">Actualizar</button>
        </form>
    </x-main>
@endsection
