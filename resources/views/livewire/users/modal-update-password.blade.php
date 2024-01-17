<div wire:ignore.self class="modal fade" id="updatePassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="updatePasswordLabel" aria-hidden="true">
    <div class="modal-dialog overflow-auto overflow-x-hidden" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title font-weight-normal text-white" id="updatePasswordLabel">Ganti Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label text-bold">Password Baru</label>
                    <div class="input-group input-group-outline mt-n2">
                        <input wire:model.defer="password" type="password" id="password" class="form-control" placeholder="Password Baru">
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
                <div class="border-0 mt-3">
                    <button type="submit" wire:click='updatePassword' class="btn btn-success btn-rounded shadow-dark float-end">Update</button>
                    <button type="button" class="btn btn-secondary btn-rounded shadow-dark me-2 float-end"
                        data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>