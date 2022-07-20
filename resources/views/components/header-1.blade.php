@props(['route'])

<div  style="border-radius: 20px" class="card-header bg-white border-0 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 fw-bolder text-uppercase">{{ $slot }}</h6>
    <a href="{{ route($route) }}" class="btn btn-sm btn-secondary rounded-3">
        Agregar
    </a>
</div>
