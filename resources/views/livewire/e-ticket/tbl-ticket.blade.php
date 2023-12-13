<div class="table-responsive">
    {{-- @if ($checkedPost)
    <a class="btn btn-rounded bg-gradient-danger" wire:click='deleteCheckedPost'>
        <i class="fa-solid fa-trash-can fa-fade"></i>&nbsp;&nbsp;&nbsp;Delete ({{ count($checkedPost) }})
    </a>
    @endif --}}
    <table class="table @if($tickets->count() > 0) table-hover @endif align-items-center justify-content-start mb-0">
        <thead>
            <tr>
                {{-- <th class="px-0" style="width: 1rem">
                    <div class="form-check p-0 ms-2">
                        <input class="form-check-input" type="checkbox" wire:model="selectAll">
                    </div>
                </th> --}}
                <th>
                    <h6 class="my-auto">Key</h6>
                </th>
                <th>
                    <h6 class="my-auto">Subject</h6>
                </th>
                <th>
                    <h6 class="my-auto">Priority</h6>
                </th>
                <th>
                    <h6 class="my-auto">Status</h6>
                </th>
                <th>
                    <h6 class="my-auto">Date</h6>
                </th>
                <th>
                    <h6 class="my-auto">Updated</h6>
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($tickets->count() > 0)
            @foreach ($tickets as $data)
            <tr wire:click="editTicket('{{ $data->ticket_key }}')" style="cursor: pointer;">
                {{-- <td>
                    <div class="form-check p-0 mx-auto">
                        <input class="form-check-input" type="checkbox" value="{{ $data->id }}"
                            wire:key='{{ $data->id }}' wire:model="checkedPost" onclick="stopPropagation(event)">
                    </div>
                </td> --}}
                <td>
                    <div class="my-auto px-3 mb-0 ">
                        <p class="text-sm text-start text-bold mb-0">{{ $data->ticket_key }}</p>
                    </div>
                </td>
                <td> 
                    <div class="my-auto px-3 mb-0 ">
                        <p class="text-sm text-start text-bold mb-0">{{ $data->subject }}</p>
                        <p class="text-xs text-secondary text-start mb-0">{{ $data->category->name }}</p>
                    </div>
                </td>
                <td>
                    <div class="my-auto px-3 mb-0 ">
                        <p class="text-sm text-start text-bold mb-0">{{ $data->priority->name }}</p>
                    </div>
                </td> 
                <td>
                    <div class="my-auto px-3 mb-0 ">
                        <p class="text-sm text-start text-bold mb-0">{{ $data->status->name }}</p>
                    </div>
                </td>
                <td>
                    <div class="my-auto px-3 mb-0 ">
                        <p class="text-sm text-start text-bold mb-0">{{ $data->created_at->diffForHumans() }}</p>
                    </div>
                </td>
                <td>
                    <div class="my-auto px-3 mb-0 ">
                        <p class="text-sm text-start text-bold mb-0">{{ $data->updated_at->diffForHumans() }}</p>
                    </div>
                </td> 
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6">
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
    <div class="float-end me-3 mt-3">
        {{ $tickets->links() }}
    </div>
</div>