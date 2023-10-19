<div class="row ">
    <livewire:modal-user>
    <div class="col-12 mt-3">
        <div class="card my-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-white text-uppercase ps-3 float-start">
                                Daftar Users
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="d-flex flex-column justify-content-start mb-2">
                            <x-btn-search style="display: flex; align-items: center;" placeholder="Cari Siswa...">
                                @section('icon-x')
                                    @if($search)
                                        <i class="fa-solid fa-xmark cursor-pointer" wire:click="clearSearch"></i>
                                    @endif
                                @endsection
                            </x-btn-search>
                            {{-- Data : {{ var_export($search) }} --}}
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-8">
                        <div class="d-flex justify-content-end align-items-center ">
                            {{-- <a class="btn btn-rounded btn-outline-secondary" data-bs-toggle="collapse"
                                data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa-solid fa-filter fa-lg "></i>&nbsp;&nbsp;&nbsp;Filter
                            </a> --}}
                            <a class="btn btn-rounded bg-gradient-info mx-2 mx-sm-1" href="#">
                                <i class="fa-solid fa-upload "></i>&nbsp;&nbsp;&nbsp;Unggah Data
                            </a>
                            <a class="btn btn-rounded bg-gradient-info" data-bs-toggle="modal" data-bs-target="#addUser"
                                data-te-ripple-init data-te-ripple-color="light">
                                <i class="fa-solid fa-plus "></i>&nbsp;&nbsp;&nbsp;Tambah Users
                            </a>
                        </div>
                    </div>
                </div>
                {{-- <div class="collapse" id="collapseExample">
                    <div class="row mt-2 ">
                        <div class="d-flex justify-content-center ">
                            <div class="input-group input-group-outline">
                                <select class="form-control" aria-label="Default select example">
                                    <option selected>Pilih Tingkat</option>
                                    <option value="10">Kelas X</option>
                                    <option value="11">Kelas XI</option>
                                    <option value="12">Kelas XII</option>
                                </select>
                            </div>
                            <div class="input-group input-group-outline mx-2">
                                <select class="form-control" aria-label="Default select example">
                                    <option selected>Pilih Jurusan</option>
                                    <option value="1">Asisten Keperawatan</option>
                                    <option value="2">Farmasi</option>
                                </select>
                            </div>
                            <div class="input-group input-group-outline">
                                <select class="form-control" aria-label="Default select example">
                                    <option selected>Pilih Rombel</option>
                                    <option value="1">X KEP</option>
                                    <option value="2">X FAR</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    {{-- @include('livewire.table-siswa') --}}
                    <livewire:tbl-user>
                </div>
            </div>
        </div>
    </div>
</div>