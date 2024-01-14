<div class="row ">
    {{-- <livewire:modal-user> --}}
    {{-- @include('livewire.modal-user') --}}
    @include('livewire.import-users')
    <div class="col-12 mt-3">
        <div class="card my-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-white text-uppercase ps-3 float-start">
                                Daftar Pengguna
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="d-flex flex-column justify-content-start mb-2">
                            <x-btn-search style="display: flex; align-items: center;" placeholder="Cari Pengguna...">
                                @section('icon-x')
                                    @if($search)
                                        <i class="fa-solid fa-circle-xmark fa-lg" wire:click="clearSearch"></i>
                                    @endif
                                @endsection
                            </x-btn-search>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-8">
                        <div class="d-flex justify-content-end align-items-center ">
                            
                            <a class="btn btn-rounded btn-outline-secondary" data-bs-toggle="collapse" href="#filter" role="button" aria-expanded="false" aria-controls="filter">
                                <i class="fa-solid fa-filter fa-lg "></i>&nbsp;&nbsp;&nbsp;Filter
                            </a>
                            
                            <a class="btn btn-rounded bg-gradient-info mx-2 mx-sm-1" data-bs-toggle="modal" data-bs-target="#importUsers">
                                <i class="fa-solid fa-upload "></i>&nbsp;&nbsp;&nbsp;Import Users
                            </a>
                            {{-- <a class="btn btn-rounded bg-gradient-info" data-bs-toggle="modal" data-bs-target="#addUser">
                                <i class="fa-solid fa-user-plus fa-lg"></i>&nbsp;&nbsp;&nbsp;Add Users
                            </a> --}}
                            
                            <a href="{{ route('create.user') }}" class="btn btn-rounded bg-gradient-info mx-2 mx-sm-1">
                                <i class="fa-solid fa-user-plus fa-lg"></i>&nbsp;&nbsp;&nbsp;Add Users
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12">
                        {{-- {{ var_export($filter) }} --}}
                        <div wire:ignore class="collapse" id="filter">
                            <div class="row">
                                <div class="col-12">
                                    <select class="js-example-basic-multiple" id="select2-roleFilter" data-placeholder="Pilih Role" multiple>
                                        <option value="">Pilih Role</option>
                                        @foreach ($role as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    
                                    @push('select2-roleFilter')    
                                        <script>
                                            $(document).ready(function() {
                                                $('#select2-roleFilter').select2({
                                                    theme: "bootstrap-5",
                                                    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                                                    placeholder: $( this ).data( 'placeholder' ),
                                                    closeOnSelect: false,
                                                });
                                                $('#select2-roleFilter').on('change', function(e){
                                                    var data = $(this).val(); // gunakan $(this) untuk merujuk ke elemen saat ini
                                                    @this.set('filter', data);
                                                });
                                            });
                                        </script>
                                    @endpush
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="card-body px-0 pb-2 pt-0">
                <div class="table-responsive p-0">
                    @include('livewire.tbl-user')
                    {{-- @livewire('tbl-user') --}}
                </div>
            </div>
        </div>
    </div>
</div>