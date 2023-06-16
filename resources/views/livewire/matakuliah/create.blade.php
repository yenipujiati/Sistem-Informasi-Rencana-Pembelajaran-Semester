<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="form-group">
                    <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Matakuliah') }}</label>
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required autocomplete="nama" wire:model.defer="nama">
                    @error('nama')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kode" class="col-md-4 col-form-label text-md-end">{{ __('Kode Matakuliah') }}</label>
                    <input id="kode" type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" required autocomplete="kode" wire:model.defer="kode">
                    @error('kode')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="rumpun_id" class="col-md-4 col-form-label text-md-end">{{ __('Rumpun Matakuliah') }}</label>
                    <div class="col-md-max col-form-label">
                    @csrf
                        <select id="rumpun_id" class="form-control @error('rumpun_id') is-invalid @enderror" name="rumpun_id" wire:model.defer="rumpun_id">
                            <option value="">Pilih</option>
                                @foreach ($rumpun as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                        </select>
                    </div>
                    @error('rumpun_id')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bobot" class="col-md-4 col-form-label text-md-end">{{ __('Bobot (sks)') }}</label>
                    <input id="bobot" type="number" class="form-control @error('bobot') is-invalid @enderror" name="bobot" required autocomplete="bobot" wire:model.defer="bobot">
                    @error('bobot')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="semester" class="col-md-4 col-form-label text-md-end">{{ __('Semester') }}</label>
                    <input id="semester" type="number" class="form-control @error('semester') is-invalid @enderror" name="semester" required autocomplete="semester" wire:model.defer="semester">
                    @error('semester')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_penyusunan" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Penyusunan') }}</label>
                    <input id="tanggal_penyusunan" type="date" class="form-control @error('tanggal_penyusunan') is-invalid @enderror" name="tanggal_penyusunan" required autocomplete="tanggal_penyusunan" wire:model.defer="tanggal_penyusunan">
                    @error('tanggal_penyusunan')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="button" class="btn btn-secondary" onclick="history.back(-1)">BACK</button>
                <button type="submit" class="btn btn-primary">SAVE</button>
            </form>
        </div>
    </div>
</div>