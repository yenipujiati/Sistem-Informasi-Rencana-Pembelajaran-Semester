<div>
    <div class="col md-3">
        <div class="col-md-12">
            <div class="container">
                <h5>Redundancy Information</h5>
                <br>
                @if($duplicates->isNotEmpty())
                    @foreach($duplicates as $redundancy)
                        <div class="card">
                            <p>Terdapat redundansi topik <strong>{{ strtoupper($redundancy->topik) }}</strong> pada: </p>
                            <p>Matakuliah:</p>
                            <p><strong>{{ $redundancy->nama}}</strong></p>
                        </div>
                        <br>
                    @endforeach
                @else
                    <p>No redundancy found.</p>
                @endif
            </div>
        </div>
    </div>
</div>
