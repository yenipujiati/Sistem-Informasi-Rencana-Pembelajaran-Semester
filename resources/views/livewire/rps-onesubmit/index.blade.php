<div>
    <a href="{{ route('rpsonesubmitcreate') }}" class="btn btn-md btn-success mb-3">ADD RPS-Onesub</a>
    <a href="{{ route('rpsonesubmitduplicates') }}" class="btn btn-md btn-success mb-3 pull-right">ADD RPS-Onesub</a>
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
                <th scope="col">TOPIK</th>
                <th scope="col">MATA KULIAH SYARAT</th>
                <th scope="col">PERTEMUAN</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
        @foreach($result as $post)
            <tr>
                <td>{{ $post->rp->matakuliah->nama }}</td>
                <td>{{ $post->rp->pengembang->name }}</td>
                <td>{{ $post->rp->koordinator->name }}</td>
                <td>{{ $post->rp->kaprodi->name }}</td>
                <td>{{ $post->rp->cpl->kode }}</td>
                <td>{{ $post->rp->deskripsi_singkat }}</td>
                <td>{{ $post->rp->pustaka->jenis }}</td>
                <td>{{ $post->rp->mp_software }}</td>
                <td>{{ $post->rp->mp_hardware }}</td>
                <td>{{ $post->rp->pengampu->name }}</td>
                <td>{{ $post->topik->topik }}</td>
                <td>{{ $post->rp->matakuliah->nama }}</td>
                <td>{{ $post->minggu_ke }}</td>
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