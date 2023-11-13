<div class="row">
    <div class="col-12 mt-2">
        <div class="card my-2">
            <div class="row mt-2 mx-4 align-items-center">
                <form wire:submit.prevent="updateGlobalSetting">
                    <div class="d-flex align-items-end mt-3 mb-3">
                        <div class="mb-3 flex-fill flex-sm-fill flex-md-fill me-3">
                            <label class="form-label">App Name</label>
                            <div class="input-group input-group-outline mt-n2">
                                <textarea wire:model.defer="app_name" type="text"
                                    class="form-control @error('app_name') is-invalid @enderror"
                                    placeholder="Masukan Title Website" style="resize: none ;overflow: hidden;"
                                    rows='1'></textarea>
                            </div>
                            @error('app_name')
                            <span class="text-danger text-xs font-weight-light">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 flex-fill flex-sm-fill flex-md-fill">
                            <label class="form-label">Header Website</label>
                            <div class="input-group input-group-outline mt-n2">
                                {{-- <input wire:model.defer="header_web" type="text"
                                    class="form-control @error('header_web') is-invalid @enderror"
                                    placeholder="Masukan Nama Website" style="resize: none"> --}}
                                <textarea wire:model.defer="header_web" type="text"
                                    class="form-control @error('header_web') is-invalid @enderror"
                                    placeholder="Masukan Nama Website" style="resize: none ;overflow: hidden;"
                                    rows='1'></textarea>
                            </div>
                            @error('header_web')
                            <span class="text-danger text-xs font-weight-light">{{ $message
                                }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 flex-fill flex-sm-fill flex-md-fill mx-3">
                            <label class="form-label">Slogan Website</label>
                            <div class="input-group input-group-outline mt-n2">
                                {{-- <input wire:model.defer="slogan_web" type="text"
                                    class="form-control @error('slogan_web') is-invalid @enderror"
                                    placeholder="Masukan Slogan Website"> --}}
                                <textarea wire:model.defer="slogan_web" type="text"
                                    class="form-control @error('slogan_web') is-invalid @enderror"
                                    placeholder="Masukan Slogan Website" style="resize: none; overflow: hidden"
                                    rows='1'></textarea>
                            </div>
                            @error('slogan_web')
                            <span class="text-danger text-xs font-weight-light">{{ $message
                                }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex align-items-end mt-3 mb-3">
                        <div class="mb-3 flex-sm-fill flex-md-fill ">
                            <div class=" d-flex mb-3 justify-content-center">
                                @if ($logo_web)
                                <img src="{{ $logo_web->temporaryUrl() }}" class="avatar avatar-scale-up avatar-xxl">
                                @else
                                <img src="../assets/img/user.png" class="avatar avatar-scale-up avatar-xxl">
                                @endif
                            </div>
                            <label class="form-label">Logo Website</label>
                            <div class="input-group input-group-outline mt-n2">
                                <input wire:model.defer="logo_web" type="file" class="form-control">
                            </div>
                            @error('logo_web')
                            <span class="text-danger text-xs font-weight-light">{{ $message
                                }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 flex-sm-fill flex-md-fill mx-3">
                            <div class=" d-flex mb-3 justify-content-center">
                                @if ($favicon_web)
                                <img src="{{ $favicon_web->temporaryUrl() }}" class="avatar avatar-scale-up avatar-xxl">
                                @else
                                <img src="../assets/img/user.png" class="avatar avatar-scale-up avatar-xxl">
                                @endif
                            </div>
                            <label class="form-label">Favicon Website</label>
                            <div class="input-group input-group-outline mt-n2">
                                <input wire:model.defer="favicon_web" type="file" class="form-control">
                            </div>
                            @error('favicon_web')
                            <span class="text-danger text-xs font-weight-light">{{ $message
                                }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex align-items-end mt-3 mb-3">
                        <div class="mb-3 flex-sm-fill flex-md-fill">
                            <label class="form-label">Facebook</label>
                            <div class="input-group input-group-outline rounded-full mt-n2">
                                <input type="url" class="form-control" placeholder="Masukan URL Facebook">
                            </div>
                        </div>
                        <div class="mb-3 flex-sm-fill flex-md-fill mx-3">
                            <label class="form-label">Instagram</label>
                            <div class="input-group input-group-outline rounded-full mt-n2">
                                <input type="url" class="form-control" placeholder="Masukan URL Instagram">
                            </div>
                        </div>
                        <div class="mb-3 flex-sm-fill flex-md-fill">
                            <label class="form-label">Youtube</label>
                            <div class="input-group input-group-outline rounded-full mt-n2">
                                <input type="url" class="form-control" placeholder="Masukan URL Youtube">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-center mx-auto mb-3">
                        <button type="submit" class="btn bg-gradient-success btn-rounded shadow-dark ">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>