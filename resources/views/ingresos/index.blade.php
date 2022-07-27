@extends('layout')

@section('title', 'Ingresos')

@section('main')
    <x-header-0>Ingresos de este mes</x-header-0>

    <x-main>
        @if (count($ingresos) > 0)
            @foreach ($ingresos as $ingreso)
                <div class="alert alert-primary" role="alert">
                    {{ $ingreso->nombre }}: {{ $ingreso->message }} | 
                    $ {{ $ingreso->monto }}
                </div>
            @endforeach
        @else
            <div class="alert alert-primary" role="alert">
                Vacío
            </div>
        @endif
    </x-main>
@endsection
