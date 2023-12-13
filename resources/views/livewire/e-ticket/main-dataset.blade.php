<div class="row ">
    @include('livewire.e-ticket.import-dataset')
    <div class="col-12 mt-3">
        <div class="card my-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-white text-uppercase ps-3 float-start">
                                Dataset Ticket
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="d-flex flex-column justify-content-start mb-2">
                            <x-btn-search style="display: flex; align-items: center;" placeholder="Search Ticket...">
                                @section('icon-x')
                                @if($search)
                                <i class="fa-solid fa-circle-xmark fa-lg" wire:click="clearSearch"></i>
                                @endif
                                @endsection
                            </x-btn-search>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-8">
                        <div class="d-flex justify-content-end align-items-center ">
                            <a class="btn btn-rounded bg-gradient-info mx-2 mx-sm-1" data-bs-toggle="modal" data-bs-target="#importDataset">
                                <i class="fa-solid fa-file-import fa-lg"></i>&nbsp;&nbsp;&nbsp;Import Dataset
                            </a>
                            <a href="{{ route('main_dataset') }}" class="btn btn-rounded bg-gradient-info mx-2 mx-sm-1">
                                <i class="fa-solid fa-plus fa-lg"></i>&nbsp;&nbsp;&nbsp;Add Dataset
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mt-1">
                    @include('livewire.e-ticket.tbl-dataset')
                </div>
            </div>
        </div>
    </div>
</div>