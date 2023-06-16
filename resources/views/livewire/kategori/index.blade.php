<div>
    <a href="{{ route('kategoricreate') }}" class="btn btn-md btn-success mb-3">ADD CATEGORY</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">CATEGORY NAME</th>
                <th scope="col">ABBREVIATION</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
        @foreach($kategori as $post)
            <tr>
                <td>{{ $post->nama }}</td>
                <td>{{ $post->singkatan }}</td>
                <td>
                    <a href="{{ route('kategoriedit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    <button onclick="deleteKategori({{$post->id}})" class="btn btn-danger btn-sm">DELETE</button>
                </td>
            </tr>
            @endforeach
            </tr>
        </tbody>
    </table>

    <script>
        function deleteKategori(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deleteKategori',id);
        }
    </script>
</div>