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

    <script>
        function deleteCpl(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deleteCpl',id);
        }
    </script>
</div>