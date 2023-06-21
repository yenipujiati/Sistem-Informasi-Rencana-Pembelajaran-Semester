<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="update">
                <input type="hidden" wire:model="rps_id">
                <div class="form-group">
                @csrf
                    <label for="matakuliah_id" class="col-md-4 col-form-label text-md-end">{{ __('Matakuliah') }}</label>
                    <div class="col-md-max col-form-label">
                        <select id="matakuliah_id" class="form-control @error('matakuliah_id') is-invalid @enderror" name="matakuliah_id" wire:model.defer="matakuliah_id">
                            <option value="">Pilih</option>
                                @foreach ($matakuliah as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                        </select>
                    </div>
                    @error('matakuliah_id')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pengembang_id" class="col-md-4 col-form-label text-md-end">{{ __('Pengembang RP') }}</label>
                    <div class="col-md-max col-form-label">
                        <select id="pengembang_id" class="form-control @error('pengembang_id') is-invalid @enderror" name="pengembang_id" wire:model.defer="pengembang_id">
                            <option value="">Pilih</option>
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                        </select>
                    </div>
                    @error('pengembang_id')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="koordinator_id" class="col-md-4 col-form-label text-md-end">{{ __('Koordinator Rumpun RP') }}</label>
                    <div class="col-md-max col-form-label">
                        <select id="koordinator_id" class="form-control @error('koordinator_id') is-invalid @enderror" name="koordinator_id" wire:model.defer="koordinator_id">
                            <option value="">Pilih</option>
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                        </select>
                    </div>
                    @error('koordinator_id')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kaprodi_id" class="col-md-4 col-form-label text-md-end">{{ __('Ketua Program Studi') }}</label>
                    <div class="col-md-max col-form-label">
                        <select id="kaprodi_id" class="form-control @error('kaprodi_id') is-invalid @enderror" name="kaprodi_id" wire:model.defer="kaprodi_id">
                            <option value="">Pilih</option>
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                        </select>
                    </div>
                    @error('kaprodi_id')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cpl_id" class="col-md-4 col-form-label text-md-end">{{ __('Capaian Pembelajaran') }}</label><br>
                    <div class="col-md-max col-form-label"><br>
                    @foreach ($cpl as $item)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="cpl_id[]" value="{{ $item->id }}" id="cpl_id"  wire:model.defer="cpl_id">
                            <label class="form-check-label" for="for="cpl_{{ $item->id }}">
                                {{ $item->kode }}
                            </label>
                        </div>
                    @endforeach
                    </div>
                    @error('cpl_id')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- <div class="form-group">
                    <label for="cpl_id" class="col-md-4 col-form-label text-md-end">{{ __('Capaian Pemebelajaran') }}</label>
                    <div class="col-md-max col-form-label">
                        <select id="cpl_id" class="form-control @error('cpl_id') is-invalid @enderror" name="cpl_id" wire:model.defer="cpl_id">
                            <option value="">Pilih</option>
                                @foreach ($cpl as $item)
                                    <option value="{{ $item->id }}">{{ $item->kode }}</option>
                                @endforeach
                        </select>
                    </div>
                    @error('cpl_id')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> -->
                <div class="form-group">
                    <label for="deskripsi_singkat" class="col-md-4 col-form-label text-md-end">{{ __('Deskripsi Singkat') }}</label>
                    <textarea id="deskripsi_singkat" type="text" class="form-control @error('deskripsi_singkat') is-invalid @enderror" name="deskripsi_singkat" required autocomplete="deskripsi_singkat" cols="30" rows="10" wire:model.defer="deskripsi_singkat"></textarea>
                    @error('deskripsi_singkat')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pustaka_id" class="col-md-4 col-form-label text-md-end">{{ __('Pustaka') }}</label>
                    <div class="col-md-max col-form-label">
                        <select id="pustaka_id" class="form-control @error('pustaka_id') is-invalid @enderror" name="pustaka_id" wire:model.defer="pustaka_id">
                            <option value="">Pilih</option>
                                @foreach ($pustaka as $item)
                                    <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                                @endforeach
                        </select>
                    </div>
                    @error('pustaka_id')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="mp_software" class="col-md-4 col-form-label text-md-end">{{ __('Media Pembelajaran (Software)') }}</label>
                    <input id="mp_software" type="text" class="form-control @error('mp_software') is-invalid @enderror" name="mp_software" required autocomplete="mp_software" wire:model.defer="mp_software">
                    @error('mp_software')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="mp_hardware" class="col-md-4 col-form-label text-md-end">{{ __('Media Pembelajaran (Hardware)') }}</label>
                    <input id="mp_hardware" type="text" class="form-control @error('mp_hardware') is-invalid @enderror" name="mp_hardware" required autocomplete="mp_hardware" wire:model.defer="mp_hardware">
                    @error('mp_hardware')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pengampu_id" class="col-md-4 col-form-label text-md-end">{{ __('Dosen Pengampu') }}</label>
                    <div class="col-md-max col-form-label">
                        <select id="pengampu_id" class="form-control @error('pengampu_id') is-invalid @enderror" name="pengampu_id" wire:model.defer="pengampu_id">
                            <option value="">Pilih</option>
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                        </select>
                    </div>
                    @error('pengampu_id')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="matakuliah_syarat_id" class="col-md-4 col-form-label text-md-end">{{ __('Mata Kuliah Syarat') }}</label>
                    <div class="col-md-max col-form-label">
                        <select id="matakuliah_syarat_id" class="form-control @error('matakuliah_syarat_id') is-invalid @enderror" name="matakuliah_syarat_id" wire:model.defer="matakuliah_syarat_id">
                            <option value="">Pilih</option>
                                @foreach ($matakuliah as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                        </select>
                    </div>
                    @error('matakuliah_syarat_id')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pertemuan_id" class="col-md-4 col-form-label text-md-end">{{ __('Pertemuan') }}</label>
                    <div class="col-md-max col-form-label">
                        <select id="pertemuan_id" class="form-control @error('pertemuan_id') is-invalid @enderror" name="pertemuan_id" wire:model.defer="pertemuan_id">
                            <option value="">Pilih</option>
                                @foreach ($pertemuan as $item)
                                    <option value="{{ $item->id }}">{{ $item->minggu_ke }}</option>
                                @endforeach
                        </select>
                    </div>
                    @error('pertemuan_id')
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