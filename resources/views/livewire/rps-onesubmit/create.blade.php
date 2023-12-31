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
                            <input id="pengembang_id" type="text" class="form-control @error('pengembang_id') is-invalid @enderror" name="pengembang_id" value="{{ $user2->name }}" readonly>
                            <input type="hidden" name="pengembang_id" value="{{ $pengembang_id }}">
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
                        <label for="cp_mk" class="col-md-4 col-form-label text-md-end">{{ __('Capaian Pembelajaran Matakuliah') }}</label>
                        <textarea id="cp_mk" type="text" class="form-control @error('cp_mk') is-invalid @enderror" name="cp_mk" required autocomplete="cp_mk" cols="30" rows="10" wire:model.defer="cp_mk"></textarea>
                        @error('cp_mk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cpl_id" class="col-md-4 col-form-label text-md-end">{{ __('Capaian Pembelajaran Program Studi') }}</label><br>
                        <div class="col-md-max col-form-label"><br>
                            @php
                                $categories = [
                                    1 => 'CPL-S',
                                    3 => 'CPL-PP',
                                    6 => 'CPL-KK',
                                    7 => 'CPL-KU',
                                ];

                                $groupedItems = $cpl->groupBy('kategori_id');
                            @endphp
                            @foreach ($categories as $categoryId => $categoryLabel)
                                @if ($groupedItems->has($categoryId))
                                    <div>
                                        <label for="{{ $categoryLabel }}">{{ $categoryLabel }}</label>
                                    </div>
                                    
                                    @foreach ($groupedItems[$categoryId] as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="cpl_id[]" value="{{ $item->id }}" id="cpl_id" wire:model.defer="cpl_id">
                                            <label class="form-check-label" for="cpl_{{ $item->id }}">
                                                {{ $item->kode }}-{{ $item->deskripsi }}
                                            </label>
                                        </div>
                                    @endforeach

                                    <br>
                                @endif
                            @endforeach
                            @error('cpl_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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
                        <textarea id="sumber" type="text" class="form-control @error('sumber') is-invalid @enderror" name="sumber" autocomplete="sumber" cols="30" rows="10" wire:model.defer="sumber"></textarea>
                        @error('sumber')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                        wire:click="thirdthStepSubmit">Next</button>
                    <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                        wire:click="back(2)">Back</button>
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
                                            <select id="istest" class="form-control @error('istest') is-invalid @enderror" name="istest" required wire:model.defer="pertemuan.{{$index}}.istest">
                                                <option selected>Apakah sedang minggu ujian?</option>
                                                <option value="UTS">UTS</option>
                                                <option value="UAS">UAS</option>
                                                <option value="Bukan minggu ujian">Bukan minggu ujian</option>
                                            </select>
                                            @error('istest')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
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
                                            <textarea id="kemampuan_akhir" type="text" class="form-control @error('kemampuan_akhir') is-invalid @enderror" name="kemampuan_akhir" autocomplete="kemampuan_akhir" cols="30" rows="10" wire:model.defer="pertemuan.{{$index}}.kemampuan_akhir"></textarea>
                                            @error('kemampuan_akhir')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="bahan_kajian" class="col-md-4 col-form-label text-md-end">{{ __('Bahan Kajian') }}</label>
                                            <input id="bahan_kajian" type="text" class="form-control @error('bahan_kajian') is-invalid @enderror" name="bahan_kajian" autocomplete="bahan_kajian" wire:model.defer="pertemuan.{{$index}}.bahan_kajian">
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
                                            <input id="waktu" type="number" class="form-control @error('waktu') is-invalid @enderror" name="waktu" autocomplete="waktu" wire:model.defer="pertemuan.{{$index}}.waktu">
                                            @error('waktu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="pengalaman_belajar" class="col-md-4 col-form-label text-md-end">{{ __('Pengalaman Belajar Mahasiswa') }}</label>
                                            <textarea id="pengalaman_belajar" type="text" class="form-control @error('pengalaman_belajar') is-invalid @enderror" name="pengalaman_belajar" autocomplete="pengalaman_belajar" cols="30" rows="10" wire:model.defer="pertemuan.{{$index}}.pengalaman_belajar"></textarea>
                                            @error('pengalaman_belajar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="bobot_nilai" class="col-md-4 col-form-label text-md-end">{{ __('Bobot Nilai (%)') }}</label>
                                            <input id="bobot_nilai" type="number" class="form-control @error('bobot_nilai') is-invalid @enderror" name="bobot_nilai" autocomplete="bobot_nilai" wire:model.defer="pertemuan.{{$index}}.bobot_nilai">
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
                        wire:click="back(3)">Back</button>
                </div>
            </div>
    </div>
    <div class="row setup-content {{ $currentStep != 5 ? 'displayNone' : '' }}" id="step-5">
            <div class="col md-3">
                <div class="col-md-12">
                    <div class="container">
                        <br>
                        <center>
                            <h1>Important Announcement</h1>
                            <div class="line"></div>
                            <div class="announcement">
                                <!-- <h2>Important Announcement</h2> -->
                                <h2>Please click "Finish and print PDF" button to finish your work. </h2>
                                <h2>And please press the "Back" button to check your work again.</h2>
                            </div>
                        </div>
                        </center>
                        <br>
                        <center>
                            <!-- <button class="btn btn-success btn-lg" wire:click="store" type="button">Finish and print the PDF!</button> -->
                            <button class="btn btn-danger nextBtn btn-lg" type="button"
                                wire:click="back(4)">Back</button>
                            <button class="btn btn-success btn-lg" wire:click="store" type="button">Finish</button>
                        </center>
                    
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    // $(document).ready(function() {
    //     $(document).on('change', '#istest', function() {
    //         if ($(this).val() === "UTS" || $(this).val() === "UAS") {
    //             // Disable elements when 'UTS' or 'UAS' is selected
    //             $('#pertemuan-container :input, #pertemuan-container option').prop('readonly', true);
    //             $('#metode_pembelajaran, #topik_id').prop('disabled', true);
    //             $('#pertemuan-container').val('');
    //         } else if ($(this).val() === "Bukan minggu ujian") {
    //             // Enable elements when other options are selected
    //             $('#pertemuan-container :input').prop('readonly', false);
    //             $('#metode_pembelajaran, #topik_id').prop('disabled', false);
    //         }
    //     });

    //     // Listen for changes in the wire:model.defer binding
    //     $(document).on('change', 'select[name^="pertemuan."]', function() {
    //         var index = $(this).attr('name').match(/\d+/)[0]; // Extract the index from the name attribute
    //         var selectedValue = $(this).val(); // Get the selected value

    //         // Check if the selected value is set
    //         if (selectedValue) {
    //             // Enable the elements with the same index as the selected value
    //             $('input[name="pertemuan.' + index + '.istest"]').prop('disabled', false);
    //         } else {
    //             // Disable the elements with the same index as the selected value
    //             $('input[name="pertemuan.' + index + '.istest"]').prop('disabled', true);
    //         }
    //     });
    // });
</script>
</div>
<style>
    .line {
        border-top: 1px solid black;
        margin: 20px 0;
    }
    .disabled {
    opacity: 0.5;
    pointer-events: none;
    }
</style>