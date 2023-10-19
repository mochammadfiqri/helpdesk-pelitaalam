{{-- Create --}}
<div wire:ignore.self class="modal fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog overflow-auto overflow-x-hidden" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title font-weight-normal text-white" id="addUserLabel">Tambah Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form wire:submit.prevent="createUser">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        {{-- <a class="btn btn-rounded border mb-0 me-2 p-0 px-3" role="button" style="display: flex; align-items: center;" >
                            <input wire:model.defer="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                placeholder="Masukan Nama Lengkap">
                        </a> --}}
                        <div class="input-group input-group-outline rounded-full mt-n2">
                            <input wire:model.defer="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                placeholder="Masukan Nama Lengkap">
                        </div>
                        @error('nama')
                        <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">E-Mail</label>
                        <div class="input-group input-group-outline mt-n2">
                            <input wire:model.defer="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="xxxx@gmail.com">
                        </div>
                        @error('email')
                        <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group input-group-outline mt-n2">
                            <input wire:model.defer="password" type="password" id="password" class="form-control" placeholder="*****">
                        </div>
                        @error('password')
                            <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                        @enderror
                        <div class="form-check form-switch d-flex align-items-center mt-1 ms-2">
                            <input class="form-check-input" type="checkbox" id="showpassword">
                            <label class="form-check-label mb-0 ms-3" for="showpassword">Lihat
                                Password</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label">No.Hp</label>
                            <div class="input-group input-group-outline mt-n2">
                                <input wire:model.defer="no_hp" type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                    placeholder="contoh: 08xxxxxxx">
                            </div>
                            @error('no_hp')
                            <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label class="form-label">Domisili</label>
                            <div class="input-group input-group-outline mt-n2">
                                <input wire:model.defer="domisili" type="text" class="form-control @error('domisili') is-invalid @enderror"
                                    placeholder="Tempat Tinggal">
                            </div>
                            @error('domisili')
                            <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <div class="input-group input-group-outline mt-n2">
                            <textarea wire:model.defer="alamat" id="alamat" cols="30" rows="5" class="form-control"
                                placeholder="Masukan Alamat"></textarea>
                        </div>
                        @error('password')
                        <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        {{-- Data : {{ var_export($role_id) }} --}}
                        <label class="form-label">Jenis Role</label>
                        <div class="input-group input-group-outline mt-n2">
                            <select wire:model.defer='role_id' class="form-control">
                                <option value="">Pilih Role</option>
                                {{-- @foreach ($users as $user)
                                <option value="{{ $user->role->id }}">{{ $user->role->name }}</option>
                                @endforeach --}}
                                @foreach ($role as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('role_id')
                        <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                        @enderror
                    </div>
                    <div style="float: right;" class="border-0 mt-3">
                        <button type="submit" class="btn btn-success btn-rounded shadow-dark float-end">Simpan</button>
                        <button type="button" class="btn btn-danger btn-rounded shadow-dark me-2"
                            wire:click="resetModal" data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>