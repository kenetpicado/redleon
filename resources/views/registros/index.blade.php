@extends('layout')

@section('title', 'Registros')

@section('main')
    <x-header-0>Registros del cliente</x-header-0>

    <x-main>
        @if (count($registros) > 0)
            @foreach ($registros as $registro)
                <div class="alert alert-primary" role="alert">
                    {{ $registro->created_at }}: 
                    Se ha realizado un pago. {{ $registro->message }} | 
                    $ {{ $registro->monto }}
                </div>
            @endforeach
        @else
            <div class="alert alert-primary" role="alert">
                Historial vacío
            </div>
        @endif
    </x-main>
@endsection
