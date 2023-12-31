<div class="row ">
    <div class="col-12 mt-3">
        <div class="card my-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-white text-uppercase ps-3 float-start">
                                Create a new ticket 
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <form wire:submit.prevent="createTicket">
                        <div class="modal-body">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label text-bold">User</label>
                                        <div class="input-group mt-n2">
                                            <input wire:model.defer="user_id" type="text" class="form-control" disabled>
                                        </div>
                                        @error('user_id')
                                        <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label text-bold">Assigned To</label>
                                        <div class="input-group input-group-outline mt-n2">
                                            <select wire:model.defer='assigned_user_id' class="form-control">
                                                <option value="">Select User</option>
                                                @foreach ($assignToUser as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('user_id')
                                        <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label text-bold">Subject</label>
                                        <div class="input-group input-group-outline rounded-full mt-n2">
                                            <input wire:model.defer="subject" type="text" class="form-control @error('subject') is-invalid @enderror"
                                                placeholder="Enter subject">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                {{-- {{ $details }} --}}
                                <label class="form-label text-bold">Details</label>
                                <div wire:ignore class="mt-n2 mb-2">
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
                            <div class="mb-3 ">
                                <label for="fileInput" class="form-label">
                                    <i class="fa-solid fa-file-circle-plus fa-xl"></i>
                                    <input type="file" class="form-control" id="fileInput" style="display: none;">
                                    <span class="text-sm">Attach File</span>
                                </label>
                            </div>
                            <div style="float: right;" class="border-0 mt-3">
                                <button type="submit"
                                    class="btn btn-success btn-rounded shadow-dark float-end">Create Ticket</button>
                                <button type="button" class="btn btn-danger btn-rounded shadow-dark me-2"
                                    wire:click='fresh' onclick="window.history.back();">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>