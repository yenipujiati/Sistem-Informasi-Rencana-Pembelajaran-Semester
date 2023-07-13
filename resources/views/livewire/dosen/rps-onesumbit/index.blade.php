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
            <tr>
                <td>{{ $post->matakuliah->kode }}</td>
                <td>{{ $post->matakuliah->nama }}</td>
                <td>{{ $post->pengembang->name }}</td>
                <td>
                <a href="{{ route('dosen.rpsonesubmitdetail', $post->id) }}" class="btn btn-sm btn-primary">DETAIL</a>
                </td>
            </tr>
            @endforeach
            </tr>
        </tbody>
    </table>
</div>