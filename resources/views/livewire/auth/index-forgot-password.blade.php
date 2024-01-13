<div class="page-header align-items-start min-vh-100"
    style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                <div class="card z-index-0 fadeIn3 fadeInBottom">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Lupa Password</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            @foreach ($errors->all as $error)
                                <span class="text-danger text-sm font-weight-light">{{ $error }}</span>
                            @endforeach
                        @endif
                        @if (session()->has('status'))
                            <span class="text-success text-sm font-weight-light">{{ session()->get('status') }}</span>
                        @endif
                        <form action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <div class="input-group input-group-outline mt-0 mb-2">
                                <label class="form-label">Masukan Email</label>
                                <input id="email" name="email" type="email" class="form-control"
                                    oninput="checkInput(this)" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Reset
                                    Password Link</button>
                            </div>
                        </form>
                        {{-- @error('email')
                        <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                        @enderror --}}
                        {{-- <form wire:submit.prevent="resetPassword">
                            <div class="input-group input-group-outline mt-n2">
                                <input wire:model.defer="email" type="email" class="form-control" id="email"
                                    placeholder="Masukan Email">
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Send Password Link</button>
                            </div>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>