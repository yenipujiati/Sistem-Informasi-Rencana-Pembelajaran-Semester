<div>
    <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button"
                        class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                    <p>Step 1</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button"
                        class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                    <p>Step 2</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button"
                        class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}">3</a>
                    <p>Step 3</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-4" type="button"
                        class="btn btn-circle {{ $currentStep != 4 ? 'btn-default' : 'btn-primary' }}">4</a>
                    <p>Step 4</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-5" type="button"
                        class="btn btn-circle {{ $currentStep != 5 ? 'btn-default' : 'btn-primary' }}"
                        disabled="disabled">5</a>
                    <p>Step 5</p>
                </div>
            </div>
        </div>
    <div>
    <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
        <div class="col md-3">
            <div class="col-md-12">
                <h3> Step 1</h3>

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
                        <label for="koordinator_id" class="col-md-4 col-form-label text-md-end">{{ __('Koordinator') }}</label>
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
                        <label for="kaprodi_id" class="col-md-4 col-form-label text-md-end">{{ __('Kaprodi') }}</label>
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

                <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                    type="button">Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
            <div class="col md-3">
                <div class="col-md-12">
                    <h3> Step 2</h3>

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

                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                        wire:click="secondStepSubmit">Next</button>
                    <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                        wire:click="back(1)">Back</button>
                </div>
            </div>
    </div>
    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
            <div class="col md-3">
                <div class="col-md-12">
                    <h3> Step 3</h3>

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

                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                        wire:click="thirdthStepSubmit">Next</button>
                    <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                        wire:click="back(1)">Back</button>
                </div>
            </div>
    </div>
    <div class="row setup-content {{ $currentStep != 4 ? 'displayNone' : '' }}" id="step-4">
            <div class="col md-3">
                <div class="col-md-12">
                    <h3> Step 4</h3>
                    <div>
                        <button type="button" wire:click="addPertemuan" class="btn btn-primary">Input Pertemuan</button>
                        <div class="card">
                            <div class="card-body">
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
                            </div>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                        wire:click="fourthStepSubmit">Next</button>
                    <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                        wire:click="back(1)">Back</button>
                </div>
            </div>
    </div>
    <div class="row setup-content {{ $currentStep != 5 ? 'displayNone' : '' }}" id="step-5">
            <div class="col md-3">
                <div class="col-md-12">
                    <h3><strong>Rencana Pembelajaran Semester</strong></h3>
                    <div class="container">
                        <h5>Detail</h5>
                        <table class="table table-bordered">
                            <tr>
                                <td>Matakuliah</td>
                                <td><strong>{{$matakuliah_id}}</strong></td>
                            </tr>
                            <tr>
                                <td>Pengembang RP</td>
                                <td><strong>{{$pengembang_id}}</strong></td>
                            </tr>
                            <tr>
                                <td>Koordinator</td>
                                <td><strong>{{$koordinator_id}}</strong></td>
                            </tr>
                            <tr>
                                <td>Kaprodi</td>
                                <td><strong>{{$kaprodi_id}}</strong></td>
                            </tr>
                            <tr>
                                <td>Capaian Pembelajaran</td>
                                <td><strong>{{$deskripsi_singkat}}</strong></td>
                            </tr>
                            <tr>
                                <td>Media Pembelajaran (Hardware)</td>
                                <td><strong>{{$mp_hardware}}</strong></td>
                            </tr>
                            <tr>
                                <td>Media Pembeajaran (Software)</td>
                                <td><strong>{{$mp_software}}</strong></td>
                            </tr>
                            <tr>
                                <td>Dosen Pengampu</td>
                                <td><strong>{{$pengampu_id}}</strong></td>
                            </tr>
                            <tr>
                                <td>Matakuliah Syarat</td>
                                <td><strong>{{$matakuliah_syarat_id}}</strong></td>
                            </tr>
                        </table>
                        <br>
                    
                        <div class="row">
                            <table class="table table-bordered">
                                <h5>Pustaka</h5>
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Sumber</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $jenis }}</td>
                                        <td>{{ $sumber }}, </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <div class="row">
                            <table class="table table-bordered">
                                <h5>Pertemuan</h5>
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">MINGGU-KE</th>
                                        <th scope="col">KEMAMPUAN AKHIR YANG DIHARAPKAN</th>
                                        <th scope="col">BAHAN KAJIAN (MATERI PEMBELAJARAN)</th>
                                        <th scope="col">METODE PEMBELAJARAN</th>
                                        <th scope="col">WAKTU</th>
                                        <th scope="col">PENGALAMAN BELAJAR MAHASISWA</th>
                                        <th scope="col">BOBOT NILAI (%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pertemuan as $post)
                                    <tr>
                                        <td>{{ $post['minggu_ke'] }}</td>
                                        <td>{{ $post['kemampuan_akhir'] }}</td>
                                        <td>{{ $post['bahan_kajian'] }}</td>
                                        <td>{{ $post['metode_pembelajaran'] }}</td>
                                        <td>{{ $post['waktu'] }}*50</td>
                                        <td>{{ $post['pengalaman_belajar'] }}</td>
                                        <td>{{ $post['bobot_nilai'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <button class="btn btn-success btn-lg pull-right" wire:click="store" type="button">Finish and print the PDF!</button>
                    <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                        wire:click="back(2)">Back</button>
                </div>
            </div>
    </div>
    <script>
    $(document).ready(function() {
        $(".btn-primary").click(function() {
            // var $step = $(this).closest(".stepwizard-step");
            // var nextStepId = $step.next().find("a").attr("href");
            // $step.removeClass("btn-primary").addClass("btn-default");
            // $step.next().removeClass("btn-default").addClass("btn-primary");
            // $($step.attr("href")).hide();
            // $(nextStepId).show();
            // alert("test");
        });
    });
</script>
</div>