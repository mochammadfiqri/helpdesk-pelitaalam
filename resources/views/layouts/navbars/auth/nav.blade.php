<nav class="navbar navbar-main navbar-expand-lg position-sticky mt-0 top-1 px-0 mx-4 border-radius-xl z-index-sticky shadow-none"
    id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ (str_replace(['-', '/'], [' ', ' / '], Request::path())) }}</li>
            </ol>
            @php
                $path = Request::path();
                $segments = explode('/', $path);
                $lastSegment = end($segments);
            @endphp
            <h6 class="font-weight-bolder mb-0">{{ ucwords(str_replace('-', ' ', $lastSegment)) }}</h6>
        </nav>
        <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
            <a href="javascript:;" class="nav-link p-0 text-body">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
            </a>
        </div>
        <div class="collapse navbar-collapse justify-content-end mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a class="btn btn-outline-success btn-sm mb-0 me-3" target="_blank" href="#">Online</a>
                </li>
                <li class="nav-item d-xl-none ps-3 me-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                @if (Auth::user()->role_id == 1)
                    <livewire:plugins.notification>
                @endif
            </ul>
        </div>
    </div>
</nav>