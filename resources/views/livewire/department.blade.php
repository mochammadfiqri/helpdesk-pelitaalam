<div class="row ">
    @include('livewire.modal-department')
    <div class="col-12 mt-3">
        <div class="card my-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-white text-uppercase ps-3 float-start">
                                Department
                            </h6>
                        </div>
                    </div>
                </div>
                {{-- <div class="row mt-3">
                    <div class="col-12 col-md-8 col-lg-12">
                        <div class="d-flex justify-content-end align-items-center ">
                            <a class="btn btn-rounded bg-gradient-info" data-bs-toggle="modal"
                                data-bs-target="#addDepartment">
                                <i class="fa-solid fa-tag fa-lg"></i>&nbsp;&nbsp;&nbsp;Add Department
                            </a>
                        </div>
                    </div>
                </div> --}}
                <div class="row mt-3">
                    <div class="col-5 col-md-4 col-lg-2">
                        <div class="justify-content-start align-items-center ">
                            @if ($checkedPost)
                            <a class="btn btn-rounded bg-gradient-danger" wire:click='deleteCheckedPost'>
                                <i class="fa-solid fa-trash-can fa-fade"></i>&nbsp;&nbsp;&nbsp;Delete ({{ count($checkedPost) }})
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-7 col-md-8 col-lg-10 ">
                        <div class="d-flex justify-content-end align-items-center ">
                            <a class="btn btn-rounded bg-gradient-info" data-bs-toggle="modal" data-bs-target="#addDepartment">
                                <i class="fa-solid fa-tag fa-lg"></i>&nbsp;&nbsp;&nbsp;Add Department
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mt-0">
                    <div class="table-responsive">
                        <table
                            class="table @if($department->count() > 0) table-hover @endif align-items-center justify-content-start mb-0">
                            <thead>
                                <tr>
                                    <th class="px-0" style="width: 1rem">
                                        <div class="form-check p-0 ms-2">
                                            <input class="form-check-input" type="checkbox" wire:model="selectAll">
                                        </div>
                                    </th>
                                    <th>
                                        <h6 class="my-auto">Name</h6>
                                    </th>
                                    <th class="text-xxs font-weight-bolder opacity-7"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($department->count() > 0)
                                @foreach ($department as $data)
                                <tr style="cursor: pointer;">
                                    <td>
                                        <div class="form-check p-0 mx-auto">
                                            <input class="form-check-input" type="checkbox" value="{{ $data->id }}"
                                                wire:key='{{ $data->id }}' wire:model="checkedPost"
                                                onclick="stopPropagation(event)">
                                        </div>
                                    </td>
                                    <td>
                                        <div wire:click="editDepartment('{{ $data->id }}')" class="my-auto px-3 mb-0 " data-bs-toggle="modal" data-bs-target="#editDepartment">
                                            {{ $data->name }}
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
                                    <td colspan="4">
                                        <div class="d-flex justify-content-center">
                                            <img src="../assets/img/no-record-file.svg" class="w-40">
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                <script>
                                    function stopPropagation(event) {
                                        // Mencegah propagasi event ke atas ke elemen <tr>
                                        event.stopPropagation();
                                    }
                                </script>
                            </tbody>
                        </table>
                        <div class="float-end me-3 mt-3">
                            {{ $department->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>