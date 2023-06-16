<div>
    <a href="{{ route('topikcreate') }}" class="btn btn-md btn-success mb-3">ADD TOPIC</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">TOPICS</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
        @foreach($topik as $post)
            <tr>
                <td>{{ $post->topik }}</td>
                <td>
                    <a href="{{ route('topikedit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    <button onclick="deleteTopik({{$post->id}})" class="btn btn-danger btn-sm">DELETE</button>
                </td>
            </tr>
            @endforeach
            </tr>
        </tbody>
    </table>

    <script>
        function deleteTopik(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deleteTopik',id);
        }
    </script>
</div>