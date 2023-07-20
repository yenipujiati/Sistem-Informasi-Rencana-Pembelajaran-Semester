<div>
    <a href="{{ route('topikcreate') }}" class="btn btn-md btn-success mb-3">ADD TOPIC</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">TOPICS</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
        @foreach($topik as $post)
            <tr>
                <td>{{ $post->topik }}</td>
                <td>
                    <a href="{{ route('topikedit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    <button onclick="deleteTopik({{$post->id}})" class="btn btn-danger btn-sm">DELETE</button>
                </td>
            </tr>
            @endforeach
            </tr>
        </tbody>
    </table>
    {{-- {{ $topik->links() }} --}}

    @if ($topik->lastPage() > 1)
        <ul class="pagination">
            <!-- Tautan Previous -->
            @if ($topik->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $topik->previousPageUrl() }}" rel="prev" class="page-link" aria-label="@lang('pagination.previous')">&laquo;</a>
                </li>
            @endif

            <!-- Tautan Halaman -->
            @for ($i = 1; $i <= $topik->lastPage(); $i++)
                @if ($i == $topik->currentPage())
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">{{ $i }}</span>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $topik->url($i) }}" class="page-link">{{ $i }}</a>
                    </li>
                @endif
            @endfor

            <!-- Tautan Next -->
            @if ($topik->hasMorePages())
                <li class="page-item">
                    <a href="{{ $topik->nextPageUrl() }}" rel="next" class="page-link" aria-label="@lang('pagination.next')">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&raquo;</span>
                </li>
            @endif
        </ul>
    @endif
    <br>

    <script>
        function deleteTopik(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deleteTopik',id);
        }
    </script>
</div>