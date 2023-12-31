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
    <div class="col-sm-12 col-lg-7 mt-3">
        <div class="card my-2 p-3">
            <div class="modal-body">
                <div class="mb-3">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label text-bold">Describe the Agent</label>
                            <div class="input-group input-group-outline rounded-full mt-n2">
                                {{-- @foreach ($context as $data) --}}
                                {{-- <input wire:model.defer="subject" type="text" id="subject" style="border: none"
                                    disabled class="form-control " placeholder="Enter subject"> --}}
                                <textarea wire:model.defer="content" type="text" id="content" style="border: none"
                                    disabled class="form-control " placeholder="type a prompt..." rows="5" ></textarea>
                                {{-- @endforeach --}}
                                <span class="pt-2 ps-1" id="enableDisableBtnContent"
                                    onclick="toggleDisabled('content', 'iconContent')">
                                    <i id="iconContent" class="fa-solid fa-pen-to-square fa-md"></i>
                                </span>
                            </div>
                            @error('content')
                                <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div> 
                <div class="d-flex flex-wrap justify-content-end">
                    {{-- <button type="button" class="btn btn-danger btn-rounded shadow-dark me-2" wire:click='fresh'
                        onclick="window.history.back();">Cancel</button> --}}
                    <button wire:click="updateContext" class="btn btn-success btn-rounded shadow-dark">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-5 mt-3">
        {{-- <livewire:chatbot.chat-ai> --}}
    </div>
</div>