<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="update">
                <input type="hidden" wire:model="pustaka_id">
                <div class="form-group">
                    <label for="jenis" class="col-md-4 col-form-label text-md-end">{{ __('Library Type') }}</label>
                    <div class="col-md-max col-form-label">
                    @csrf
                        <select id="jenis" class="form-control @error('jenis') is-invalid @enderror" name="jenis" wire:model.defer="jenis">
                            <option selected>Select Library Type</option>
                            <option value="Utama">Utama</option>
                            <option value="Pendukung">Pendukung</option>
                        </select>
                    </div>
                    @error('jenis')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sumber" class="col-md-4 col-form-label text-md-end">{{ __('Source') }}</label>
                    <textarea id="sumber" type="text" class="form-control @error('sumber') is-invalid @enderror" name="sumber" required autocomplete="sumber" cols="30" rows="10" wire:model.defer="sumber"></textarea>
                    @error('sumber')
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