@extends('layout')

@section('title', 'Gastos')

@section('main')
    <x-header-1>GASTOS</x-header-1>

    <x-modal title="Agregar - Gasto">
        <form action="{{ route('gastos.store') }}" method="post">
            @csrf
            <div class="modal-body">
                <x-input name='descripcion'></x-input>
                <x-input name='monto'></x-input>
                <x-input name='created_at' type='date' :val="date('Y-m-d')" label="Fecha"></x-input>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary float-end">Guardar</button>
            </div>
        </form>
    </x-modal>

    <div class="card-body">
        <h5>Gastos totales de {{ $mes }}: C$ {{ $gastos->sum('monto') }}</h5>
    </div>
    <x-table>
        @slot('title')
            <th>Descripcion</th>
            <th>Monto</th>
            <th>Fecha</th>
            <th>Editar</th>
        @endslot
        @foreach ($gastos as $gasto)
            <tr>
                <td>{{ $gasto->descripcion }}</td>
                <td>C$ {{ $gasto->monto }}</td>
                <td>{{ $gasto->created_at }}</td>
                <td><a href="{{route('gastos.edit', $gasto->id)}}" class="btn btn-sm btn-secondary">Editar</a></td>
            </tr>
        @endforeach
    </x-table>
@endsection
