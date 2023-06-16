<div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form wire:submit.prevent="loginDosen">
                    <div class="row mb-3">
                            <label for="nidn" class="col-md-4 col-form-label text-md-end">{{ __('NIDN') }}</label>

                            <div class="col-md-6">
                                <input id="nidn" type="number" class="form-control @error('nidn') is-invalid @enderror" name="nidn" required autocomplete="nidn" wire:model.defer="nidn">

                                @error('nidn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" wire:model.defer="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                        <div class="input-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" wire:model.defer="remember">
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <a href="{{ route('register') }}" class="text-primary">Don't have an account yet?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
