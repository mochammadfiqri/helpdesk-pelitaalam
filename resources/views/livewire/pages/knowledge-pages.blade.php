<div>
    <header class="header-2">
        <div class="page-header min-vh-50 relative" style="background-image: url('./assets/img/bg2.jpg')">
            <span class="mask bg-gradient-primary opacity-4"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 text-center mx-auto">
                        <h1 class="text-white pt-3 mt-n2 pb-4">KNOWLEDGE BASE</h1> 
                        <style>
                            /* Menyesuaikan lebar offcanvas */
                            .offcanvas {
                                max-width: 50%;
                                /* Sesuaikan lebar sesuai kebutuhan Anda */
                            }

                            /* Menyesuaikan tinggi offcanvas */
                            .offcanvas-body {
                                max-height: 50vh;
                                /* Sesuaikan tinggi sesuai kebutuhan Anda */
                                overflow-y: auto;
                            }
                        </style>
                        <a class="btn btn-rounded border mb-0 me-2 p-2 px-3" role="button" wire:model.debounce.150ms="search"
                            style="display: flex; align-items: center; background-color: white;">
                            <i class="fa-solid fa-magnifying-glass fa-xl me-2"></i>
                            <input type="text" class="form-control text-black text-sm" style="background: transparent"
                                placeholder="Whats Your Problem...">
                            <span class="DocSearch-Button-Keys">
                                <kbd class="DocSearch-Button-Key">
                                    <svg width="15" height="15" class="DocSearch-Control-Key-Icon">
                                        <path
                                            d="M4.505 4.496h2M5.505 5.496v5M8.216 4.496l.055 5.993M10 7.5c.333.333.5.667.5 1v2M12.326 4.5v5.996M8.384 4.496c1.674 0 2.116 0 2.116 1.5s-.442 1.5-2.116 1.5M3.205 9.303c-.09.448-.277 1.21-1.241 1.203C1 10.5.5 9.513.5 8V7c0-1.57.5-2.5 1.464-2.494.964.006 1.134.598 1.24 1.342M12.553 10.5h1.953"
                                            stroke-width="1.2" stroke="currentColor" fill="none"
                                            stroke-linecap="square"></path>
                                    </svg>
                                </kbd>
                                <kbd class="DocSearch-Button-Key">K</kbd>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6"> 
        
        <section id="count-stats">
            <div class="container">
                @if ($knowledge_base->count() > 0)
                <div class="row pt-3 pb-4">
                        @foreach ($knowledge_base as $data)
                        <div class="col-4 pb-3">
                            <div class="info">
                                <i class="fa-solid fa-tag fa-lg text-primary"></i> <span class="fs-6">&nbsp;Software</span>
                                <h5 class="font-weight-bolder mt-3">{{ $data->title }}</h5>
                                <p class="pe-5 mb-0">{!! $data->details !!}</p>
                                <i class="fa-solid fa-eye fa-sm "></i><span class="text-sm">&nbsp;{{ $data->views }}</span>
                            </div>
                        </div> 
                        @endforeach
                    </div> 
                @else
                <tr>
                    <td colspan="8">
                        <div class="d-flex justify-content-center">
                            <img src="../assets/img/no-record-file.svg" class="w-40">
                        </div>
                    </td>
                </tr>
                @endif
            </div>
        </section>

        <section>
            <div class="float-end">
                {{ $knowledge_base->links() }}
            </div>
        </section>
        {{-- <section class="my-5 py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0 mt-4">
                        <div class="rotating-card-container">
                            <div class="card card-rotate card-background card-background-mask-primary shadow-primary mt-md-0 mt-5">
                                <div class="front front-background"
                                    style="background-image: url(https://images.unsplash.com/photo-1569683795645-b62e50fbf103?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80); background-size: cover;">
                                    <div class="card-body py-7 text-center">
                                        <i class="material-icons text-white text-4xl my-3">touch_app</i>
                                        <h3 class="text-white">Feel the <br /> Material Kit</h3>
                                        <p class="text-white opacity-8">All the Bootstrap components that you need in a
                                            development have been re-design with the new look.</p>
                                    </div>
                                </div>
                                <div class="back back-background"
                                    style="background-image: url(https://images.unsplash.com/photo-1498889444388-e67ea62c464b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1365&q=80); background-size: cover;">
                                    <div class="card-body pt-7 text-center">
                                        <h3 class="text-white">Discover More</h3>
                                        <p class="text-white opacity-8"> You will save a lot of time going from
                                            prototyping to full-functional code because all elements are implemented.
                                        </p>
                                        <a href=".//sections/page-sections/hero-sections.html" target="_blank"
                                            class="btn btn-white btn-sm w-50 mx-auto mt-3">Start with Headers</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ms-auto">
                        <div class="row justify-content-start">
                            <div class="col-md-6">
                                <div class="info">
                                    <i class="material-icons text-gradient text-primary text-3xl">content_copy</i>
                                    <h5 class="font-weight-bolder mt-3">Full Documentation</h5>
                                    <p class="pe-5">Built by developers for developers. Check the foundation and you
                                        will find everything inside our documentation.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info">
                                    <i class="material-icons text-gradient text-primary text-3xl">flip_to_front</i>
                                    <h5 class="font-weight-bolder mt-3">Bootstrap 5 Ready</h5>
                                    <p class="pe-3">The world’s most popular front-end open source toolkit, featuring
                                        Sass variables and mixins.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-start mt-5">
                            <div class="col-md-6 mt-3">
                                <i class="material-icons text-gradient text-primary text-3xl">price_change</i>
                                <h5 class="font-weight-bolder mt-3">Save Time & Money</h5>
                                <p class="pe-5">Creating your design from scratch with dedicated designers can be very
                                    expensive. Start with our Design System.</p>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="info">
                                    <i class="material-icons text-gradient text-primary text-3xl">devices</i>
                                    <h5 class="font-weight-bolder mt-3">Fully Responsive</h5>
                                    <p class="pe-3">Regardless of the screen size, the website content will naturally
                                        fit the given resolution.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    </div>
    
</div>