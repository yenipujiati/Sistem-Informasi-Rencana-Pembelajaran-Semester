<div>
    <!-- <a href="{{ route('rpsonesubmitcreate') }}" class="btn btn-md btn-success mb-3">ADD RPS-Onesub</a> -->
    <!-- <a href="{{ route('rpsonesubmitduplicates') }}" class="btn btn-md btn-info mb-3">Check redundancy</a> -->
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
                <a href="{{ route('rpsonesubmitdetail', $post->id) }}" class="btn btn-sm btn-primary">DETAIL</a>
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