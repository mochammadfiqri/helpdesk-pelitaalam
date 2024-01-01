{{-- Modal --}}
<script>
    function showFileInput(id) {
        // Menyembunyikan semua input file
        document.getElementById('DataXlsx').style.display = 'none';
        document.getElementById('DataCsv').style.display = 'none';

        // Menampilkan input file sesuai dengan form check yang dipilih
        document.getElementById(id).style.display = 'block';
    }
</script>
<div wire:ignore.self class="modal fade" id="importUsers" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="importUsersLabel" aria-hidden="true">
    <div class="modal-dialog overflow-auto overflow-x-hidden" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title font-weight-normal text-white" id="importUsersLabel">Import Users</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form wire:submit.prevent="importUsers">
                <div class="modal-body">
                    <label class="text-sm mb-0" for="file">Pilih File .xlsx / .csv</label>
                    <span class="mb-0 float-end"><small><a
                                href="{{ asset('assets/template/template_add_users.xlsx') }}">Download
                                Template</a></small></span>
                    <div class="input-group input-group-outline my-1">
                        <input wire:model.defer="file" type="file" class="form-control">
                    </div>
                    @error('file')
                    <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                    @enderror
                    <div class="border-0 mt-2 float-end">
                        <button type="button" class="btn btn-danger btn-rounded shadow-dark me-2"
                            wire:click="resetModal" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success btn-rounded shadow-dark ">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>