<div class="row ">
    <div class="col-12 mt-3">
        <div class="card my-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-white text-uppercase ps-3 float-start">
                                Edit Knowledge Base
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="mb-3">
                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="form-label">Title</label>
                                <div class="input-group input-group-outline rounded-full mt-n2">
                                    <input wire:model.defer="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" placeholder="Masukan Title">
                                </div>
                                @error('title')
                                <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <label class="form-label">Slug</label>
                                <div class="input-group mt-n2">
                                    <input wire:model.defer="slug" type="text" class="form-control" disabled>
                                </div>
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
                        <label class="form-label">Details</label>
                        <div wire:ignore class="mt-n2 mb-5">
                            <textarea id="details_edit">{{ $details }}</textarea>
                            {{-- <div id="details_edit"></div> --}}
                            <script>
                                document.addEventListener('livewire:load', function () {
                                                ClassicEditor
                                                    .create(document.querySelector('#details_edit'), {
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
                    <div class="border-0 mt-3">
                        <button type="submit" wire:click="updateKnowledge" class="btn btn-success btn-rounded shadow-dark float-end">Update</button>
                        <button type="button" class="btn btn-danger btn-rounded shadow-dark me-2 float-end"
                            data-bs-dismiss="modal" onclick="window.history.back();">Batal</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>