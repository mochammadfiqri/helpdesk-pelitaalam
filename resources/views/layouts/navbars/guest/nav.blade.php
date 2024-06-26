<nav
    class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
    <div class="container-fluid px-0">
        <a class="navbar-brand font-weight-bolder ms-sm-3" href="https://http://127.0.0.1:8000/"
            rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
            Helpdesk Pelita Alam
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
            <ul class="navbar-nav navbar-nav-hover ms-auto">

                <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuPages"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-icons opacity-6 me-2 text-md">dashboard</i>
                        Pages
                        <img src="./assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
                    </a>
                    <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3"
                        aria-labelledby="dropdownMenuPages">
                        <div class=" d-lg-block">
                            <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                                Landing Pages
                            </h6>
                            <a href="/" class="dropdown-item border-radius-md">
                                <span>Home</span>
                            </a>
                            <a href="{{ route('ticket-page') }}" class="dropdown-item border-radius-md">
                                <span>Open Ticket</span>
                            </a>
                            <a href="#author" class="dropdown-item border-radius-md">
                                <span>Author</span>
                            </a>
                            <a href="{{ route('knowledge-page') }}" class="dropdown-item border-radius-md">
                                <span>Knowledge</span>
                            </a>
                            <a href="{{ route('chatbot') }}" class="dropdown-item border-radius-md">
                                <span>Chatbot</span>
                            </a>
                            {{-- <a href="{{ route('chatbot') }}" class="dropdown-item border-radius-md">
                                <span>Chatbot</span>
                            </a> --}}
                            <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1 mt-3">
                                Account
                            </h6>
                            @if (auth()->check())
                                <a href="/dashboard" class="dropdown-item border-radius-md">
                                    <span>Dashboard</span>
                                </a>
                            @else
                                <a href="/login" class="dropdown-item border-radius-md">
                                    <span>Sign In</span>
                                </a>    
                            @endif
                        </div> 
                    </div>
                </li>
                <li class="nav-item my-auto ms-3 ms-lg-0">
                    @if (auth()->check())
                        <a href="/dashboard" class="btn btn-sm bg-gradient-primary mb-0 me-1 mt-2 mt-md-0">
                            Dashboard
                        </a>
                    @else
                        <a href="/login" class="btn btn-sm bg-gradient-primary mb-0 me-1 mt-2 mt-md-0">Login</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>