@extends('layout')

@section('title', 'Inicio')

@section('main')
<x-header-0>Informacion general</x-header-0>
    <div class="card-body">

        <div class="row">
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between p-md-1">
                            <div class="d-flex flex-row">
                                <div class="align-self-center">
                                    <h2 class="h1 mb-0 me-4">{{ $clientes }}</h2>
                                </div>
                                <div>
                                    <h4>Clientes</h4>
                                    <p class="mb-0">Total</p>
                                </div>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-user text-primary fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between p-md-1">
                            <div class="d-flex flex-row">
                                <div class="align-self-center">
                                    <h2 class="h1 mb-0 me-4">{{ $servicios->total }}</h2>
                                </div>
                                <div>
                                    <h4>Servicios</h4>
                                    <p class="mb-0">Total</p>
                                </div>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-sitemap text-primary fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between p-md-1">
                            <div class="d-flex flex-row">
                                <div class="align-self-center">
                                    <h2 class="h1 mb-0 me-4">{{ $servicios->cable }}</h2>
                                </div>
                                <div>
                                    <h4>Cable</h4>
                                    <p class="mb-0">Total</p>
                                </div>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-plug text-primary fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between p-md-1">
                            <div class="d-flex flex-row">
                                <div class="align-self-center">
                                    <h2 class="h1 mb-0 me-4">{{ $servicios->hfc }}</h2>
                                </div>
                                <div>
                                    <h4>Internet HFC</h4>
                                    <p class="mb-0">Total</p>
                                </div>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-wifi text-primary fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between p-md-1">
                            <div class="d-flex flex-row">
                                <div class="align-self-center">
                                    <h2 class="h1 mb-0 me-4">{{ $servicios->fibra }}</h2>
                                </div>
                                <div>
                                    <h4>Internet Fibra</h4>
                                    <p class="mb-0">Total</p>
                                </div>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-wifi text-primary fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between p-md-1">
                            <div class="d-flex flex-row">
                                <div class="align-self-center">
                                    <h2 class="h1 mb-0 me-4">{{ $servicios->ingreso }}</h2>
                                </div>
                                <div>
                                    <h4>Ingresos</h4>
                                    <p class="mb-0">{{ $servicios->mes }}</p>
                                </div>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-dollar-sign text-primary fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between p-md-1">
                            <div class="d-flex flex-row">
                                <div class="align-self-center">
                                    <h2 class="h1 mb-0 me-4">{{ $servicios->streaming }}</h2>
                                </div>
                                <div>
                                    <h4>Streaming</h4>
                                    <p class="mb-0">Total</p>
                                </div>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-tv text-primary fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
