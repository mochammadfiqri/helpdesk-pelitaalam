<div class="row ">
    @include('livewire.modal-knowledge')
    <div class="col-12 mt-3">
        <div class="card my-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-white text-uppercase ps-3 float-start">
                                Knowledge Base
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="d-flex flex-column justify-content-start mb-2">
                            <x-btn-search style="display: flex; align-items: center;" placeholder="Cari Knowledge...">
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
                            <a class="btn btn-rounded bg-gradient-info mx-2 mx-sm-1" href="#">
                                <i class="fa-solid fa-upload "></i>&nbsp;&nbsp;&nbsp;Unggah Data
                            </a>
                            <a class="btn btn-rounded bg-gradient-info" data-bs-toggle="modal"
                                data-bs-target="#addKnowledge">
                                <i class="fa-solid fa-tag fa-lg"></i>&nbsp;&nbsp;&nbsp;Tambah Knowledge Base
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mt-1">
                    <div class="table-responsive">
                        <table class="table table-hover align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>
                                        <h6 class="my-auto">Title</h6>
                                    </th>
                                    <th>
                                        <h6 class="my-auto">Type</h6>
                                    </th>
                                    <th class="text-xxs font-weight-bolder opacity-7"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($knowledge_base->count() > 0)
                                @foreach ($knowledge_base as $data)
                                    <tr data-bs-toggle="modal" data-bs-target="#updateKB" wire:click="editKnowledge({{ $data->id }})" >
                                        <td>
                                            <div class="my-auto px-3 mb-0 " style="user-select: none">
                                                {{ $data->title }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="my-auto px-3 mb-0 " >
                                                {{ $data->type->name }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="my-auto float-end">
                                                <i class="fa-solid fa-location-arrow fa-lg"></i>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="2">
                                        <div class="d-flex justify-content-center">
                                            <img src="../assets/img/no-record-file.svg" class="w-40">
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>