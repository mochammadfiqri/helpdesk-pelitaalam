<div class="row ">
    <div class="col-12 mt-3">
        <div class="card my-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-white text-uppercase ps-3 float-start">
                                Statuses
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mt-3">
                    @foreach ($status as $data)
                        <a href="#" class="text-decoration-none " style="color: #495057;">
                            <div class="card card-label border-2 ">
                                <div class="d-flex p-3 align-content-center text-sm">
                                    {{ $data->name }}
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>