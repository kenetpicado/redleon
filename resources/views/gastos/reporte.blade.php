<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ config('app.name') }} - Gastos {{ date('Y-m-d') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
    <style>
        .btn {
            width: 150px;
        }

        .btn-sm {
            width: 80px;
        }

        @media print {

            .ocultar,
            .ocultar * {
                display: none !important;
            }
        }

        table {
            page-break-inside: auto
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto
        }

        th {
            text-transform: uppercase;
        }

        hr {
            border-top: solid 1px rgb(7, 7, 7);
        }
    </style>
</head>

<body>
    <div class="card border-0">
        <div class="text-center">
            <img src="{{ asset('img/logo.png') }}" alt="" width="8%"  height="auto" class="mb-2">
            <h1 class="h4 text-gray-900 mb-4 fw-bolder">{{ config('app.name') }}</h1>
        </div>
        <div class="card-body">
            <h5 class="card-title mb-3">Gastos de {{ $mes }}</h5>
            <h5 class="card-title mb-3">Gastos totales: C$ {{ $gastos->sum('monto') }}</h5>
            <table class="table table-borderless table-striped">
                <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gastos as $gasto)
                        <tr>
                            <td>{{ $gasto->descripcion }}</td>
                            <td>C$ {{ $gasto->monto }}</td>
                            <td>{{ $gasto->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p class="text-center mt-3">
            <a href="javascript:window.print()" class="btn btn-primary ocultar float-center">
                Imprimir
            </a>
        </p>
    </div>
</body>

</html>
