<div class="page-header min-vh-100">
    <div class="container">
        <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                    style="background-image: url(../assets/img/illustrations/illustration-signup.jpg); background-size: cover;">
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-8">
                <div class="card card-plain" style="width: 23rem;">
                    <div class="card-body">
                        <h4 class="font-weight-bolder mb-0">Sign Up</h4>
                        <p class="mb-2">Enter your Data to register</p>
                        <form wire:submit.prevent="register">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <div class="input-group input-group-outline mt-n2">
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
                                        placeholder="Email_Anda@gmail.com">
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
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label class="form-label">No.Hp</label>
                                    <div class="input-group input-group-outline mt-n2">
                                        <input wire:model.defer="no_hp" type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                            placeholder="contoh: 08xxxxxxx">
                                    </div>
                                    @error('no_hp')
                                        <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- <div class="col-6">
                                    <label class="form-label">Domisili</label>
                                    <div class="input-group input-group-outline mt-n2">
                                        <input wire:model.defer="domisili" type="text" class="form-control @error('domisili') is-invalid @enderror"
                                            placeholder="Tempat Tinggal">
                                    </div>
                                    @error('domisili')
                                        <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                    @enderror
                                </div> --}}
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <div class="input-group input-group-outline mt-n2">
                                    <textarea wire:model.defer="alamat" id="alamat" cols="30" rows="5" class="form-control" placeholder="Masukan Alamat"></textarea>
                                </div>
                                @error('alamat')
                                    <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                @enderror
                            </div> --}}
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
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign
                                    Up</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                        <p class="mb-2 text-sm mx-auto">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">Sign in</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>