<div>
    <header class="header-2">
        <div class="page-header min-vh-45 relative" style="background-image: url('./assets/img/bg2.jpg')">
            <span class="mask bg-gradient-primary opacity-4"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 text-center mx-auto">
                        <h1 class="text-white pt-3 mt-n2 pb-4">E - TICKETING</h1> 
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">
        <div class="container">
            <div class="row mt-3">
                <h3 class="">Create a new ticket</h3>
            </div>
                <div class="row mt-3">
                    <form wire:submit.prevent="createTicket">
                        <div class="modal-body">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <label class="form-label text-bold">Email</label>
                                        <div class="input-group input-group-outline rounded-full mt-n2">
                                            <input wire:model.defer="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Enter Email">
                                        </div>
                                        @error('email')
                                            <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label class="form-label text-bold">To Department</label>
                                        <div class="input-group input-group-outline mt-n2">
                                            <select wire:model.defer='department_id' class="form-control">
                                                <option value="">Select Department</option>
                                                @foreach ($department as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('department_id')
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
                                            <input wire:model.defer="subject" type="text" class="form-control " placeholder="Enter subject">
                                        </div>
                                        @error('subject')
                                            <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
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
                            @if (count($file) == 3)
                                <div class="mb-3">
                                    <span class="text-danger text-xs font-weight-light">Maximum 3 attachments allowed.</span>
                                </div>
                            @else
                            <div class="mb-3 ">
                                <label for="fileInput" class="form-label">
                                    <i class="fa-solid fa-file-circle-plus fa-xl"></i>
                                    <input type="file" wire:model="file" class="form-control" id="fileInput" style="display: none;" multiple>
                                    <span class="text-sm">Attachment</span>
                                </label>
                                @error('file')
                                    <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                @enderror
                                <br>
                                <div class="text-success text-sm font-weight-light" wire:loading wire:target="file">Uploading...</div>
                            </div>
                            @endif
                            
                            <div class="row justify-content-start mb-1">
                                @if ($file)
                                    @foreach ($file as $url)
                                    <div class="col-12 col-md-3 col-lg-3 mx-1 my-2">
                                        <img src="{{ $url->temporaryUrl() }}" class="avatar-scale-up shadow border-radius-2xl" style="width: 250px"
                                            alt="Temporary Image">
                                    </div>
                                    @endforeach
                                @endif
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