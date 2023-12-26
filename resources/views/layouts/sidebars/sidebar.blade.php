<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/" >
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
        <ul class="navbar-nav mb-2">
            @if (Auth::user()->role_id == 1)
                <li class="nav-item mb-2 mt-0">
                    <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white" aria-controls="ProfileNav" role="button"
                        aria-expanded="false">
                        <img src="https://ui-avatars.com/api/?background=random&bold=true&name={{ Auth::user()->nama }}" class="avatar">
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
                    <a class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active bg-gradient-primary' : '' }}" href="{{ route('dashboard') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-cube fa-xl"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('main_knowledge') ? 'active bg-gradient-primary' : '' }}"
                        href="{{ route('main_knowledge') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-graduation-cap fa-xl"></i>
                        </div>
                        <span class="nav-link-text px-1">Knowledge Base</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-regular fa-comment-dots fa-xl"></i>
                        </div>
                        <span class="nav-link-text px-1">Chatbot</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-clipboard-question fa-xl"></i>
                        </div>
                        <span class="nav-link-text px-1">FAQs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ (request()->routeIs('main_ticket') || request()->routeIs('main_dataset') || request()->routeIs('edit_ticket') || request()->routeIs('create_ticket')) ? 'active bg-gradient-primary' : '' }}"
                        href="{{ route('main_ticket') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-ticket fa-xl"></i>
                        </div>
                        <span class="nav-link-text px-1">Tickets</span>
                    </a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('users') ? 'active bg-gradient-primary' : '' }}" href="{{ route('users') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-user fa-xl"></i>
                        </div>
                        <span class="nav-link-text px-1">Manage Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#settings" class="nav-link text-white {{ request()->is('settings') ? 'active' : '' }}" aria-controls="ProfileNav" role="button"
                        aria-expanded="false">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-screwdriver-wrench fa-xl"></i>
                        </div>
                        <span class="nav-link-text px-1">Settings</span>
                    </a>
                    <div class="collapse" id="settings" >
                        <ul class="nav ">
                            <li class="nav-item">
                                <a class="nav-link text-white {{ request()->routeIs('global_setting') ? 'active bg-gradient-primary' : '' }}"
                                    href="{{ route('global_setting') }}">
                                    <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-globe fa-sm"></i>
                                        <span class="nav-link-text text-sm ms-2">Global</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white {{ request()->routeIs('category') ? 'active bg-gradient-primary' : '' }}" href="{{ route('category') }}">
                                    <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-layer-group fa-sm"></i>
                                        <span class="nav-link-text text-sm ms-2">Categories</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white {{ request()->routeIs('department') ? 'active bg-gradient-primary' : '' }}" href="{{ route('department') }}">
                                    <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                                        <i class="fa-regular fa-building fa-sm"></i>
                                        <span class="nav-link-text text-sm ms-2">Department</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="#">
                                    <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-tags fa-sm"></i>
                                        <span class="nav-link-text text-sm ms-2">Tags</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ request()->routeIs('types') ? 'active bg-gradient-primary' : '' }}"
                                    href="{{ route('types') }}">
                                    <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-tag fa-sm"></i>
                                    </div>
                                    <span class="nav-link-text ms-2">Types</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ request()->routeIs('priority') ? 'active bg-gradient-primary' : '' }}"
                                    href="{{ route('priority') }}">
                                    <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-check-to-slot fa-sm"></i>
                                        <span class="nav-link-text text-sm ms-2">Priorities</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ request()->routeIs('status') ? 'active bg-gradient-primary' : '' }}"
                                    href="{{ route('status') }}">
                                    <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-list-check fa-sm"></i>
                                        <span class="nav-link-text text-sm ms-2">Statuses</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#front_pages"
                        class="nav-link text-white {{ request()->is('front_pages') ? 'active' : '' }}" aria-controls="front_pages"
                        role="button" aria-expanded="false">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-gear fa-xl"></i>
                        </div>
                        <span class="nav-link-text ms-1">Front Pages</span>
                    </a>
                    <div class="collapse" id="front_pages">
                        <ul class="nav ">
                            <li class="nav-item">
                                <a class="nav-link text-white "
                                    href="#">
                                    <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                                        <i class="fa-regular fa-file fa-sm"></i>
                                        <span class="nav-link-text text-sm ms-2">Home</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="#">
                                    <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                                        <i class="fa-regular fa-file fa-sm"></i>
                                        <span class="nav-link-text text-sm ms-2">Contact</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @elseif (Auth::user()->role_id == 2)
                <li class="nav-item mb-2 mt-0">
                    <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white" aria-controls="ProfileNav" role="button"
                        aria-expanded="false">
                        <img src="https://ui-avatars.com/api/?background=random&bold=true&name={{ Auth::user()->nama }}" class="avatar">
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
                    <a class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active bg-gradient-primary' : '' }}"
                        href="{{ route('dashboard') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-cube fa-xl"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('main_ticket') || request()->routeIs('create_ticket') || request()->routeIs('edit_ticket') ? 'active bg-gradient-primary' : '' }}"
                        href="{{ route('main_ticket') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-ticket fa-xl"></i>
                        </div>
                        <span class="nav-link-text px-1">Tickets</span>
                    </a>
                </li>
            @elseif (in_array(Auth::user()->role_id, [3, 4, 5, 6]))
                <li class="nav-item mb-2 mt-0">
                    <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white" aria-controls="ProfileNav" role="button"
                        aria-expanded="false">
                        <img src="https://ui-avatars.com/api/?background=random&bold=true&name={{ Auth::user()->nama }}" class="avatar">
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
                    <a class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active bg-gradient-primary' : '' }}"
                        href="{{ route('dashboard') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-cube fa-xl"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('main_ticket') || request()->routeIs('create_ticket') || request()->routeIs('edit_ticket') ? 'active bg-gradient-primary' : '' }}"
                        href="{{ route('main_ticket') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-ticket fa-xl"></i>
                        </div>
                        <span class="nav-link-text px-1">Tickets</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('main_knowledge') || request()->routeIs('create_knowledge') || request()->routeIs('edit_knowledge') ? 'active bg-gradient-primary' : '' }}"
                        href="{{ route('main_knowledge') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-graduation-cap fa-xl"></i>
                        </div>
                        <span class="nav-link-text px-1">Knowledge Base</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>