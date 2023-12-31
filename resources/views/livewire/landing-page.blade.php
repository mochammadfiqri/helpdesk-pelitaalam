<div>
    {{-- search Modal --}}
    <livewire:pages.knowledge-search>

    <header class="header-2">
        <div class="page-header min-vh-100 relative" style="background-image: url('./assets/img/bg2.jpg')">
            <span class="mask bg-gradient-primary opacity-4"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 text-center mx-auto">
                        <h1 class="text-white pt-3 ">SISTEM MANAJEMEN TI PELITA ALAM</h1>
                        <p class="lead text-white mt-3 mb-5">Melangkah bersama inovasi, Sistem Manajemen TI Pelita Alam menjadi pilar kemajuan teknologi yang berkelanjutan.
                        Menyinari setiap langkah dengan cahaya keberlanjutan dan efisiensi. </p>
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
                        <a class="btn btn-rounded border mb-0 me-2 p-2 px-3" data-bs-toggle="modal" data-bs-target="#searchModal" role="button" style="display: flex; align-items: center; background-color: white;" >
                            <i class="fa-solid fa-magnifying-glass fa-xl me-2"></i>
                                <input type="text" class="form-control text-black text-sm" style="background: transparent" placeholder="Knowledge Search..." readonly>
                            <span class="DocSearch-Button-Keys">
                                <kbd class="DocSearch-Button-Key">
                                    <svg width="15" height="15" class="DocSearch-Control-Key-Icon">
                                        <path
                                            d="M4.505 4.496h2M5.505 5.496v5M8.216 4.496l.055 5.993M10 7.5c.333.333.5.667.5 1v2M12.326 4.5v5.996M8.384 4.496c1.674 0 2.116 0 2.116 1.5s-.442 1.5-2.116 1.5M3.205 9.303c-.09.448-.277 1.21-1.241 1.203C1 10.5.5 9.513.5 8V7c0-1.57.5-2.5 1.464-2.494.964.006 1.134.598 1.24 1.342M12.553 10.5h1.953"
                                            stroke-width="1.2" stroke="currentColor" fill="none" stroke-linecap="square"></path>
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
        <section class="pt-3 pb-4" id="count-stats">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 mx-auto py-3">
                        <div class="row">
                            <div class="col-md-4 position-relative">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-primary"><span id="state1" countTo="{{ $ticketCount }}">{{ $ticketCount }}</span>+</h1>
                                    <h5 class="mt-3">Tickets</h5>
                                    <p class="text-sm font-weight-normal">Tiket baru, tiket pending, tiket proses,
                                        tiket selesai.
                                    </p>
                                </div>
                                <hr class="vertical dark">
                            </div>
                            <div class="col-md-4 position-relative">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-primary"> <span id="state2" countTo="{{ $knowledgeCount }}">{{ $knowledgeCount }}</span>+
                                    </h1>
                                    <h5 class="mt-3">Knowledge</h5>
                                    <p class="text-sm font-weight-normal">Knowledge Base adalah sebuah postingan yang berisi postingan
                                        mengenai tutorial-tutorial
                                    </p>
                                </div>
                                <hr class="vertical dark">
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-primary" id="state3" countTo="{{ $datasetCount }}">{{ $datasetCount }}</h1>
                                    <h5 class="mt-3">Dataset</h5>
                                    <p class="text-sm font-weight-normal">Dataset adalah hasil generate tiket yang di import menjadi
                                        data-data dari, yang di gunakan untuk basic data metode naive bayes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <!-- ======= Author Section ======= -->
        <section id="author" class="author" class="my-5 py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0 mt-4">
                        <div class="rotating-card-container">
                            <div class="card card-rotate card-background card-background-mask-primary shadow-primary mt-md-0 mt-5">
                                <div class="front front-background"
                                    style="background-image: url(https://images.unsplash.com/photo-1569683795645-b62e50fbf103?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80); background-size: cover;">
                                    <div class="card-body py-7 text-center">
                                        {{-- <i class="material-icons text-white text-4xl my-3">touch_app</i> --}}
                                        <img src="https://ui-avatars.com/api/?background=random&bold=true&name=Fiqri"
                                            alt="img-blur-shadow" class="avatar avatar-xxl align-self-center">
                                        <h3 class="text-white pt-2">Mochammad Fiqri A</h3>
                                        <p class="text-white opacity-8">IT Specialist</p>
                                    </div>
                                </div>
                                <div class="back back-background"
                                    style="background-image: url(https://images.unsplash.com/photo-1498889444388-e67ea62c464b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1365&q=80); background-size: cover;">
                                    <div class="card-body pt-7 text-center">
                                        <h3 class="text-white">Describe Me</h3>
                                        <p class="text-white opacity-8 text-justify"> Menempatkan diri saya sebagai seorang
                                        profesional IT yang berkualitas tinggi
                                        dengan keahlian dalam memperbaiki
                                        komputer, instalasi jaringan, dan
                                        pengetahuan dasar tentang
                                        pengembangan menggunakan
                                        framework Laravel.
                                        </p>
                                        <a href="mailto:fiqri177@gmail.com" target="_blank"
                                            class="btn btn-white btn-sm w-50 mx-auto mt-3">Contact Me</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ms-auto">
                        <div class="row justify-content-start">
                            <div class="col-md-12">
                                <div class="info">
                                    {{-- <i class="fa-solid fa-user fa-2xl" style="color: #e91e63"></i> --}}
                                    <h5 class="font-weight-bolder mt-3">Personal Data</h5>
                                    <div class="d-flex">
                                        <div class="p-0 w-15">
                                            <h6>Nama </h6>
                                        </div>
                                        <div class="p-0">
                                            <h6>:</h6>
                                        </div>
                                        <div class="ps-3">
                                            <p class="pe-5">Mochammad Fiqri A</p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="p-0 w-15">
                                            <h6>Email</h6>
                                        </div>
                                        <div class="p-0">
                                            <h6>:</h6>
                                        </div>
                                        <div class="ps-3">
                                            <p class="pe-5">Fiqri177@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-start">
                            <div class="col-md-12 mt-2">
                                <h5 class="font-weight-bolder mt-3">About Me</h5>
                                <div class="d-flex text-justify">
                                    <p class="pe-5">Menempatkan diri saya sebagai seorang
                                    profesional IT yang berkualitas tinggi
                                    dengan keahlian dalam memperbaiki
                                    komputer, instalasi jaringan, dan
                                    pengetahuan dasar tentang
                                    pengembangan menggunakan
                                    framework Laravel.
                                    Saya bertujuan untuk menerapkan
                                    keahlian saya dalam memecahkan
                                    masalah IT dengan efisiensi tinggi,
                                    mengoptimalkan kinerja sistem, dan
                                    memberikan solusi yang inovatif untuk
                                    mendukung keberhasilan perusahaan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-start">
                            <div class="col-md-12 mt-2">
                                <h5 class="font-weight-bolder mt-3">Contact</h5>
                                <div class="d-flex">
                                    <div style="width: 20px">
                                        <i class="fa-brands fa-github fa-xl"></i>
                                    </div>
                                    <div class="ps-3">
                                        <p class="pe-5">
                                        <a href="https://github.com/mochammadfiqri">Github</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Us Section -->

    </div>
</div>