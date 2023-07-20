<div>
    @if(in_array($userlogin, $pengembangIds))
        <div>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">KODE</th>
                        <th scope="col">MATAKULIAH</th>
                        <th scope="col">PENGEMBANG</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($resultrps as $post)
                    @if($post->pengembang_id == $userlogin)
                        <tr>
                            <td>{{ $post->matakuliah->kode }}</td>
                            <td>{{ $post->matakuliah->nama }}</td>
                            <td>{{ $post->pengembang->name }}</td>
                            <td>
                                <a href="{{ route('rpsonesubmitdetail', $post->id) }}" class="btn btn-sm btn-info">DETAIL</a>
                                <a href="{{ route('rpsonesubmitedit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

            {{-- {{ $resultrps->links() }} --}}

            @if ($resultrps->lastPage() > 1)
                <ul class="pagination">
                    <!-- Tautan Previous -->
                    @if ($resultrps->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">&laquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="{{ $resultrps->previousPageUrl() }}" rel="prev" class="page-link" aria-label="@lang('pagination.previous')">&laquo;</a>
                        </li>
                    @endif

                    <!-- Tautan Halaman -->
                    @for ($i = 1; $i <= $resultrps->lastPage(); $i++)
                        @if ($i == $resultrps->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">{{ $i }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a href="{{ $resultrps->url($i) }}" class="page-link">{{ $i }}</a>
                            </li>
                        @endif
                    @endfor

                    <!-- Tautan Next -->
                    @if ($resultrps->hasMorePages())
                        <li class="page-item">
                            <a href="{{ $resultrps->nextPageUrl() }}" rel="next" class="page-link" aria-label="@lang('pagination.next')">&raquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">&raquo;</span>
                        </li>
                    @endif
                </ul>
            @endif
            <br>
            
        </div>
    @else
        <p><strong>You don't have RPS yet.</strong></p>
        <p>But if you are sure you have created an RPS, please re-login.</p>
    @endif
</div>
