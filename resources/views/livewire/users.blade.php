<div class="row ">
    {{-- <livewire:modal-user> --}}
    @include('livewire.modal-user')
    @include('livewire.import-users')
    <div class="col-12 mt-3">
        <div class="card my-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-white text-uppercase ps-3 float-start">
                                Daftar Pengguna
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="d-flex flex-column justify-content-start mb-2">
                            <x-btn-search style="display: flex; align-items: center;" placeholder="Cari Pengguna...">
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
                            <div class="btn-group dropstart">
                                <a class="btn btn-rounded btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-filter fa-lg "></i>&nbsp;&nbsp;&nbsp;Filter
                                </a>
                                <ul class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        @foreach ($role as $role)
                                        <div class="form-check ps-2">
                                            <input class="form-check-input" type="checkbox" wire:model="filter.{{ $role->id }}" id="flexCheck{{ $role->id }}">
                                            <label class="form-check-label" for="flexCheck{{ $role->id }}">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                            
                            <a class="btn btn-rounded bg-gradient-info mx-2 mx-sm-1" data-bs-toggle="modal" data-bs-target="#importUsers">
                                <i class="fa-solid fa-upload "></i>&nbsp;&nbsp;&nbsp;Import Users
                            </a>
                            <a class="btn btn-rounded bg-gradient-info" data-bs-toggle="modal" data-bs-target="#addUser">
                                <i class="fa-solid fa-user-plus fa-lg"></i>&nbsp;&nbsp;&nbsp;Add Users
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="card-body px-0 pb-2 pt-0">
                <div class="table-responsive p-0">
                    @include('livewire.tbl-user')
                    {{-- @livewire('tbl-user') --}}
                </div>
            </div>
        </div>
    </div>
</div>