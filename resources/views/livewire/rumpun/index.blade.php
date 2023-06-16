<div>
    <a href="{{ route('rumpuncreate') }}" class="btn btn-md btn-success mb-3">ADD RUMPUN MATAKULIAH</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">KODE</th>
                <th scope="col">NAME</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
        @foreach($rumpun as $post)
            <tr>
                <td>{{ $post->kode }}</td>
                <td>{{ $post->nama }}</td>
                <td>
                    <a href="{{ route('rumpunedit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    <button onclick="deleteRumpun({{$post->id}})" class="btn btn-danger btn-sm">DELETE</button>
                </td>
            </tr>
            @endforeach
            </tr>
        </tbody>
    </table>

    <script>
        function deleteRumpun(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deleteRumpun',id);
        }
    </script>
</div>