<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="update">
                <input type="hidden" wire:model="cpl_id">
                <div class="form-group">
                    <label for="kode" class="col-md-4 col-form-label text-md-end">{{ __('CPL Code') }}</label>
                    <input id="kode" type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" required autocomplete="kode" wire:model.defer="kode">
                    @error('kode')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kategori_id" class="col-md-4 col-form-label text-md-end">{{ __('CPL Category') }}</label>
                    <div class="col-md-max col-form-label">
                    @csrf
                        <select id="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id" wire:model.defer="kategori_id">
                            <option value="">Select Category CPL</option>
                                @foreach ($categorys as $item)
                                    <option value="{{ $item->id }}">{{ $item->singkatan }}</option>
                                @endforeach
                        </select>
                    </div>
                    @error('kategori_id')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                    <textarea id="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" required autocomplete="deskripsi" cols="30" rows="10" wire:model.defer="deskripsi"></textarea>
                    @error('deskripsi')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="button" class="btn btn-secondary" onclick="history.back(-1)">BACK</button>
                <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>
        </div>
    </div>
</div>