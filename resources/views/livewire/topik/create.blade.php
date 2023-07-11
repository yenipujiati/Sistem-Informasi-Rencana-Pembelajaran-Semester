<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="form-group">
                    <label for="topik" class="col-md-4 col-form-label text-md-end">{{ __('Topik') }}</label>
                    <input id="topik" type="text" class="form-control @error('topik') is-invalid @enderror" name="topik" autocomplete="topik" wire:model.defer="topik">
                    @error('topik')
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