<div>
    <button type="button" wire:click="addPertemuan" class="btn btn-primary">Input Pertemuan</button>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="store">
                @foreach($pertemuan as $index =>$item)
                    <div class="border p-3 mb-3">
                        <div class="form-group">
                            <label for="minggu_ke" class="col-md-4 col-form-label text-md-end">{{ __('Minggu-ke') }}</label>
                            <input id="minggu_ke" type="number" class="form-control @error('minggu_ke') is-invalid @enderror" name="minggu_ke" required autocomplete="minggu_ke" wire:model.defer="pertemuan.{{$index}}.minggu_ke">
                            @error('minggu_ke')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kemampuan_akhir" class="col-md-4 col-form-label text-md-end">{{ __('Kemampuan akhir mahasiswa') }}</label>
                            <textarea id="kemampuan_akhir" type="text" class="form-control @error('kemampuan_akhir') is-invalid @enderror" name="kemampuan_akhir" required autocomplete="kemampuan_akhir" cols="30" rows="10" wire:model.defer="pertemuan.{{$index}}.kemampuan_akhir"></textarea>
                            @error('kemampuan_akhir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bahan_kajian" class="col-md-4 col-form-label text-md-end">{{ __('Bahan Kajian') }}</label>
                            <input id="bahan_kajian" type="text" class="form-control @error('bahan_kajian') is-invalid @enderror" name="bahan_kajian" required autocomplete="bahan_kajian" wire:model.defer="pertemuan.{{$index}}.bahan_kajian">
                            @error('bahan_kajian')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="metode_pembelajaran" class="col-md-4 col-form-label text-md-end">{{ __('Metode Pembelajaran') }}</label>
                            <div class="col-md-max col-form-label">
                                <select id="metode_pembelajaran" class="form-control @error('metode_pembelajaran') is-invalid @enderror" name="metode_pembelajaran" wire:model.defer="pertemuan.{{$index}}.metode_pembelajaran">
                                    <option selected>Pilih Metode Pembelajaran</option>
                                    <option value="Ceramah">Ceramah</option>
                                    <option value="Diskusi">Diskusi</option>
                                    <option value="Tanya Jawab">Tanya Jawab</option>
                                    <option value="Demonstrasi">Demonstrasi</option>
                                    <option value="Pemecahan Masalah">Pemecahan Masalah</option>
                                    <option value="Proyek">Proyek</option>
                                    <option value="Pembelajaran Kolaboratif">Pembelajaran Kolaboratif</option>
                                    <option value="Pembelajaran Berbasis Masalah">Pembelajaran Berbasis Masalah</option>
                                    <option value="Pembelajaran Berbasis Proyek">Pembelajaran Berbasis Proyek</option>
                                    <option value="Pembelajaran Berbasis Komputer">Pembelajaran Berbasis Komputer</option>
                                </select>
                            </div>
                            @error('metode_pembelajaran')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="waktu" class="col-md-4 col-form-label text-md-end">{{ __('Waktu') }}</label>
                            <input id="waktu" type="number" class="form-control @error('waktu') is-invalid @enderror" name="waktu" required autocomplete="waktu" wire:model.defer="pertemuan.{{$index}}.waktu">
                            @error('waktu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pengalaman_belajar" class="col-md-4 col-form-label text-md-end">{{ __('Pengalaman Belajar Mahasiswa') }}</label>
                            <textarea id="pengalaman_belajar" type="text" class="form-control @error('pengalaman_belajar') is-invalid @enderror" name="pengalaman_belajar" required autocomplete="pengalaman_belajar" cols="30" rows="10" wire:model.defer="pertemuan.{{$index}}.pengalaman_belajar"></textarea>
                            @error('pengalaman_belajar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bobot_nilai" class="col-md-4 col-form-label text-md-end">{{ __('Bobot Nilai (%)') }}</label>
                            <input id="bobot_nilai" type="number" class="form-control @error('bobot_nilai') is-invalid @enderror" name="bobot_nilai" required autocomplete="bobot_nilai" wire:model.defer="pertemuan.{{$index}}.bobot_nilai">
                            @error('bobot_nilai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="topik_id" class="col-md-4 col-form-label text-md-end">{{ __('Topik Pembelajaran') }}</label>
                            <div class="col-md-max col-form-label">
                                <select id="topik_id" class="form-control @error('topik_id') is-invalid @enderror" name="topik_id" wire:model.defer="pertemuan.{{$index}}.topik_id">
                                    <option value="">Pilih</option>
                                        @foreach ($topik as $item)
                                            <option value="{{ $item->id }}">{{ $item->topik }}</option>
                                        @endforeach
                                </select>
                            </div>
                            @error('topik_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="button" wire:click="removePertemuan({{ $index }})" class="btn btn-danger">DELETE</button>
                    </div>
                @endforeach

                <!-- dinamis form -->
                <!-- @foreach($pertemuan as $index =>$item)
                <br>
                    <div class="border p-3 mb-3">
                        <div class="form-group">
                            <label for="minggu_ke" class="col-md-4 col-form-label text-md-end">{{ __('Minggu-ke') }}</label>
                            <input id="minggu_ke" type="number" class="form-control @error('minggu_ke') is-invalid @enderror" name="minggu_ke" required autocomplete="minggu_ke" wire:model.defer="minggu_ke">
                            @error('minggu_ke')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kemampuan_akhir" class="col-md-4 col-form-label text-md-end">{{ __('Kemampuan akhir mahasiswa') }}</label>
                            <textarea id="kemampuan_akhir" type="text" class="form-control @error('kemampuan_akhir') is-invalid @enderror" name="kemampuan_akhir" required autocomplete="kemampuan_akhir" cols="30" rows="10" wire:model.defer="kemampuan_akhir"></textarea>
                            @error('kemampuan_akhir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bahan_kajian" class="col-md-4 col-form-label text-md-end">{{ __('Bahan Kajian') }}</label>
                            <input id="bahan_kajian" type="text" class="form-control @error('bahan_kajian') is-invalid @enderror" name="bahan_kajian" required autocomplete="bahan_kajian" wire:model.defer="bahan_kajian">
                            @error('bahan_kajian')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="metode_pembelajaran" class="col-md-4 col-form-label text-md-end">{{ __('Metode Pembelajaran') }}</label>
                            <div class="col-md-max col-form-label">
                            @csrf
                                <select id="metode_pembelajaran" class="form-control @error('metode_pembelajaran') is-invalid @enderror" name="metode_pembelajaran" wire:model.defer="metode_pembelajaran">
                                    <option selected>Pilih Metode Pembelajaran</option>
                                    <option value="Ceramah">Ceramah</option>
                                    <option value="Diskusi">Disusi</option>
                                    <option value="Tanya Jawab">Tanya Jawab</option>
                                    <option value="Demonstrasi">Demonstrasi</option>
                                    <option value="Pemecahan Masalah">Pemecahan Masalah</option>
                                    <option value="Proyek">Proyek</option>
                                    <option value="Pembelajaran Kolaboratif">Pembelajaran Kolaboratif</option>
                                    <option value="Pembelajaran Berbasis Masalah">Pembelajaran Berbasis Masalah</option>
                                    <option value="Pembelajaran Berbasis Proyek">Pembelajaran Berbasis Proyek</option>
                                    <option value="Pembelajaran Berbasis Komputer">Pembelajaran Berbasis Komputer</option>
                                </select>
                            </div>
                            @error('metode_pembelajaran')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="waktu" class="col-md-4 col-form-label text-md-end">{{ __('Waktu') }}</label>
                            <input id="waktu" type="number" class="form-control @error('waktu') is-invalid @enderror" name="waktu" required autocomplete="waktu" wire:model.defer="waktu">
                            @error('waktu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pengalaman_belajar" class="col-md-4 col-form-label text-md-end">{{ __('Pengalaman Belajar Mahasiswa') }}</label>
                            <textarea id="pengalaman_belajar" type="text" class="form-control @error('pengalaman_belajar') is-invalid @enderror" name="pengalaman_belajar" required autocomplete="pengalaman_belajar" cols="30" rows="10" wire:model.defer="pengalaman_belajar"></textarea>
                            @error('pengalaman_belajar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bobot_nilai" class="col-md-4 col-form-label text-md-end">{{ __('Bobot Nilai (%)') }}</label>
                            <input id="bobot_nilai" type="number" class="form-control @error('bobot_nilai') is-invalid @enderror" name="bobot_nilai" required autocomplete="bobot_nilai" wire:model.defer="bobot_nilai">
                            @error('bobot_nilai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="topik_id" class="col-md-4 col-form-label text-md-end">{{ __('Topik Pembelajaran') }}</label>
                            <div class="col-md-max col-form-label">
                            @csrf
                                <select id="topik_id" class="form-control @error('topik_id') is-invalid @enderror" name="topik_id" wire:model.defer="topik_id">
                                    <option value="">Pilih</option>
                                        @foreach ($topik as $item)
                                            <option value="{{ $item->id }}">{{ $item->topik }}</option>
                                        @endforeach
                                </select>
                            </div>
                            @error('topik_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="button" wire:click="removePertemuan({{ $index }})" class="btn btn-danger">DELETE</button>
                    </div>
                @endforeach -->

                <!-- <button type="button" wire:click="addPertemuan" class="btn btn-primary">Tambah Pertemuan</button> -->
                
                <!-- <button type="button" class="btn btn-secondary" onclick="history.back(-1)">BACK</button> -->
                <!-- <button type="submit" class="btn btn-primary">SAVE</button> -->
                <div class="form-group row mb-0">
                <button type="button" class="btn btn-secondary" onclick="history.back(-1)">BACK</button>
                <button type="submit" class="btn btn-primary">
                    {{ __('SAVE') }}
                </button>
                </div>
            </form>
        </div>
    </div>
    <script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('pertemuanAdded', function () {
            setTimeout(function () {
                var index = {{ count($pertemuan) }};
                var newItem = `
                    <div class="border p-3 mb-3">
                        <!-- Tambahkan input fields untuk minggu_ke, kemampuan_akhir, bahan_kajian, metode_pembelajaran, waktu, pengalaman_belajar, bobot_nilai, dan topik_id -->
                        <button type="button" wire:click="removePertemuan(${index})" class="btn btn-danger">Hapus</button>
                    </div>
                `;
                var container = document.querySelector('#pertemuan-container');
                var div = document.createElement('div');
                div.innerHTML = newItem;
                container.appendChild(div.firstChild);
            }, 100);
        });
    });
</script>
</div> 
