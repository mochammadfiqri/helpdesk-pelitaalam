<div class="row ">
    <div class="col-12 mt-3">
        <div class="card my-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-white text-uppercase ps-3 float-start">
                                E - Ticketing
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="d-flex flex-column justify-content-start mb-2">
                            <x-btn-search style="display: flex; align-items: center;" placeholder="Search Ticket...">
                                @section('icon-x')
                                @if($search)
                                    <i class="fa-solid fa-circle-xmark fa-lg" wire:click="clearSearch"></i>
                                @endif
                                @endsection
                            </x-btn-search>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-8">
                        <div class="d-flex justify-content-between justify-content-sm-end justify-content-lg-end align-items-center ">
                            @if (Auth::user()->roles->contains('id', 1))
                                <a href="{{ route('main_dataset') }}" class="btn btn-rounded bg-gradient-info mx-2 mx-sm-1">
                                    <i class="fa-solid fa-file-lines fa-lg"></i>&nbsp;&nbsp;&nbsp;Dataset
                                </a>
                            @endif
                            @if (!Auth::user()->roles->contains('id', 1) && !Auth::user()->roles->contains('id', 14))
                                <div class="btn-group dropstart">
                                    <button type="button" class="btn btn-rounded btn-outline-secondary float-end dropdown-toggle mx-2 mx-sm-1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-filter fa-xl"></i></i>&nbsp;&nbsp;&nbsp;Filter
                                    </button>
                                    <ul class="dropdown-menu p-2 ">
                                        <li>
                                            <div class="form-check ps-2 ">
                                                <input class="form-check-input" type="checkbox" wire:model="myTickets">
                                                <label class="custom-control-label align-items-center" for="customCheck1">My Tickets</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check ps-2">
                                                <input class="form-check-input" type="checkbox" wire:model="assignTickets">
                                                <label class="custom-control-label" for="customCheck1">Assign Tickets</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                            @if (!Auth::user()->roles->contains('id', 1))
                                <a href="{{ route('create_ticket') }}"
                                    class="btn btn-rounded bg-gradient-info mx-2 mx-sm-1">
                                    <i class="fa-solid fa-plus fa-lg"></i>&nbsp;&nbsp;&nbsp;Create Ticket
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mb-3 mt-1">
                    @include('livewire.e-ticket.tbl-ticket')
                </div>
            </div>
        </div>
    </div>
</div>