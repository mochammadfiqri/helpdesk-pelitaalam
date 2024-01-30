<div class="row ">
    <div class="col-12 mt-3">
        <div class="card my-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-white text-uppercase ps-3 float-start">
                                Priorities
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mt-3">
                    {{-- @foreach ($priority as $data)
                    <a href="#" class="text-decoration-none " style="color: #495057;">
                        <div class="card card-label border-2 ">
                            <div class="d-flex p-3 ">
                                <div class="d-flex align-items-center">
                                    <div class="bg-gradient-faded-info p-2 py-0 text-center text-sm text-white">
                                        {{ $data->id }}
                                    </div>
                                    <div class="ms-3 text-sm">
                                        {{ $data->name }}
                                    </div>
                                </div>
                            </div>
                         </div>
                    </a>
                    @endforeach --}}
                    <div class="table-responsive">
                        <table class="table align-items-center justify-content-start mb-0">
                            <thead>
                                <tr>
                                    <th class="text-xxs text-center font-weight-bolder opacity-7 px-0" style="width: 1rem"> </th>
                                    <th class="text-center" style="width: 1rem">
                                        <h6 class="my-auto">Priority</h6>
                                    </th>
                                    <th style="width: 1rem">
                                        <h6 class="my-auto">Response Time</h6>
                                    </th>
                                    <th style="width: 1rem">
                                        <h6 class="my-auto">Resolve Time</h6>
                                    </th>
                                    <th class="text-xxs text-center font-weight-bolder opacity-7 px-0"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($priority as $data)
                                    <tr style="cursor: pointer;">
                                        <td>
                                            <div class="d-flex p-3 ">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-gradient-faded-info p-2 py-0 text-center text-sm text-white">
                                                        {{ $data->id }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="my-auto px-3 mb-0 ">
                                                {{ $data->name }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="my-auto px-3 mb-0 ">
                                                {{ $data->response_time }} Hours
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="my-auto px-3 mb-0 ">
                                                {{ $data->resolve_time }} Day
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <p> </p>
                                        </td>
                                    </tr>
                                @endforeach
                                <script>
                                    function stopPropagation(event) {
                                        // Mencegah propagasi event ke atas ke elemen <tr>
                                        event.stopPropagation();
                                    }
                                </script>
                            </tbody>
                        </table>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>