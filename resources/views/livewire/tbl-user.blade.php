<div>
    <table class="table align-items-center mb-0">
        <thead>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-2">
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
            @foreach ($users as $data)
            <tr>
                <td class="text-center ">
                    <span class="text-secondary text-xs font-weight-bold text-center">{{ $loop->iteration }}</span>
                </td>
                <td class="text-center ">
                    @if ($data->foto !== null)
                        <img src="{{ asset('storage/'.$data->foto) }}" class="avatar avatar-sm">
                    @else
                        <img src="{{ asset('assets') }}/img/user.png" class="avatar avatar-sm">
                    @endif
                    {{-- <span class="text-secondary text-xs font-weight-bold text-center">Foto</span> --}}
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
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"> </span>
                </td>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"> </span>
                </td>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"> </span>
                </td>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">Tidak ada data yang ditemukan</span>
                </td>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"> </span>
                </td>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"> </span>
                </td>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"> </span>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
    <div class="float-end me-3">
        {{ $users->links() }}
    </div>
</div>