<div> 
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
    <div class="row ">
        <div class="col-sm-12 col-lg-7 mt-3">
            <div class="card my-2 p-3">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="row"> 
                            <div class="col-4">
                                <label class="form-label text-bold">User</label>
                                <div class="input-group input-group-outline mt-n2">
                                    <select wire:model.defer='user_id' class="form-control" id="userSelect" style="border: none" disabled>
                                        <option value="">Select User</option>
                                        @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @if (Auth::user()->role_id == 1)
                                    <span class="pt-2 ps-1" id="enableDisableBtnUser" onclick="toggleDisabled('userSelect', 'iconUser')">
                                        <i id="iconUser" class="fa-solid fa-pen-to-square fa-md"></i>
                                    </span>
                                    @endif
                                </div>
                                @error('user_id')
                                <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class="form-label text-bold">Priority</label>
                                <div class="input-group input-group-outline mt-n2">
                                    <select wire:model.defer='priority_id' class="form-control" id="prioritySelect" style="border: none" disabled>
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
                                    <select wire:model.defer='department_id' class="form-control" id="departmentSelect" style="border: none" disabled>
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
                                <label class="form-label text-bold">Assigned To</label>
                                <div class="input-group input-group-outline mt-n2">
                                    <select wire:model.defer='assigned_user_id' class="form-control" id="assignSelect" style="border: none" disabled>
                                        <option value="">Select User</option>
                                        @foreach ($assignToUser as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @if (Auth::user()->role_id == 1)
                                    <span class="pt-2 ps-1" id="enableDisableBtnAssigned" onclick="toggleDisabled('assignSelect', 'iconAssign')">
                                        <i id="iconAssign" class="fa-solid fa-pen-to-square fa-md"></i>
                                    </span>
                                    @endif
                                </div>
                                @error('assigned_user_id')
                                <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class="form-label text-bold">Type</label>
                                <div class="input-group input-group-outline mt-n2">
                                    <select wire:model.defer='type_id' class="form-control" id="typeSelect" style="border: none" disabled>
                                        <option value="">Select Type</option>
                                        @foreach ($type as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @if (Auth::user()->role_id == 1)
                                    <span class="pt-2 ps-1" id="enableDisableBtnType" onclick="toggleDisabled('typeSelect', 'iconType')">
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
                                    <select wire:model.defer='category_id' class="form-control" id="categorySelect" style="border: none" disabled>
                                        <option value="">Select Category</option>
                                        @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @if (Auth::user()->role_id == 1)
                                    <span class="pt-2 ps-1" id="enableDisableBtnCategory" onclick="toggleDisabled('categorySelect', 'iconCategory')">
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
                            <div class="col-5">
                                <label class="form-label text-bold">Status</label>
                                <div class="input-group input-group-outline mt-n2">
                                    <select wire:model.defer='status_id' class="form-control" id="statusSelect" style="border: none" disabled>
                                        <option value="">Select Status</option>
                                        @foreach ($status as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @if (Auth::user()->role_id != 2)
                                    <span class="pt-2 ps-1" id="enableDisableBtnStatus" onclick="toggleDisabled('statusSelect', 'iconStatus')">
                                        <i id="iconStatus" class="fa-solid fa-pen-to-square fa-md"></i>
                                    </span>
                                    @endif
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
                                    <input wire:model.defer="subject" type="text" id="subject" style="border: none" disabled class="form-control " placeholder="Enter subject">
                                    <span class="pt-2 ps-1" id="enableDisableBtnSubject" onclick="toggleDisabled('subject', 'iconSubject')">
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
                    <div class="d-flex flex-wrap" >
                        {{-- @if (Auth::user()->role_id == 1)
                            <button type="button" class="btn btn-info btn-rounded shadow-dark me-auto " wire:click='importToDataset'>Import To Dataset</button>
                        @endif --}}
                        <button type="button" class="btn btn-danger btn-rounded shadow-dark me-2" wire:click='fresh'
                            onclick="window.history.back();">Cancel</button>
                        <button type="submit" wire:click.prevent="updateTicket" class="btn btn-success btn-rounded shadow-dark ">Update
                            Ticket</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-5 mt-3">
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
                    <div class="row mt-3" >
                        @if ($checkedDiscussion)
                            <div style="max-height: 410px; overflow-y: auto;">
                                @foreach ($messages as $message)
                                    @if (auth()->id() == $message->sender_id)
                                        {{-- Chat Me --}}
                                        <div wire:key='{{ $message->id }}' class="d-flex flex-row-reverse" style="pointer-events: none">
                                            <div class="col-10 d-flex justify-content-between justify-content-lg-end align-items-end ">
                                                <div class="btn border border-light text-black-50 text-sm-start text-wrap text-capitalize px-3"
                                                    style="background-color: #d9fdd3; font-family: Helvetica;">
                                                    {{-- <span class="d-flex flex-row-reverse" style="user-select: text;">{{ Auth::user()->nama }}</span> --}}
                                                    <span style="user-select: text; ">
                                                        {{ $message->body }}
                                                    </span>
                                                    <div class="text-xxs float-end pt-3">
                                                        <small>{{ $message->created_at->format('m: i a') }}</small><span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                                class="bi bi-check2" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                                            </svg>
                                                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                                class="bi bi-check2-all" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z" />
                                                                <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708" />
                                                            </svg> --}}
                                                        </span>
                                                    </div>
                                                </div>
                                                {{-- <img src="https://ui-avatars.com/api/?background=random&bold=true&name={{ Auth::user()->nama }}"
                                                    class="avatar avatar-sm align-items-start ms-2"> --}}
                                            </div>
                                        </div>
                                    @elseif (auth()->id() == $message->receiver_id)
                                        <div wire:key='{{ $message->id }}' class="col-10 d-flex justify-content-between justify-content-lg-start align-items-start " style="pointer-events: none">
                                            @php
                                                $receiverId = ($message->receiver_id != auth()->user()->id) ? $message->receiver_id : $message->sender_id;
                                                $receiver = \App\Models\User::find($receiverId);
                                            @endphp
                                            @if($receiver)
                                                <img src="https://ui-avatars.com/api/?background=random&bold=true&name={{ $receiver->nama }}"
                                                    class="avatar avatar-sm align-items-start me-2">
                                            @endif
                                            <div class="btn border border-light text-black-50 text-sm-start text-wrap text-capitalize px-3"
                                                style="background-color: #f0f2f5; font-family: Helvetica;">
                                                @php
                                                    $receiver = \App\Models\User::find(($message->receiver_id != auth()->user()->id) ? $message->receiver_id : $message->sender_id);
                                                @endphp
                                                @if($receiver)
                                                    <span style="user-select: text;">{{ $receiver->nama }}</span><br>
                                                @endif
                                                <span style="user-select: text;">
                                                    {{ $message->body }}
                                                </span>
                                                <div class="text-xxs float-end pt-3">
                                                    <small>17:45 PM</small><span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                            class="bi bi-check2" viewBox="0 0 16 16">
                                                            <path
                                                                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                                        </svg>
                                    
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <p class="text-center">No Discussion</p>
                        @endif
                        
                        <div class="pb-3">
                            <a class="btn btn-rounded border mb-0 me-2 p-0 px-3" role="button" style="display: flex; align-items: center;">
                                <input wire:model="sentMessage" wire:keydown.enter="sendMessage" type="text" class="form-control flex-grow-1" placeholder="Type Message..." style="min-width: 0;">
                                <button wire:click='sendMessage' style="background: none; border: none" >
                                    <i class="fa-solid fa-paper-plane fa-xl ms-2" style="color: #e53472;"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>