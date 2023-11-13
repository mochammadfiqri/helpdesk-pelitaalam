{{-- Create --}}
<div wire:ignore.self class="modal fade" id="addKnowledge" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addKnowledgeLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg overflow-auto overflow-x-hidden" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title font-weight-normal text-white" id="addKnowledgeLabel">Tambah Knowledge Base</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form wire:submit.prevent="createKnowledge">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-8">
                                <label class="form-label">Title</label>
                                <div class="input-group input-group-outline rounded-full mt-n2">
                                    <input wire:model.defer="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror"
                                        placeholder="Masukan Title">
                                </div>
                                @error('title')
                                <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class="form-label">Type</label>
                                <div class="input-group input-group-outline mt-n2">
                                    <select wire:model.defer='type_id' class="form-control">
                                        <option value="">Pilih Type</option>
                                        @foreach ($type as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('type_id')
                                    <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        {{-- {{ $details }} --}}
                        <label class="form-label">Details</label>
                        <div wire:ignore class="mt-n2 mb-5">
                            <textarea wire:model.defer="details" id="details"></textarea>
                        </div>
                        @error('details')
                            <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                        @enderror
                        @push('ckeditor')
                            <script>
                                document.addEventListener('livewire:load', function () {
                                    ClassicEditor
                                        .create(document.querySelector('#details'))
                                        .then(editor => {
                                            editor.model.document.on('change:data', () => {
                                                let details = editor.getData();
                                                @this.set('details', details);
                                            });
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                });
                            </script>
                        @endpush
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
<div wire:ignore.self class="modal fade" id="updateKB" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="updateKBLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg overflow-auto overflow-x-hidden" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title font-weight-normal text-white" id="updateKBLabel">Edit Knowledge Base</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form wire:submit.prevent="updateKnowledge">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-8">
                                <label class="form-label">Title</label>
                                <div class="input-group input-group-outline rounded-full mt-n2">
                                    <input wire:model.defer="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror"
                                        placeholder="Masukan Title">
                                </div>
                                @error('title')
                                <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class="form-label">Type</label>
                                <div class="input-group input-group-outline mt-n2">
                                    <select wire:model.defer='type_id' class="form-control">
                                        <option value="">Pilih Type</option>
                                        @foreach ($type as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('type_id')
                                    <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        {{-- {{ $details }} --}}
                        <label class="form-label">Details</label>
                        <div wire:ignore class="mt-n2 mb-5">
                            <textarea wire:model.defer="details" id="details_edit" wire:init="mount('{{ $details }}')"></textarea>
                        </div>
                        @error('details')
                            <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                        @enderror
                        @push('ckeditor')
                            <script>
                                function initEditor(details) {
                                    document.addEventListener('livewire:load', function () {
                                        ClassicEditor
                                            .create(document.querySelector('#details_edit'))
                                            .then(editor => {
                                                editor.model.document.on('change:data', () => {
                                                    let details = editor.getData();
                                                    @this.set('details', details);
                                                });
                                            })
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    });
                                    
                                    Livewire.on('initEditor', details => {
                                        initEditor(details);
                                    });
                                }
                            </script>
                        @endpush
                    </div>
                    <div style="float: right;" class="border-0 mt-3">
                        <button type="submit" class="btn btn-success btn-rounded shadow-dark float-end">Update</button>
                        <button type="button" class="btn btn-danger btn-rounded shadow-dark me-2" data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>