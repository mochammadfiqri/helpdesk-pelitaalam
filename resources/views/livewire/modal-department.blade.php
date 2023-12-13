{{-- Create --}}
<div wire:ignore.self class="modal fade" id="addDepartment" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="addDepartmentLabel" aria-hidden="true">
    <div class="modal-dialog overflow-auto overflow-x-hidden" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title font-weight-normal text-white" id="addDepartmentLabel">Tambah Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form wire:submit.prevent="createDepartment">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Department</label>
                        <div class="input-group input-group-outline rounded-full mt-n2">
                            <input wire:model.defer="name" type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Masukan Name Department">
                        </div>
                        @error('name')
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

{{-- Edit --}}
<div wire:ignore.self class="modal fade" id="editDepartment" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="editDepartmentLabel" aria-hidden="true">
    <div class="modal-dialog overflow-auto overflow-x-hidden" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title font-weight-normal text-white" id="editDepartmentLabel">Edit Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form wire:submit.prevent="updateDepartment">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Department</label>
                        <div class="input-group input-group-outline rounded-full mt-n2">
                            <input wire:model.defer="name" type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Masukan Nama Department">
                        </div>
                        @error('name')
                        <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                        @enderror
                    </div>
                    <div style="float: right;" class="border-0 mt-3">
                        <button type="submit" class="btn btn-success btn-rounded shadow-dark float-end">Update</button>
                        <button type="button" class="btn btn-danger btn-rounded shadow-dark me-2"
                            wire:click="resetModal" data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>