<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ config('app.name') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
    <style>
        .page {
            width: 58mm;
            margin-left: auto;
            margin-right: auto;
            margin-top: 1cm;
            padding: 0.3em;
            font-size: 10px;
        }

        @page {
            margin: 0;
        }

        @media print {

            .ocultar,
            .ocultar * {
                display: none !important;
            }
        }
    </style>
</head>

<body class="bg-white">
    <div class="page">
        <table class="table table-borderless table-sm">
            <tr class="text-uppercase text-center fw-bolder">
                <td colspan="2">
                    <img src="{{ asset('img/logo.png') }}" alt="" width="15%" height="auto">
                    <br>
                    RED LEON
                </td>
            </tr>
            <tr class="small">
                <td colspan="2" class="text-center fw-bolder">
                    Cel. 88893518
                    <br>
                    RUC: 2811611860004
                    <br>
                    Dir. Implagsa 3 C abajo. 1 C al sur.
                    <br>
                </td>
            </tr>
            <tr>
                <th colspan="2" class="text-center">RECIBO</th>
            </tr>
            <tr>
                <td>Factura:</td>
                <td class="fw-bolder float-end">N° {{ str_pad($registro->id ?? 'X', 4, '0', STR_PAD_LEFT) }}</td>
            </tr>
            <tr>
                <td>Fecha pago:</td>
                <td class="float-end">{{ date('d-m-y') }}</td>
            </tr>
            <tr>
                <td>Cliente</td>
                <td>{{ $servicio->nombre }}</td>
            </tr>
            <tr>
                <td>Tipo</td>
                <td> {{ $servicio->tipo }}</td>
            </tr>
            <tr>
                <td>Operador</td>
                <td> {{ $servicio->operador }}</td>
            </tr>
            <tr>
                <td>Inicio Servicio</td>
                <td>{{ date('d-m-Y', strtotime($servicio->periodo_inicio)) }}</td>
            </tr>
            <tr>
                <td>Fin Servicio</td>
                <td> {{ date('d-m-Y', strtotime($servicio->periodo_fin)) }}</td>
            </tr>
            <tr>
                <td>Cobrador</td>
                <td> {{ $servicio->cobrador ?? '-' }}</td>
            </tr>
            <tr>
                <td> <strong>Monto: </strong> </td>
                <td class="fw-bolder float-end">C$ {{ $servicio->monto ?? '-' }}</td>
            </tr>
        </table>
    </div>
    <p class="text-center mt-5">
        <a href="javascript:window.print()" class="btn btn-primary ocultar float-center">
            Imprimir
        </a>
    </p>
</body>

</html>
