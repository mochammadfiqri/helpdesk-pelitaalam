<div class="table-responsive">
    {{-- {{ var_export($checkedPost) }} --}}
    @if ($checkedPost)
        <a class="btn btn-rounded bg-gradient-danger" wire:click='deleteCheckedPost'>
            <i class="fa-solid fa-trash-can fa-fade"></i>&nbsp;&nbsp;&nbsp;Delete ({{ count($checkedPost) }})
        </a>
    @endif
    <table class="table @if($knowledge_base->count() > 0) table-hover @endif align-items-center justify-content-start mb-0">
        <thead>
            <tr> 
                @if (Auth::user()->roles->contains('id', 1))
                <th class="px-0" style="width: 1rem">
                    <div class="form-check p-0 ms-2">
                        <input class="form-check-input" type="checkbox" wire:model="selectAll">
                    </div>
                </th>
                @endif
                <th>
                    <h6 class="my-auto">Title</h6>
                </th>
                <th>
                    <h6 class="my-auto">Category</h6>
                </th>
                <th class="text-xxs font-weight-bolder opacity-7"> </th>
            </tr>
        </thead>
        <tbody>
            @if ($knowledge_base->count() > 0)
            @foreach ($knowledge_base as $data)
            <tr wire:click="editKnowledge('{{ $data->slug }}')" style="cursor: pointer;">
                @if (Auth::user()->roles->contains('id', 1))
                <td>
                    <div class="form-check p-0 mx-auto">
                        <input class="form-check-input" type="checkbox" value="{{ $data->id }}" wire:key='{{ $data->id }}'
                            wire:model="checkedPost" onclick="stopPropagation(event)">
                    </div>
                </td>
                @endif
                <td>
                    <div class="my-auto px-3 mb-0 ">
                        {{ $data->title }}
                    </div>
                </td>
                <td>
                    <div class="my-auto px-3 mb-0 ">
                        @foreach ($data->categories as $category)
                            {{ $category->name }}, <br>
                        @endforeach
                        {{-- {{ $data->categories->name }} --}}
                    </div>
                </td>
                <td>
                    <div class="my-auto float-end">
                        <i class="fa-solid fa-location-arrow fa-lg"></i>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="4">
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
        {{ $knowledge_base->links() }}
    </div>
</div>