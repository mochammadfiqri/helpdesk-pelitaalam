<div class="row ">
    {{-- @include('livewire.modal-knowledge') --}}
    <div class="col-12 mt-3">
        <div class="card my-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-white text-uppercase ps-3 float-start">
                                Tambah Knowledge Base
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <form wire:submit.prevent="createKnowledge">
                        <div class="modal-body">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-8">
                                        <label class="form-label text-bold">Title</label>
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
                                        <label class="form-label text-bold">Category</label>
                                        <div class="input-group input-group-outline mt-n2">
                                            <select wire:model.defer='category_id' class="form-control">
                                                <option value="">Pilih Category</option>
                                                @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category_id')
                                        <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                {{-- {{ $details }} --}}
                                <label class="form-label text-bold">Details</label>
                                <div wire:ignore class="mt-n2 mb-5">
                                    <textarea id="details_add"></textarea>
                                    <script>
                                        document.addEventListener('livewire:load', function () {
                                            ClassicEditor
                                                .create(document.querySelector('#details_add'), {
                                                    language: 'en'
                                                })
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
                                </div>
                                @error('details')
                                    <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                @enderror
                            </div>
                            <div style="float: right;" class="border-0">
                                <button type="submit"
                                    class="btn btn-success btn-rounded shadow-dark float-end">Simpan</button>
                                <button type="button" class="btn btn-danger btn-rounded shadow-dark me-2"
                                    wire:click='fresh' onclick="window.history.back();">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>