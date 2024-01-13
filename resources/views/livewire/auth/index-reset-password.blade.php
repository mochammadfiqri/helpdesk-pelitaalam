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
                        @if ($errors->any())
                        <ul>
                            @foreach ($errors->all as $error)
                            <li><span class="text-danger text-sm font-weight-light">{{ $error }}</span></li>
                            @endforeach
                        </ul>
                        @endif
                        @if (session()->has('status'))
                            <span class="text-success text-sm font-weight-light">{{ session()->get('status') }}</span>
                        @endif
                    </div>
                    <div class="card-body">
                       
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            {{-- get token dan email --}}
                            <input type="hidden" name="token" value="{{ request()->token }}">
                            <input type="hidden" name="email" value="{{ request()->email }}">

                            <!-- Masukkan input password dan konfirmasi password -->
                            <div class="input-group input-group-outline mt-0 mb-2">
                                <label class="form-label">Masukkan Password Baru</label>
                                <input type="password" id="password" name="password" class="form-control" oninput="checkInput(this)"
                                    onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="input-group input-group-outline mt-0 mb-2">
                                <label class="form-label">Konfirmasi Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" oninput="checkPasswordMatch()"
                                    class="form-control" oninput="checkInput(this)" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                    
                            <!-- Tombol untuk melakukan reset password -->
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Ganti Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>