<div class="card my-2">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <div class="row">
                <div class="col-12">
                    <h6 class="text-white text-uppercase ps-3 float-start">
                        Try your prompt !
                    </h6>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            @if ($checkedDiscussion)
            <div style="max-height: 410px; overflow-y: auto;">
                @foreach ($messages as $message)
                @if (auth()->id() == $message->sender_id)
                {{-- Chat Me --}}
                <div wire:key='{{ $message->id }}' class="d-flex flex-row-reverse" style="pointer-events: none">
                    <div class="col-10 d-flex justify-content-between justify-content-lg-end align-items-end ">
                        <div class="btn border border-light text-black-50 text-sm-start text-wrap text-capitalize px-3"
                            style="background-color: #d9fdd3; font-family: Helvetica;">
                            {{-- <span class="d-flex flex-row-reverse" style="user-select: text;">{{
                                Auth::user()->nama }}</span> --}}
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
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                        <path
                                            d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z" />
                                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708" />
                                    </svg> --}}
                                </span>
                            </div>
                        </div>
                        {{-- <img
                            src="https://ui-avatars.com/api/?background=random&bold=true&name={{ Auth::user()->nama }}"
                            class="avatar avatar-sm align-items-start ms-2"> --}}
                    </div>
                </div>
                @elseif (auth()->id() == $message->receiver_id)
                <div wire:key='{{ $message->id }}'
                    class="col-10 d-flex justify-content-between justify-content-lg-start align-items-start "
                    style="pointer-events: none">
                    @php
                    $receiverId = ($message->receiver_id != auth()->user()->id) ? $message->receiver_id :
                    $message->sender_id;
                    $receiver = \App\Models\User::find($receiverId);
                    @endphp
                    @if($receiver)
                    <img src="https://ui-avatars.com/api/?background=random&bold=true&name={{ $receiver->nama }}"
                        class="avatar avatar-sm align-items-start me-2">
                    @endif
                    <div class="btn border border-light text-black-50 text-sm-start text-wrap text-capitalize px-3"
                        style="background-color: #f0f2f5; font-family: Helvetica;">
                        @php
                        $receiver = \App\Models\User::find(($message->receiver_id != auth()->user()->id) ?
                        $message->receiver_id : $message->sender_id);
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
                <a class="btn btn-rounded border mb-0 me-2 p-0 px-3" role="button"
                    style="display: flex; align-items: center;">
                    <input wire:model="sentMessage" wire:keydown.enter="sendMessage" type="text"
                        class="form-control flex-grow-1" placeholder="Type Message..." style="min-width: 0;">
                    <button wire:click='sendMessage' style="background: none; border: none">
                        <i class="fa-solid fa-paper-plane fa-xl ms-2" style="color: #e53472;"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>