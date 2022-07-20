@props(['text'])

<div  style="border-radius: 20px" class="card-header bg-white border-0 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 fw-bolder text-uppercase">{{ $text }}</h6>

    <div class="dropdown">
        <button class="btn btn-dark dropdown-toggle btn-sm rounded-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fas fa-cog"></i>
        </button>
        <dul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            {{ $slot }}
        </dul>
    </div>
</div>
