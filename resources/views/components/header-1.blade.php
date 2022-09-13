@props(['route'])

<div class="card-header d-flex flex-row align-items-center justify-content-between">
    <label class="text-uppercase">{{ $slot }}</label>
    <a class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#modalCreate">Agregar</a>
</div>
