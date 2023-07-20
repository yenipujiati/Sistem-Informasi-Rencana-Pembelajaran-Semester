<div>
    <a href="{{ route('rumpuncreate') }}" class="btn btn-md btn-success mb-3">ADD RUMPUN MATAKULIAH</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">KODE</th>
                <th scope="col">NAME</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
        @foreach($rumpun as $post)
            <tr>
                <td>{{ $post->kode }}</td>
                <td>{{ $post->nama }}</td>
                <td>
                    <a href="{{ route('rumpunedit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    <button onclick="deleteRumpun({{$post->id}})" class="btn btn-danger btn-sm">DELETE</button>
                </td>
            </tr>
            @endforeach
            </tr>
        </tbody>
    </table>
    {{-- {{ $rumpun->links() }} --}}

    @if ($rumpun->lastPage() > 1)
        <ul class="pagination">
            <!-- Tautan Previous -->
            @if ($rumpun->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $rumpun->previousPageUrl() }}" rel="prev" class="page-link" aria-label="@lang('pagination.previous')">&laquo;</a>
                </li>
            @endif

            <!-- Tautan Halaman -->
            @for ($i = 1; $i <= $rumpun->lastPage(); $i++)
                @if ($i == $rumpun->currentPage())
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">{{ $i }}</span>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $rumpun->url($i) }}" class="page-link">{{ $i }}</a>
                    </li>
                @endif
            @endfor

            <!-- Tautan Next -->
            @if ($rumpun->hasMorePages())
                <li class="page-item">
                    <a href="{{ $rumpun->nextPageUrl() }}" rel="next" class="page-link" aria-label="@lang('pagination.next')">&raquo;</a>
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
        function deleteRumpun(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deleteRumpun',id);
        }
    </script>
</div>