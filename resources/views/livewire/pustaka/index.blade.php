<div>
    <a href="{{ route('pustakacreate') }}" class="btn btn-md btn-success mb-3">ADD PUSTAKA</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">LIBRARY TYPE</th>
                <th scope="col">SOURCE</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pustaka as $post)
            <tr>
                <td>{{ $post->jenis }}</td>
                <td>{{ $post->sumber }}</td>
                <td>
                    <a href="{{ route('pustakaedit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    <button onclick="deletePustaka({{$post->id}})" class="btn btn-danger btn-sm">DELETE</button>
                </td>
            </tr>
            @endforeach
            </tr>
        </tbody>
    </table>

    <script>
        function deletePustaka(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deletePustaka',id);
        }
    </script>
</div>