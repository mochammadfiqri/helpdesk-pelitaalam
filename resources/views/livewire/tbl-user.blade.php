<div>
    {{-- {{ var_export($checkedUser) }} --}}
    @if ($checkedUser)
        <div class="d-flex ps-4">
            <a class="btn btn-rounded bg-gradient-danger" wire:click='deleteCheckedUser'>
                <i class="fa-solid fa-trash-can fa-fade"></i>&nbsp;&nbsp;&nbsp;Selected User ({{ count($checkedUser) }})
            </a>
        </div>
    @endif
    <table class="table @if($users->count() > 0) table-hover @endif align-items-center justify-content-start mb-0">
        <thead>
            <th class="px-auto ps-3" style="width: 1rem">
                <div class="form-check p-0 ms-2">
                    <input class="form-check-input" type="checkbox" wire:model="selectAll">
                </div>
            </th>
            <th class="px-auto" style="width: 3rem">
                <h6 class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 my-auto">No.</h6>
            </th>
            <th class="px-auto" style="width: 3rem">
                <h6 class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 my-auto">Foto</h6>
            </th>
            <th>
                <h6 class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 my-auto">Nama</h6>
            </th>
            <th>
                <h6 class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 my-auto">No. HP</h6>
            </th>
        </thead>
        <tbody>
            @if ($users->count() > 0)
            @foreach ($users as $value => $data)
            <tr wire:click="editUser('{{ $data->id }}')" style="cursor: pointer;">
                <td>
                    <div class="form-check p-0 ps-3 mx-auto">
                        <input class="form-check-input" type="checkbox" value="{{ $data->id }}" wire:key='{{ $data->id }}' wire:model="checkedUser" onclick="stopPropagation(event)">
                    </div>
                </td>
                <td>
                    <div class="my-auto px-3 mb-0 ">
                        <span class="text-secondary text-xs font-weight-bold">{{ $users->firstItem() + $value }}</span>
                    </div>
                </td>
                <td>
                    <div class="my-auto px-3 mb-0 ">
                        @if ($data->foto !== null)
                            <img src="{{ asset('storage/'.$data->foto) }}" class="avatar avatar-sm">
                        @else
                            <img src="https://ui-avatars.com/api/?background=random&bold=true&name={{ $data->nama }}" class="avatar avatar-sm">
                        @endif
                    </div>
                </td>
                <td>
                    <div class="my-auto px-3 mb-0">
                        <h6 class="text-sm mb-0">{{ $data->nama }}</h6>
                        <p class="text-xs text-secondary mb-0">{{ $data->email }}</p>
                    </div>
                </td>
                <td>
                    <div class="my-auto px-3 mb-0">
                        <span class="text-secondary text-xs font-weight-bold">{{ $data->no_hp }}</span>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5" >
                    <div class="d-flex justify-content-center">
                        <img src="../assets/img/no-record-file.svg" class="w-40">
                    </div>
                </td>
            </tr>
            @endif
            <script>
                function stopPropagation(event) {
                    // Mencegah propagasi event ke atas ke elemen <tr>
                    event.stopPropagation();
                }
            </script>
        </tbody>
    </table>
    <div class="float-end me-3">
        {{ $users->links() }}
    </div>
</div>