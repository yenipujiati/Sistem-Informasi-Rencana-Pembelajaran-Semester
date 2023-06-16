<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="form-group">
                    <label for="kode" class="col-md-4 col-form-label text-md-end">{{ __('Kode') }}</label>
                    <input id="kode" type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" required autocomplete="kode" wire:model.defer="kode">
                    @error('kode')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="rumpun" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required autocomplete="nama" wire:model.defer="nama">
                    @error('nama')
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