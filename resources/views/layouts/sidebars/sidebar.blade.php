<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="https://github.com/mochammadfiqri/siakad-pelitaalam" target="_blank">
            <div class="d-flex align-items-center">
                <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
                <div class="d-flex flex-column ms-2">
                    <span class="font-weight-bold text-white">
                        HELPDESK
                    </span>
                    <span class="font-weight-bold text-white">
                        PELITA ALAM
                    </span>
                </div>
            </div>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto h-auto ps" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @if (Auth::user()->role_id == 1)
                <li class="nav-item mb-2 mt-0">
                    <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white" aria-controls="ProfileNav" role="button"
                        aria-expanded="false">
                        <img src="../assets/img/user.png" class="avatar">
                        <span class="font-weight-bold text-white ms-2 ps-1">{{ Auth::user()->nama }}</span>
                    </a>
                    <div class="collapse" id="ProfileNav" style="">
                        <ul class="nav ">
                            <li class="nav-item">
                                <a href="/profile_admin"
                                    class="nav-link text-white {{ request()->routeIs('profile-admin') ? 'active' : '' }}">
                                    <span class="material-icons-round">person</span>
                                    <span class="sidenav-normal ms-3 ps-1">My Profile</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                {{-- @include('livewire.auth.logout') --}}
                                <livewire:auth.logout>
                            </li>
                        </ul>
                    </div>
                </li>
                <hr class="horizontal light mt-0 mb-2">
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active bg-gradient-primary' : '' }}" href="{{ url('dashboard') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Knowledge Base</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Chatbot</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Ticket</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">view_in_ar</i>
                        </div>
                        <span class="nav-link-text ms-1">Categories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                        </div>
                        <span class="nav-link-text ms-1">Priority</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                        </div>
                        <span class="nav-link-text ms-1">Status</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('users') ? 'active bg-gradient-primary' : '' }}" href="{{ url('users') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                        </div>
                        <span class="nav-link-text ms-1">Users</span>
                    </a>
                </li>
            @elseif (Auth::user()->role_id != 1)
                <li class="nav-item mb-2 mt-0">
                    <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white" aria-controls="ProfileNav" role="button"
                        aria-expanded="false">
                        <img src="../assets/img/user.png" class="avatar">
                        <span class="font-weight-bold text-white ms-2 ps-1">{{ Auth::user()->nama }}</span>
                    </a>
                    <div class="collapse" id="ProfileNav" style="">
                        <ul class="nav ">
                            <li class="nav-item">
                                <a href="/profile_admin"
                                    class="nav-link text-white {{ request()->routeIs('profile-admin') ? 'active' : '' }}">
                                    <span class="material-icons-round">person</span>
                                    <span class="sidenav-normal ms-3 ps-1">My Profile</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                {{-- @include('livewire.auth.logout') --}}
                                <livewire:auth.logout>
                            </li>
                        </ul>
                    </div>
                </li>
                <hr class="horizontal light mt-0 mb-2">
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('knowledge-base') ? 'active' : '' }}" href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Knowledge Base</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>