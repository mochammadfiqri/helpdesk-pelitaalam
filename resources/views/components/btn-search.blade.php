<a class="btn btn-rounded border mb-0 me-2 p-0 px-3" role="button" style="{{ $style }}">
    <i class="fa-solid fa-magnifying-glass me-2"></i>
    <input wire:model.debounce.200ms="search" type="text" class="form-control" placeholder="{{ $placeholder }}">
    @yield('icon-x')
</a>