<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="form-group">
                    <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('CPL Name') }}</label>
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required autocomplete="nama" wire:model.defer="nama">
                    @error('nama')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="singkatan" class="col-md-4 col-form-label text-md-end">{{ __('CPL Abbreviation') }}</label>
                    <input id="singkatan" type="text" class="form-control @error('singkatan') is-invalid @enderror" name="singkatan" required autocomplete="singkatan" wire:model.defer="singkatan">
                    @error('singkatan')
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