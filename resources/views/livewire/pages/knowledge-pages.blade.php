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
                                placeholder="Knowledge Search...">
                            {{-- <span class="DocSearch-Button-Keys">
                                <kbd class="DocSearch-Button-Key">
                                    <svg width="15" height="15" class="DocSearch-Control-Key-Icon">
                                        <path
                                            d="M4.505 4.496h2M5.505 5.496v5M8.216 4.496l.055 5.993M10 7.5c.333.333.5.667.5 1v2M12.326 4.5v5.996M8.384 4.496c1.674 0 2.116 0 2.116 1.5s-.442 1.5-2.116 1.5M3.205 9.303c-.09.448-.277 1.21-1.241 1.203C1 10.5.5 9.513.5 8V7c0-1.57.5-2.5 1.464-2.494.964.006 1.134.598 1.24 1.342M12.553 10.5h1.953"
                                            stroke-width="1.2" stroke="currentColor" fill="none"
                                            stroke-linecap="square"></path>
                                    </svg>
                                </kbd>
                                <kbd class="DocSearch-Button-Key">K</kbd>
                            </span> --}}
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
                        <div class="col-4 pb-3" style="cursor: pointer;">
                            <a wire:click="viewPost('{{ $data->slug }}')" class="text-decoration-none " style="color: #495057;">
                            <div class="card card-label card-body blur shadow-blur border-1 ">
                                <i class="fa-solid fa-tag fa-lg text-primary"></i> <span class="fs-6">&nbsp;{{ $data->category->name }}</span>
                                    <h5 class="font-weight-bolder mt-3">{{ $data->title }}</h5>
                                    <p class="pe-5 mb-3 text-truncate" style="max-width: 100%; overflow: hidden; text-overflow: ellipsis;">
                                        {{ strip_tags($data->details) }}
                                    </p>
                                    <i class="fa-solid fa-eye fa-sm "></i><span class="text-sm">&nbsp;{{ $data->views }}</span>
                                </a>
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
    </div>
    
</div>