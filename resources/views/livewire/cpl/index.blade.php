<div>
    <a href="{{ route('cplcreate') }}" class="btn btn-md btn-success mb-3">ADD CPL</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">CPL CODE</th>
                <th scope="col">CPL CATEGORY</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cpl as $post)
            <tr>
                <td>{{ $post->kode }}</td>
                <td>{{ $post->kategori->singkatan }}</td>
                <td>{{ $post->deskripsi }}</td>
                <td>
                    <a href="{{ route('cpledit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    <button onclick="deleteCpl({{$post->id}})" class="btn btn-danger btn-sm">DELETE</button>
                </td>
            </tr>
            @endforeach
            </tr>
        </tbody>
    </table>
    {{-- {{ $cpl->links() }} --}}

    @if ($cpl->lastPage() > 1)
        <ul class="pagination">
            <!-- Tautan Previous -->
            @if ($cpl->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $cpl->previousPageUrl() }}" rel="prev" class="page-link" aria-label="@lang('pagination.previous')">&laquo;</a>
                </li>
            @endif

            <!-- Tautan Halaman -->
            @for ($i = 1; $i <= $cpl->lastPage(); $i++)
                @if ($i == $cpl->currentPage())
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">{{ $i }}</span>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $cpl->url($i) }}" class="page-link">{{ $i }}</a>
                    </li>
                @endif
            @endfor

            <!-- Tautan Next -->
            @if ($cpl->hasMorePages())
                <li class="page-item">
                    <a href="{{ $cpl->nextPageUrl() }}" rel="next" class="page-link" aria-label="@lang('pagination.next')">&raquo;</a>
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
        function deleteCpl(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deleteCpl',id);
        }
    </script>
</div>