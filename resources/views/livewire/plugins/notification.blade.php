<li class="nav-item dropdown pe-2 d-flex align-items-center">
    @if ($notif->count() == 0)
        <i class="fa-solid fa-bell fa-xl cursor-pointer"></i>
    @else
        <a class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fa-solid fa-bell fa-shake fa-xl cursor-pointer"></i>
            <span class="position-absolute top-5 start-100 translate-middle badge rounded-pill bg-danger border border-white small py-1 px-2">
                <span class="small">{{ $notif->count() }}</span>
                <span class="visually-hidden">unread notifications</span>
            </span>
        </a>
    @endif
    <ul class="dropdown-menu  dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
        @foreach ($notif as $data)
        <li class="mb-2">
            <a class="dropdown-item border-radius-md" wire:click="markAsRead('{{ $data->ticket_key }}')" style="cursor: pointer;">
                <div class="d-flex py-1">
                    <div class="my-auto">
                        {{-- <img src="../assets/img/user.png" class="avatar avatar-sm  me-3 "> --}}
                        <img src="https://ui-avatars.com/api/?background=random&bold=true&name={{ $data->user->nama }}"
                            class="avatar avatar-sm me-3">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold">{{ $data->user->nama }}</span> telah membuat ticket
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            {{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}
                        </p>
                    </div>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</li>