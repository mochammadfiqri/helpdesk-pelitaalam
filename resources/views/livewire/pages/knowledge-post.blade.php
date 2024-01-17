<div>
    <header class="header-2">
        <div class="page-header min-vh-70 relative" style="background-image: url('./assets/img/bg2.jpg')">
            <span class="mask bg-gradient-primary opacity-4"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 text-center mx-auto">
                        <h1 class="text-white pt-3 mt-n2 pb-4">{{ $knowledge_base->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">

        <section class=" py-5">
            <div class="container">
                <div class="row align-items-start">
                    <div class="col-lg-6 ms-auto">
                        <div class="row justify-content-start">
                            <div class="col-md-12">
                                <div class="info">
                                    <i class="fa-solid fa-tag fa-xl text-primary"></i> 
                                    @foreach ($knowledge_base->categories as $category)
                                        <span class="fs-5">&nbsp;{{ $category->name }},</span>
                                    @endforeach
                                    {{-- <i class="material-icons text-gradient text-primary text-3xl">content_copy</i> --}}
                                    {{-- <h5 class="font-weight-bolder mt-3">Full Documentation</h5> --}}
                                    <p class="pe-5 text-justify">{!! $knowledge_base->details !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0 mt-4">
                        <h5 class="font-weight-bolder mt-3">Latest Post</h5>
                        @if ($kb_post->count() > 0)
                            @foreach ($kb_post as $data)
                            <div class="pb-2" style="cursor: pointer;">
                                <a wire:click="viewPost('{{ $data->slug }}')" class="text-decoration-none " style="color: #495057;">
                                    <div class="card card-label card-body blur shadow-blur border-1 ">
                                        <div class="justify-content-between">
                                            <i class="fa-solid fa-tag fa-lg text-primary"></i> 
                                            @foreach ($data->categories as $category)
                                                <span class="fs-6">&nbsp;{{ $category->name }},</span>
                                            @endforeach
                                            <h5 class="font-weight-bolder mt-3">{{ $data->title }}</h5>
                                        </div>
                                        <p class="pe-5 mb-3 text-truncate" style="max-width: 100%; overflow: hidden; text-overflow: ellipsis;">
                                            {{ strip_tags($data->details) }}
                                        </p>
                                        <div class="justify-content-between">
                                            <i class="fa-solid fa-eye fa-sm "></i>
                                            <span class="text-sm">&nbsp;{{ $data->views }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        @endif
                    </div>
                    
                </div>
            </div>
        </section>
    </div>

</div>