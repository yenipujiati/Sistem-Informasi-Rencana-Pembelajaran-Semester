<div>
    <a href="{{ route('rpsonesubmitcreate') }}" class="btn btn-md btn-success mb-3">ADD RPS-Onesub</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">MATAKULIAH</th>
                <th scope="col">PENGEMBANG</th>
                <th scope="col">KOORDINATOR</th>
                <th scope="col">KAPRODI</th>
                <th scope="col">CAPAIAN PEMBELAJARAN</th>
                <th scope="col">DESKRIPSI SINGKAT MK</th>
                <th scope="col">PUSTAKA</th>
                <th scope="col">MEDIA PEMBELAJARAN (SOFTWARE)</th>
                <th scope="col">MEDIA PEMBELAJARAN (HARDWARE)</th>
                <th scope="col">DOSEN PENGAMPU</th>
                <th scope="col">MATA KULIAH SYARAT</th>
                <th scope="col">PERTEMUAN</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
        @foreach($rps as $post)
            <tr>
                <td>{{ $post->matakuliah->nama }}</td>
                <td>{{ $post->pengembang->name }}</td>
                <td>{{ $post->koordinator->name }}</td>
                <td>{{ $post->kaprodi->name }}</td>
                <td>{{ $post->cpl->kode }}</td>
                <td>{{ $post->deskripsi_singkat }}</td>
                <td>{{ $post->pustaka->jenis }}</td>
                <td>{{ $post->mp_software }}</td>
                <td>{{ $post->mp_hardware }}</td>
                <td>{{ $post->pengampu->name }}</td>
                <td>{{ $post->matakuliah->nama }}</td>
                <td>{{ $post->pertemuan->minggu_ke }}</td>
                <td>
                    <a href="{{ route('rpsonesubmitedit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    <button onclick="deleteRpsOnesubmit({{$post->id}})" class="btn btn-danger btn-sm">DELETE</button>
                </td>
            </tr>
            @endforeach
            </tr>
        </tbody>
    </table>

    <script>
        function deleteRpsOnesubmit(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deleteRpsOnesubmit',id);
        }
    </script>
</div>