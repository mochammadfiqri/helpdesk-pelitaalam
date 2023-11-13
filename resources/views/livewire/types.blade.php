<div class="row ">
    {{-- @include('livewire.modal-label') --}}
    @include('livewire.modal-type')
    <div class="col-12 mt-3">
        <div class="card my-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-white text-uppercase ps-3 float-start">
                                Types
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-md-8 col-lg-12">
                        <div class="d-flex justify-content-end align-items-center ">
                            <a class="btn btn-rounded bg-gradient-info" data-bs-toggle="modal"
                                data-bs-target="#addType">
                                <i class="fa-solid fa-tag fa-lg"></i>&nbsp;&nbsp;&nbsp;Tambah Type
                            </a>
                        </div>
                    </div>
                </div>
                @if ($type->count() > 0)
                <div class="mb-3 mt-1">
                    @foreach ($type as $data)
                    <a href="#" class="text-decoration-none " style="color: #495057;" data-bs-toggle="modal"
                                data-bs-target="#editType" wire:click='editType({{ $data->id }})'>
                        <div class="card card-label border-2 ">
                            <div class="d-flex p-3 ">
                                <div class="d-flex align-items-center">
                                    {{-- <div class="p-2 py-0 text-center text-sm text-white avatar avatar-xs"
                                        style="background-color: blue">
                                        &nbsp;&nbsp;
                                    </div> --}}
                                    <div class="text-sm">
                                        {{ $data->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                @else
                <div class="d-flex justify-content-center">
                    <img src="../assets/img/no-record-file.svg" class="w-40">
                </div>
                @endif
            </div>

        </div>
    </div>
</div>