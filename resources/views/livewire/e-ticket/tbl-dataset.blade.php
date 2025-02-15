<div class="table-responsive">
    @if ($checkedPost)
    <a class="btn btn-rounded bg-gradient-danger" wire:click='deleteCheckedPost'>
        <i class="fa-solid fa-trash-can fa-fade"></i>&nbsp;&nbsp;&nbsp;Delete ({{ count($checkedPost) }})
    </a>
    @endif
    <table class="table @if($dataset->count() > 0) table-hover @endif align-items-center justify-content-start mb-0">
        <thead>
            <tr>
                <th class="px-0" style="width: 1rem">
                    <div class="form-check p-0 ms-2">
                        <input class="form-check-input" type="checkbox" wire:model="selectAll">
                    </div>
                </th>
                <th>
                    <h6 class="my-auto">Subject</h6>
                </th>
                <th>
                    <h6 class="my-auto">Details</h6>
                </th>
                <th>
                    <h6 class="my-auto">Department</h6>
                </th>
                <th>
                    <h6 class="my-auto">Priority</h6>
                </th>
                <th>
                    <h6 class="my-auto">Category</h6>
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($dataset->count() > 0)
                @foreach ($dataset as $data)
                {{-- <tr wire:click="editDataset('{{ $data->id }}')" style="cursor: pointer;"> --}}
                <tr>
                    <td>
                        <div class="form-check p-0 mx-auto">
                            <input class="form-check-input" type="checkbox" value="{{ $data->id }}"
                                wire:key='{{ $data->id }}' wire:model="checkedPost" onclick="stopPropagation(event)">
                        </div>
                    </td>
                    <td>
                        <div class="my-auto px-3 mb-0 ">
                            {{ $data->subject }}
                        </div>
                    </td>
                    <td data-bs-toggle="tooltip" data-bs-placement="top" data-container="body" data-animation="true" title="{{ $data->details }}">
                        <div class="my-auto px-3 mb-0 ">
                            {{ Str::limit(htmlspecialchars_decode($data->details), 50) }}
                        </div>
                    </td>
                    <td>
                        <div class="my-auto px-3 mb-0 ">
                            {{ $data->department->name }}
                        </div>
                    </td>
                    <td>
                        <div class="my-auto px-3 mb-0 ">
                            {{ $data->priority->name }}
                        </div>
                    </td>
                    <td>
                        <div class="my-auto px-3 mb-0 ">
                            {{ $data->category->name }}
                        </div>
                    </td>
                </tr>
                @endforeach
            @else
            <tr>
                <td colspan="7">
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
</div>