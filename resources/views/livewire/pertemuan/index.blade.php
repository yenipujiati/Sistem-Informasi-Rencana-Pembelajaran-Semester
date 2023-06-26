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

    <script>
        function deletePertemuan(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deletePertemuan',id);
        }
    </script>
</div>