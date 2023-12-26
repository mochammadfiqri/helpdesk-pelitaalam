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
                                placeholder="xxxx@gmail.com" >
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
                        {{-- Script Lihat Password --}}
                        <script>
                            const passwordInput = document.getElementById('password');
                                const showPasswordCheckbox = document.getElementById('showpassword');
                            
                                showPasswordCheckbox.addEventListener('change', function() {
                                    if (this.checked) {
                                        passwordInput.type = 'text';
                                    } else {
                                        passwordInput.type = 'password';
                                    }
                                });
                        </script>
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
                    <div class="mb-0">
                        <label class="form-label">Alamat</label>
                        <div class="input-group input-group-outline mt-n2">
                            <textarea wire:model.defer="alamat" id="alamat" cols="30" rows="5" class="form-control"
                                placeholder="Masukan Alamat"></textarea>
                        </div>
                        @error('alamat')
                        <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row mb-0">
                        <div class="d-flex">
                            <div class="p-4 ps-0">
                                {{-- @if ($foto)
                                    <img src="{{ $foto->temporaryUrl() }}" class="avatar avatar-scale-up avatar-xxl">
                                @else
                                    <img src="../assets/img/user.png" class="avatar avatar-scale-up avatar-xxl">
                                @endif --}}
                                @if ($foto)
                                    @if (is_string($foto))
                                        <img src="{{ asset('storage/foto-pengguna/'.$foto) }}" class="avatar avatar-scale-up avatar-xxl">
                                    @else
                                        <img src="{{ $foto->temporaryUrl() }}" class="avatar avatar-scale-up avatar-xxl">
                                    @endif
                                @else
                                    <img src="../assets/img/user.png" class="avatar avatar-scale-up avatar-xxl">
                                @endif
                            </div>
                            <div class="flex-fill align-self-center p-0">
                                <label class="text-sm mb-0" for="foto">Pilih Foto</label>
                                <div class="input-group input-group-outline my-1">
                                    <input wire:model.defer="foto" type="file" class="form-control" name="foto">
                                </div>
                                @error('foto')
                                    <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Role</label>
                        <div class="input-group input-group-outline mt-n2">
                            <select wire:model.defer='role_id' class="form-control">
                                <option value="">Pilih Role</option>
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

{{-- Update --}}
<div wire:ignore.self class="modal fade" id="editUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog overflow-auto overflow-x-hidden" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title font-weight-normal text-white" id="editUserLabel">Edit Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form wire:submit.prevent="updateUser">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <div class="input-group input-group-outline rounded-full mt-n2">
                            <input wire:model.defer="nama" type="text"
                                class="form-control @error('nama') is-invalid @enderror"
                                placeholder="Masukan Nama Lengkap">
                        </div>
                        @error('nama')
                        <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">E-Mail</label>
                        <div class="input-group input-group-outline mt-n2">
                            <input wire:model.defer="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="xxxx@gmail.com">
                        </div>
                        @error('email')
                        <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password Baru</label>
                        <div class="input-group input-group-outline mt-n2">
                            <input wire:model.defer="password" type="password" id="password" class="form-control" placeholder="Masukan Password Baru">
                        </div>
                        @error('password')
                            <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label">No.Hp</label>
                            <div class="input-group input-group-outline mt-n2">
                                <input wire:model.defer="no_hp" type="number"
                                    class="form-control @error('no_hp') is-invalid @enderror"
                                    placeholder="contoh: 08xxxxxxx">
                            </div>
                            @error('no_hp')
                            <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label class="form-label">Domisili</label>
                            <div class="input-group input-group-outline mt-n2">
                                <input wire:model.defer="domisili" type="text"
                                    class="form-control @error('domisili') is-invalid @enderror"
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
                        @error('alamat')
                        <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- {{ Storage::url($foto) }} --}}
                    <div class="row mb-0">
                        <div class="d-flex">
                            <div class="p-4 ps-0">
                                {{-- @if ($foto)
                                    <img src="{{ Storage::url($foto) }}" class="avatar avatar-scale-up avatar-xxl">
                                @else
                                    <img src="../assets/img/user.png" class="avatar avatar-scale-up avatar-xxl">
                                @endif --}}
                                @if ($foto)
                                    @if (is_string($foto))
                                        <img src="{{ asset('storage/foto-pengguna/'.$foto) }}" class="avatar avatar-scale-up avatar-xxl">
                                    @else
                                        <img src="{{ $foto->temporaryUrl() }}" class="avatar avatar-scale-up avatar-xxl">
                                    @endif
                                @else
                                    <img src="https://ui-avatars.com/api/?background=random&bold=true&name={{ $nama }}" class="avatar avatar-scale-up avatar-xxl">
                                @endif
                            </div>
                            <div class="flex-fill align-self-center p-0">
                                <label class="text-sm mb-0" for="foto">Pilih Foto</label>
                                <div class="input-group input-group-outline my-1">
                                    <input wire:model.defer="foto" type="file" class="form-control" name="foto">
                                </div>
                                @error('foto')
                                <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        {{-- Data : {{ var_export($role_id) }} --}}
                        <label class="form-label">Jenis Role</label>
                        <div class="input-group input-group-outline mt-n2">
                            <select wire:model.defer='role_id' class="form-control">
                                <option value="">Pilih Role</option>
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

{{-- Delete --}}
<div wire:ignore.self class="modal fade" id="deleteUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="deleteUserLabel" aria-hidden="true" >
    <div class="modal-dialog " role="document">
        <div class="modal-content" >
            <form wire:submit.prevent="destroyUser">
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <h5 class="font-weight-normal">Anda Akan Menghapus Pengguna Ini ?</h5>
                    </div>
                    <div class="d-flex justify-content-center align-content-center">
                        <button type="button" class="btn btn-danger btn-rounded shadow-dark me-2" style="width: 25%"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success btn-rounded shadow-dark " style="width: 25%">Ya</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>