<div>
    {{-- {{ var_export($checkedUser) }} --}}
    @if ($checkedUser)
        <div class="d-flex ps-4">
            <a class="btn btn-rounded bg-gradient-danger" wire:click='deleteCheckedUser'>
                <i class="fa-solid fa-trash-can fa-fade"></i>&nbsp;&nbsp;&nbsp;Selected User ({{ count($checkedUser) }})
            </a>
        </div>
    @endif
    <table class="table align-items-center mb-0">
        <thead>
            <th class="text-start px-0">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" wire:model="selectAll">
                </div>
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-0">
                No.</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-0">
                Foto</th>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-2">
                Nama</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                No.Hp</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Domisili</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Alamat</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Aksi</th>
        </thead>
        <tbody>
            @if ($users->count() > 0)
            @foreach ($users as $value => $data)
            <tr>
                <td class="text-start align-content-center px-0">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $data->id }}" wire:key='{{ $data->id }}' wire:model="checkedUser">
                    </div>
                </td>
                <td class="text-center ">
                    <span class="text-secondary text-xs font-weight-bold text-center">{{ $users->firstItem() + $value }}</span>
                </td>
                <td class="text-center ">
                    @if ($data->foto !== null)
                        <img src="{{ asset('storage/'.$data->foto) }}" class="avatar avatar-sm">
                    @else
                        <img src="{{ asset('assets') }}/img/user.png" class="avatar avatar-sm">
                    @endif
                </td>
                <td class="text-center">
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm text-start mb-0">{{ $data->nama }}</h6>
                        <p class="text-xs text-secondary text-start mb-0">{{ $data->email }}</p>
                    </div>
                </td>
                <td class="text-center">
                    <span class="text-secondary text-xs font-weight-bold text-center">{{ $data->no_hp }}</span>
                </td>
                <td class="text-center">
                    <span class="text-secondary text-xs font-weight-bold text-center">{{ $data->domisili }}</span>
                </td>
                <td class="text-center">
                    <span class="text-secondary text-xs font-weight-bold text-center">{{ $data->alamat }}</span>
                </td>
                <td class="text-center">
                    <style>
                        /* Menyembunyikan tanda dropdown */
                        .dropdown-toggle::after {
                            content: none !important;
                        }

                        /* Penanganan Z-Index */
                        .dropdown {
                            position: relative;
                            z-index: 1000;
                        }

                        /* Hindari elemen anak dropdown tertutup oleh overflow tabel */
                        /* .table-responsive {
                                overflow: visible;
                                } */
                    </style>
                    <div class="btn-group dropstart">
                        <button type="button" class="btn btn-link text-secondary mb-0 dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="material-icons">more_vert</span>
                        </button>
                        <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item border-radius-md" data-bs-toggle="modal"
                                    data-bs-target="#editUser" wire:click='editUser({{ $data->id }})'>Edit
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item border-radius-md" data-bs-toggle="modal"
                                    data-bs-target="#deleteUser" wire:click='deleteUser({{ $data->id }})'>
                                    Hapus
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="8" >
                    <div class="d-flex justify-content-center">
                        <img src="../assets/img/no-record-file.svg" class="w-40">
                    </div>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
    <div class="float-end me-3">
        {{ $users->links() }}
    </div>
</div>