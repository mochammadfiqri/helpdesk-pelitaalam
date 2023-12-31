<div wire:ignore.self class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <a class="btn shadow-blur mb-0 p-2 px-3" role="button"
                style="display: flex; align-items: center; background-color: white;">
                <i class="fa-solid fa-magnifying-glass fa-xl me-2"></i>
                <input wire:model.debounce.150ms="search" type="search" id="search-bar-input"
                    class="form-control text-black text-lg" style="background: transparent"
                    placeholder="Knowledge Search...">
            </a>
            @if ($knowledge_base && $knowledge_base->count() > 0)
            <div class="modal-body p-0">
                <div class="row p-4">
                    @foreach ($knowledge_base as $data)
                    <a wire:click="viewPost('{{ $data->slug }}')" class="text-decoration-none " style="color: #495057;">
                        <div class="card card-label border-1" style="cursor: pointer;">
                            <div class="d-flex flex-column py-3 ps-3 align-content-center text-sm">
                                <h6 class="text-sm text-start mb-0">{{ $data->title }}</h6>
                                <small class="text-xs text-secondary text-start text-truncate mb-0" style="max-width: 100%; overflow: hidden; text-overflow: ellipsis;">
                                    {{ strip_tags($data->details) }}
                                </small>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>