<div class="row ">
    <script>
        function toggleDisabled(selectId, iconId) {
            var selectElement = document.getElementById(selectId);
            var iconElement = document.getElementById(iconId);
    
            selectElement.disabled = !selectElement.disabled;
    
            // Ubah kelas dan gaya berdasarkan status disabled
            if (selectElement.disabled) {
                iconElement.className = 'fa-solid fa-pen-to-square fa-md';
                // Kosongkan atau ubah properti gaya yang diinginkan
                iconElement.style.color = ''; // Contoh: kembalikan warna ke nilai default atau kosong
                selectElement.style.border = 'none'; // Contoh: setel border ke none
            } else {
                iconElement.className = 'fa-regular fa-circle-xmark fa-md';
                // Kosongkan atau ubah properti gaya yang diinginkan
                iconElement.style.color = 'red'; // Contoh: ubah warna menjadi merah
                selectElement.style = !selectElement.style;
            }
        }
    </script>
    <div class="col-sm-12 col-lg-12 mt-3">
        <div class="card my-2 p-3">
            <div class="modal-body">
                <div class="mb-3">
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label text-bold">Priority</label>
                            <div class="input-group input-group-outline mt-n2">
                                <select wire:model.defer='priority_id' class="form-control" id="prioritySelect"
                                    style="border: none" disabled>
                                    <option value="">Select Priority</option>
                                    @foreach ($priority as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if (Auth::user()->role_id == 1)
                                    <span class="pt-2 ps-1" id="enableDisableBtnPriority"
                                        onclick="toggleDisabled('prioritySelect', 'iconPriority')">
                                        <i id="iconPriority" class="fa-solid fa-pen-to-square fa-md"></i>
                                    </span>
                                @endif
                            </div>
                            @error('priority_id')
                                <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label class="form-label text-bold">Department</label>
                            <div class="input-group input-group-outline mt-n2">
                                <select wire:model.defer='department_id' class="form-control" id="departmentSelect"
                                    style="border: none" disabled>
                                    <option value="">Select Department</option>
                                    @foreach ($department as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if (Auth::user()->role_id == 1)
                                    <span class="pt-2 ps-1" id="enableDisableBtnDepartment"
                                        onclick="toggleDisabled('departmentSelect', 'iconDepartment')">
                                        <i id="iconDepartment" class="fa-solid fa-pen-to-square fa-md"></i>
                                    </span>
                                @endif
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
                            <label class="form-label text-bold">Type</label>
                            <div class="input-group input-group-outline mt-n2">
                                <select wire:model.defer='type_id' class="form-control" id="typeSelect"
                                    style="border: none" disabled>
                                    <option value="">Select Type</option>
                                    @foreach ($type as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if (Auth::user()->role_id == 1)
                                    <span class="pt-2 ps-1" id="enableDisableBtnType"
                                        onclick="toggleDisabled('typeSelect', 'iconType')">
                                        <i id="iconType" class="fa-solid fa-pen-to-square fa-md"></i>
                                    </span>
                                @endif
                            </div>
                            @error('type_id')
                                <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label class="form-label text-bold">Category</label>
                            <div class="input-group input-group-outline mt-n2">
                                <select wire:model.defer='category_id' class="form-control" id="categorySelect"
                                    style="border: none" disabled>
                                    <option value="">Select Category</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if (Auth::user()->role_id == 1)
                                    <span class="pt-2 ps-1" id="enableDisableBtnCategory"
                                        onclick="toggleDisabled('categorySelect', 'iconCategory')">
                                        <i id="iconCategory" class="fa-solid fa-pen-to-square fa-md"></i>
                                    </span>
                                @endif
                            </div>
                            @error('category_id')
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
                                <input wire:model.defer="subject" type="text" id="subject"
                                    style="border: none" disabled class="form-control "
                                    placeholder="Enter subject">
                                @if (Auth::user()->role_id == 1)
                                    <span class="pt-2 ps-1" id="enableDisableBtnSubject"
                                        onclick="toggleDisabled('subject', 'iconSubject')">
                                        <i id="iconSubject" class="fa-solid fa-pen-to-square fa-md"></i>
                                    </span>
                                @endif
                            </div>
                            @error('subject')
                                <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-bold">Details</label>
                    @if (Auth::user()->role_id == 1)
                        <div wire:ignore class="mt-n2 mb-2">
                            <textarea class="form-control" rows="1" id="details_add" style="background: transparent">{{ $details }}</textarea>
                            <script>
                                document.addEventListener('livewire:load', function() {
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
                    @endif
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
                <div class="d-flex flex-wrap">
                    <button type="button" class="btn btn-secondary btn-rounded shadow-dark me-2"
                        wire:click='fresh' onclick="window.history.back();">Cancel</button>
                    <button type="submit" wire:click.prevent="updateTicket"
                        class="btn btn-success btn-rounded shadow-dark ">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>
