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

    <script>
        function deleteMatakuliah(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deleteMatakuliah',id);
        }
    </script>
</div>