<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-200 border-radius-xl mt-0"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1920&amp;q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n9">
        <form wire:submit.prevent="createUser">
            <div class="row p-2">
                <div class="col-3">
                    <div class="d-flex">
                        <div class="p-4 ps-0 align-content-center">
                            @if ($foto)
                                @if (is_string($foto))
                                    <img src="{{ asset('storage/foto-pengguna/'.$foto) }}" class="avatar avatar-scale-up avatar-xxl">
                                @else
                                    <img src="{{ $foto->temporaryUrl() }}" class="avatar avatar-scale-up avatar-xxl">
                                @endif
                            @else
                                <img src="https://ui-avatars.com/api/?background=random&bold=true&name={{ $nama }}"
                                    class="avatar avatar-scale-up avatar-xxl">
                                @endif
                        </div>
                    </div>
                    <div class="flex-fill align-self-center p-0">
                        <label class="text-sm mb-0" for="foto">Pilih Foto</label>
                        <div class="input-group input-group-outline my-1">
                            <input wire:model="foto" type="file" class="form-control" name="foto">
                        </div>
                        @error('foto')
                        <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-9 my-auto">
                    <div class="row">
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-7">
                                    <label class="form-label text-bold">Nama Lengkap</label>
                                    <div class="input-group input-group-outline rounded-full mt-n2">
                                        <input wire:model="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                            placeholder="Masukan Nama Lengkap">
                                    </div>
                                    @error('nama')
                                    <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-5">
                                    <label class="form-label text-bold">E-Mail</label>
                                    <div class="input-group input-group-outline mt-n2">
                                        <input wire:model.defer="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                            placeholder="xxxx@gmail.com">
                                    </div>
                                    @error('email')
                                    <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label class="form-label text-bold">Password</label>
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
                                <div class="col-6">
                                    <label class="form-label text-bold">No.Hp</label>
                                    <div class="input-group input-group-outline mt-n2">
                                        <input wire:model.defer="no_hp" type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                            placeholder="contoh: 08xxxxxxx">
                                    </div>
                                    @error('no_hp')
                                    <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- {{ var_export($selectedRole) }} --}}
                            <div class="row mb-3">
                                <label class="form-label text-bold">Pilih Role</label>
                                @foreach ($role as $role)
                                    <div class="col-4">
                                        <div class="form-check p-0">
                                            <input class="form-check-input" type="checkbox" value="{{ $role->id }}" wire:key='{{ $role->id }}' wire:model="selectedRole">
                                            <label class="form-check-label">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div style="float: right;" class="border-0">
                                <button type="submit" class="btn btn-success btn-rounded shadow-dark float-end">Simpan</button>
                                <button type="button" class="btn btn-danger btn-rounded shadow-dark me-2" wire:click='fresh'
                                    onclick="window.history.back();">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1 flex-row" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab"
                                    aria-selected="true">
                                    <i class="material-icons text-lg position-relative">home</i>
                                    <span class="ms-1">App</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab"
                                    aria-selected="false" tabindex="-1">
                                    <i class="material-icons text-lg position-relative">email</i>
                                    <span class="ms-1">Messages</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab"
                                    aria-selected="false" tabindex="-1">
                                    <i class="material-icons text-lg position-relative">settings</i>
                                    <span class="ms-1">Settings</span>
                                </a>
                            </li>
                            <div class="moving-tab position-absolute nav-link"
                                style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 105px;">
                                <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab"
                                    aria-selected="true">-</a>
                            </div>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </form>
    </div>
</div>