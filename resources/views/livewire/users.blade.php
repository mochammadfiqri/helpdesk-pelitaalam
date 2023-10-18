<div class="row ">
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
                    <div class="float-start mb-2 col-12 col-md-12 col-lg-4">
                        {{-- <x-btn-search style="display: flex; align-items: center;" placeholder="Cari Siswa..." /> --}}
                    </div>
                    <div class="col-12 col-md-12 col-lg-8">
                        {{-- <a href="#" class="btn btn-rounded btn-outline-secondary mb-2 float-end" role="button">
                            <i class="material-icons material-icons-round">print</i>&nbsp;&nbsp;Rekap Laporan
                        </a> --}}
                        <button class="btn btn-rounded btn-outline-secondary mb-2 float-end" data-bs-toggle="collapse"
                            data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa-solid fa-filter fa-xl"></i></i>&nbsp;&nbsp;&nbsp;Filter
                        </button>
                        <a class="btn btn-rounded bg-gradient-info mb-0 me-2 float-end" href="#">
                            <i class="fa-solid fa-upload fa-lg"></i></i>&nbsp;&nbsp;&nbsp;Unggah Data
                        </a>
                        <a class="btn btn-rounded bg-gradient-info mb-0 me-2 float-end" data-bs-toggle="modal"
                            data-bs-target="#addSiswa" data-te-ripple-init data-te-ripple-color="light">
                            <i class="fa-solid fa-plus fa-lg"></i>&nbsp;&nbsp;&nbsp;Tambah Users
                        </a>
                    </div>
                </div>
                <div class="collapse" id="collapseExample">
                    <div class="row mt-2">
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="input-group input-group-outline">
                                <select class="form-control" aria-label="Default select example">
                                    <option selected>Pilih Tingkat</option>
                                    <option value="10">Kelas X</option>
                                    <option value="11">Kelas XI</option>
                                    <option value="12">Kelas XII</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="input-group input-group-outline">
                                <select class="form-control" aria-label="Default select example">
                                    <option selected>Pilih Jurusan</option>
                                    <option value="1">Asisten Keperawatan</option>
                                    <option value="2">Farmasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="input-group input-group-outline">
                                <select class="form-control" aria-label="Default select example">
                                    <option selected>Pilih Rombel</option>
                                    <option value="1">X KEP</option>
                                    <option value="2">X FAR</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    {{-- @include('livewire.table-siswa') --}}
                </div>
            </div>
        </div>
    </div>
</div>