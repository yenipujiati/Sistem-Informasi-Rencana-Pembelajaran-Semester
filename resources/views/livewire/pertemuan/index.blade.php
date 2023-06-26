<div>
    <a href="{{ route('pertemuancreate') }}" class="btn btn-md btn-success mb-3">ADD PERTEMUAN</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">MINGGU-KE</th>
                <th scope="col">KEMAMPUAN AKHIR YANG DIHARAPKAN</th>
                <th scope="col">BAHAN KAJIAN (MATERI PEMBELAJARAN)</th>
                <th scope="col">METODE PEMBELAJARAN</th>
                <th scope="col">WAKTU</th>
                <th scope="col">PENGALAMAN BELAJAR MAHASISWA</th>
                <th scope="col">BOBOT NILAI (%)</th>
                <th scope="col">TOPIK PERTEMUAN</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pertemuan as $post)
            <tr>
                <td>{{ $post->minggu_ke }}</td>
                <td>{{ $post->kemampuan_akhir }}</td>
                <td>{{ $post->bahan_kajian }}</td>
                <td>{{ $post->metode_pembelajaran }}</td>
                <td>{{ $post->waktu }}*50</td>
                <td>{{ $post->pengalaman_belajar }}</td>
                <td>{{ $post->bobot_nilai }}</td>
                <td>{{ $post->topik->topik }}</td>
                <td>
                    <a href="{{ route('pertemuanedit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    <button onclick="deletePertemuan({{$post->id}})" class="btn btn-danger btn-sm">DELETE</button>
                </td>
            </tr>
            @endforeach
            </tr>
        </tbody>
    </table>

    <!-- {{ $pertemuan->links() }} -->

    <!-- Paginasi -->
    @if ($pertemuan->lastPage() > 1)
        <ul class="pagination">
            <!-- Tautan Previous -->
            @if ($pertemuan->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $pertemuan->previousPageUrl() }}" rel="prev" class="page-link" aria-label="@lang('pagination.previous')">&laquo;</a>
                </li>
            @endif

            <!-- Tautan Halaman -->
            @for ($i = 1; $i <= $pertemuan->lastPage(); $i++)
                @if ($i == $pertemuan->currentPage())
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">{{ $i }}</span>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $pertemuan->url($i) }}" class="page-link">{{ $i }}</a>
                    </li>
                @endif
            @endfor

            <!-- Tautan Next -->
            @if ($pertemuan->hasMorePages())
                <li class="page-item">
                    <a href="{{ $pertemuan->nextPageUrl() }}" rel="next" class="page-link" aria-label="@lang('pagination.next')">&raquo;</a>
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
        function deletePertemuan(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deletePertemuan',id);
        }
    </script>
</div>