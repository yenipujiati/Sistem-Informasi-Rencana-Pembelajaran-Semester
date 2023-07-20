<div>
    <a href="{{ route('matakuliahcreate') }}" class="btn btn-md btn-success mb-3">ADD MATAKULIAH</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">MATAKULIAH</th>
                <th scope="col">KODE MATAKULIAH</th>
                <th scope="col">RUMPUN MATAKULIAH</th>
                <th scope="col">BOBOT (sks)</th>
                <th scope="col">SEMESTER</th>
                <th scope="col">TANGGAL PENYUSUNAN</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
        @foreach($matakuliah as $post)
            <tr>
                <td>{{ $post->nama }}</td>
                <td>{{ $post->kode }}</td>
                <td>{{ $post->rumpun->nama }}</td>
                <td>{{ $post->bobot }}</td>
                <td>{{ $post->semester }}</td>
                <td>{{ $post->tanggal_penyusunan }}</td>
                <td>
                    <a href="{{ route('matakuliahedit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    <button onclick="deleteMatakuliah({{$post->id}})" class="btn btn-danger btn-sm">DELETE</button>
                </td>
            </tr>
            @endforeach
            </tr>
        </tbody>
    </table>
    {{-- {{ $matakuliah->links() }} --}}

    @if ($matakuliah->lastPage() > 1)
        <ul class="pagination">
            <!-- Tautan Previous -->
            @if ($matakuliah->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $matakuliah->previousPageUrl() }}" rel="prev" class="page-link" aria-label="@lang('pagination.previous')">&laquo;</a>
                </li>
            @endif

            <!-- Tautan Halaman -->
            @for ($i = 1; $i <= $matakuliah->lastPage(); $i++)
                @if ($i == $matakuliah->currentPage())
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">{{ $i }}</span>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $matakuliah->url($i) }}" class="page-link">{{ $i }}</a>
                    </li>
                @endif
            @endfor

            <!-- Tautan Next -->
            @if ($matakuliah->hasMorePages())
                <li class="page-item">
                    <a href="{{ $matakuliah->nextPageUrl() }}" rel="next" class="page-link" aria-label="@lang('pagination.next')">&raquo;</a>
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
        function deleteMatakuliah(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deleteMatakuliah',id);
        }
    </script>
</div>