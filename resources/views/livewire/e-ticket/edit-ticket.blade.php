<div> 
    <script>
        // Simpan nilai awal properti gaya border
        var initialBorderStyle = '';
    
        function toggleReadonly(selectId, iconId) {
            var selectElement = document.getElementById(selectId);
            var iconElement = document.getElementById(iconId);
    
            // Jika belum disimpan, simpan nilai awal properti gaya border
            if (!initialBorderStyle) {
                initialBorderStyle = selectElement.style.border;
            }  
            selectElement.readOnly = !selectElement.readOnly; 
            selectElement.style = !selectElement.style;

            // Ubah kelas dan gaya berdasarkan status readOnly
            if (selectElement.readOnly) {
                iconElement.className = 'fa-solid fa-pen-to-square fa-md';
                // Kosongkan atau ubah properti gaya yang diinginkan
                iconElement.style.color = ''; // Contoh: kembalikan warna ke nilai default atau kosong
                selectElement.style.border = 'none'; // Contoh: setel border ke none
            } else {
                iconElement.className = 'fa-regular fa-circle-xmark fa-md';
                // Kosongkan atau ubah properti gaya yang diinginkan
                iconElement.style.color = 'red'; // Contoh: ubah warna menjadi merah
            }
        }
    </script>
    {{-- <script>
        // Simpan nilai awal properti gaya border
        var initialBorderStyle = '';
    
        function toggleReadonly(inputId, iconId) {
            var inputElement = document.getElementById(inputId);
            var iconElement = document.getElementById(iconId);
    
            // Jika belum disimpan, simpan nilai awal properti gaya border
            if (!initialBorderStyle) {
                initialBorderStyle = inputElement.style.border;
            }
    
            // Ubah properti disabled
            inputElement.readOnly = !inputElement.readOnly;
    
            // Ubah kelas dan gaya berdasarkan status readonly
            if (inputElement.readOnly) {
                iconElement.className = 'fa-solid fa-pen-to-square fa-md';
                // Kosongkan atau ubah properti gaya yang diinginkan
                iconElement.style.color = ''; // Contoh: kembalikan warna ke nilai default atau kosong
                inputElement.style.border = 'none'; // Contoh: setel border ke none
            } else {
                iconElement.className = 'fa-regular fa-circle-xmark fa-md';
                // Kosongkan atau ubah properti gaya yang diinginkan
                iconElement.style.color = 'red'; // Contoh: ubah warna menjadi merah
            }
        }
    </script> --}}
    <div class="row ">
        <div class="col-7 mt-3">
            <div class="card my-2 p-3">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="row"> 
                            <div class="col-4">
                                <label class="form-label text-bold">User</label>
                                <div class="input-group input-group-outline mt-n2">
                                    <select wire:model.defer='user_id' class="form-control" id="userSelect" style="border: none" readOnly>
                                        <option value="">Select User</option>
                                        @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    <span class="pt-2 ps-1" id="enableDisableBtnUser" onclick="toggleReadonly('userSelect', 'iconUser')">
                                        <i id="iconUser" class="fa-solid fa-pen-to-square fa-md"></i>
                                    </span>
                                </div>
                                @error('user_id')
                                <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class="form-label text-bold">Priority</label>
                                <div class="input-group input-group-outline mt-n2">
                                    <select wire:model.defer='priority_id' class="form-control" id="prioritySelect" style="border: none" readOnly>
                                        <option value="">Select Priority</option>
                                        @foreach ($priority as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="pt-2 ps-1" id="enableDisableBtnPriority"
                                        onclick="toggleReadonly('prioritySelect', 'iconPriority')">
                                        <i id="iconPriority" class="fa-solid fa-pen-to-square fa-md"></i>
                                    </span>
                                </div>
                                @error('priority_id')
                                <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class="form-label text-bold">Department</label>
                                <div class="input-group input-group-outline mt-n2">
                                    <select wire:model.defer='department_id' class="form-control" id="departmentSelect" style="border: none" readOnly>
                                        <option value="">Select Department</option>
                                        @foreach ($department as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="pt-2 ps-1" id="enableDisableBtnDepartment"
                                        onclick="toggleReadonly('departmentSelect', 'iconDepartment')">
                                        <i id="iconDepartment" class="fa-solid fa-pen-to-square fa-md"></i>
                                    </span>
                                </div>
                                @error('department_id')
                                <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-4">
                                <label class="form-label text-bold">Assigned To</label>
                                <div class="input-group input-group-outline mt-n2">
                                    <select wire:model.defer='assigned_user_id' class="form-control" id="assignSelect" style="border: none" readOnly>
                                        <option value="">Select User</option>
                                        @foreach ($assignToUser as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    <span class="pt-2 ps-1" id="enableDisableBtnAssigned" onclick="toggleReadonly('assignSelect', 'iconAssign')">
                                        <i id="iconAssign" class="fa-solid fa-pen-to-square fa-md"></i>
                                    </span>
                                </div>
                                @error('assigned_user_id')
                                <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class="form-label text-bold">Type</label>
                                <div class="input-group input-group-outline mt-n2">
                                    <select wire:model.defer='type_id' class="form-control" id="typeSelect" style="border: none" readOnly>
                                        <option value="">Select Type</option>
                                        @foreach ($type as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="pt-2 ps-1" id="enableDisableBtnType" onclick="toggleReadonly('typeSelect', 'iconType')">
                                        <i id="iconType" class="fa-solid fa-pen-to-square fa-md"></i>
                                    </span>
                                </div>
                                @error('type_id')
                                <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class="form-label text-bold">Category</label>
                                <div class="input-group input-group-outline mt-n2">
                                    <select wire:model.defer='category_id' class="form-control" id="categorySelect" style="border: none" readOnly>
                                        <option value="">Select Category</option>
                                        @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="pt-2 ps-1" id="enableDisableBtnCategory" onclick="toggleReadonly('categorySelect', 'iconCategory')">
                                        <i id="iconCategory" class="fa-solid fa-pen-to-square fa-md"></i>
                                    </span>
                                </div>
                                @error('category_id')
                                <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row"> 
                            <div class="col-5">
                                <label class="form-label text-bold">Status</label>
                                <div class="input-group input-group-outline mt-n2">
                                    <select wire:model.defer='status_id' class="form-control" id="statusSelect" style="border: none" readOnly>
                                        <option value="">Select Status</option>
                                        @foreach ($status as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="pt-2 ps-1" id="enableDisableBtnStatus" onclick="toggleReadonly('statusSelect', 'iconStatus')">
                                        <i id="iconStatus" class="fa-solid fa-pen-to-square fa-md"></i>
                                    </span>
                                </div>
                                @error('status')
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
                                    <input wire:model.defer="subject" type="text" id="subject" style="border: none" readOnly class="form-control " placeholder="Enter subject">
                                    <span class="pt-2 ps-1" id="enableDisableBtnSubject" onclick="toggleReadonly('subject', 'iconSubject')">
                                        <i id="iconSubject" class="fa-solid fa-pen-to-square fa-md"></i>
                                    </span>
                                </div>
                                @error('subject')
                                <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Details</label>
                        {{-- <span class="pt-2 ps-1" id="enableDisableBtnDetails" wire:click="toggleDetails">
                            <i id="iconDetails" class="fa-solid fa-pen-to-square fa-md"></i>
                        </span> --}}
                        <div wire:ignore class="mt-n2 mb-2">
                            <textarea class="form-control" rows="1" id="details_add" style="background: transparent">{{ $details }}</textarea>
                            <script>
                                document.addEventListener('livewire:load', function () {
                                    var detailsEditor = ClassicEditor
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
                        <button type="submit" wire:click.prevent="updateTicket" class="btn btn-success btn-rounded shadow-dark float-end">Update
                            Ticket</button>
                        <button type="button" class="btn btn-danger btn-rounded shadow-dark me-2" wire:click='fresh'
                            onclick="window.history.back();">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5 mt-3">
            <div class="card my-2">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <div class="row">
                            <div class="col-12">
                                <h6 class="text-white text-uppercase ps-3 float-start">
                                    Ticket discussion
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <p>content</p> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>