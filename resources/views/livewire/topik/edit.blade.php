<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="update">
                <input type="hidden" wire:model="topi_id">
                <div class="form-group">
                    <label for="topik" class="col-md-4 col-form-label text-md-end">{{ __('Topic') }}</label>
                    <input type="text" class="form-control @error('topik') is-invalid @enderror" wire:model.defer="topik">
                    @error('topik')
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