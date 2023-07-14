<div>
    @if(in_array($userlogin, $pengembangIds))
        <div>
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
                    @if($post->pengembang_id == $userlogin)
                        <tr>
                            <td>{{ $post->matakuliah->kode }}</td>
                            <td>{{ $post->matakuliah->nama }}</td>
                            <td>{{ $post->pengembang->name }}</td>
                            <td>
                                <a href="{{ route('rpsonesubmitdetail', $post->id) }}" class="btn btn-sm btn-info">DETAIL</a>
                                <a href="{{ route('rpsonesubmitedit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p><strong>You don't have RPS yet.</strong></p>
        <p>But if you are sure you have created an RPS, please re-login.</p>
    @endif
</div>
