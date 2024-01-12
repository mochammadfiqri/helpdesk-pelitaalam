<div>
    <header class="header-2">
        <div class="page-header min-vh-45 relative" style="background-image: url('./assets/img/bg2.jpg')">
            <span class="mask bg-gradient-primary opacity-4"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 text-center mx-auto">
                        <h1 class="text-white pt-3 mt-n2 pb-4">CHATBOT</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="card card-body blur shadow-blur px-4 px-lg-8 mx-3 mx-lg-3 mx-md-8 mt-n6">
        <div class="container-sm container-lg">
            <div class="row mt-3">
                {{-- @foreach ($context as $result)
                    <img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&bold=true&name={{ $result['role'] }}"
                        class="avatar avatar-xs me-n2">
                    <div class="col-12 d-flex justify-content-between justify-content-lg-start align-items-start">
                        <div class="btn border-transparent text-dark text-sm-start text-wrap pt-0"
                            style="background-color: transparent; font-family: Helvetica;">
                            <span style="user-select: text;">{{ $result['role'] }}</span><br>
                            <span class="text-lowercase" style="user-select: text;">{{ $result['content'] }}</span>
                        </div>
                    </div>
                @endforeach --}}
                @foreach ($context as $result)
                    @if ($context == 0)
                        <div class="d-flex flex-column align-items-center pb-5">
                            <img src="../assets/img/ChatGPT-Logo.png" class="w-20">
                            <h3>how can i help you?</h3>
                        </div>
                    @else
                        <div class="d-flex justify-content-start align-items-start " style="pointer-events: none">
                            <div class="flex-shrink-1">
                                @if (Auth::user())
                                    <img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&bold=true&name={{ Auth::user()->nama }}"
                                        class="avatar avatar-sm align-items-start me-2">    
                                @else
                                    <img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&bold=true&name={{ $result['role'] }}"
                                        class="avatar avatar-sm align-items-start me-2">
                                @endif
                            </div>
                            <div class="w-100">
                                <div class="btn border border-light text-black-50 text-capitalize px-3"
                                    style="background-color: #f0f2f5; font-family: Helvetica;">
                                    <span class="float-start" style="user-select: text;">{{ $result['role'] }}</span><br>
                                    {{-- <span class="text-start" style="user-select: text;">
                                        {{ $result['content'] }}
                                    </span>  --}}
                                    <p class="text-start text-justify" style="user-select: text; font-size: 10pt;">{{ $result['content'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="d-flex d-block justify-content-end">
                    <div class="w-95 col-12">
                        <a class="btn btn-rounded border mb-0 me-2 p-0 px-3" role="button"
                            style="display: flex; align-items: center;">
                            {{-- <textarea wire:model="sendPrompt" wire:keydown.enter="newPrompt" type="text"
                                class="form-control flex-grow-1" placeholder="Input your prompt..." style="min-width: 0;"
                                rows="1"></textarea> --}}
                            <input wire:model="sendPrompt" wire:keydown.enter="newPrompt" type="text"
                                class="form-control flex-grow-1" placeholder="Input your prompt..." style="min-width: 0;">
                            <button wire:click="newPrompt" style="background: none; border: none">
                                <i class="fa-solid fa-circle-arrow-up fa-2xl ms-2" style="color: #e53472;"></i>
                            </button>
                            <button wire:click="resetSession" style="background: none; border: none">
                                <i class="fa-solid fa-trash fa-2xl ms-2" style="color: #e53472;"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
