<div>
    <div class="col md-3">
        <div class="col-md-12">
            <div class="container">
                <br>
                <button wire:click="printPDF" class="btn btn-md btn-success mb-3">Print PDF</button>
                <table class="table table-bordered">
                    <colgroup>
                        <col style="width: 15%">
                        <col style="width: 15%">
                        <col style="width: 15%">
                        <col style="width: 15%">
                        <col style="width: 15%">
                        <col style="width: 25%">
                    </colgroup>
                    <tr>
                        <td colspan="9">
                            <center>
                                <h3><strong>Rencana Pembelajaran Semester {{ $data['matakuliah']->nama }}</strong></h3>
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <th><strong>Matakuliah</strong></th>
                        <th colspan="2"><strong>Kode</strong></th>
                        <th colspan="2"><strong>Rumpun MK</strong></th>
                        <th colspan="1"><strong>Bobot</strong></th>
                        <th colspan="1"><strong>Semester</strong></th>
                        <th colspan="2"><strong>Tanggal Penyusunan</strong></th>
                    </tr>
                    <tr>
                        <td>{{ $data['matakuliah']->nama }}</td>
                        <td colspan="2">{{ $data['matakuliah']->kode }}</td>
                        <td colspan="2">{{ $datas->nama }}</td>
                        <td colspan="1">{{ $data['matakuliah']->bobot }}</td>
                        <td colspan="1">{{ $data['matakuliah']->semester }}</td>
                        <td colspan="2">{{ $datas->created_date }}</td>
                    </tr>
                    <tr>
                        <th rowspan="2"><strong>Otorisasi</strong></th>
                        <th colspan="2"><strong>Pengembang RP</strong></th>
                        <th colspan="2"><strong>Koordinator Rumpun MK</strong></th>
                        <th colspan="4"><strong>Ketua Program Studi</strong></th>
                    </tr>
                    <tr>
                        <td colspan="2">{{ $data['pengembang']->name }}</td>
                        <td colspan="2">{{ $data['koordinator']->name }}</td>
                        <td colspan="4">{{ $data['kaprodi']->name }}</td>
                    </tr>
                    {{-- <tr>
                        <th rowspan="{{ count($data['cpls'])+1 }}"><strong>Capaian Pembelajaran</strong></th>
                        @foreach ($data['cpls'] as $cpl)
                        <tr>
                            <td colspan="2">{{ $cpl->kode }}</td>
                            <td colspan="6">{{ $cpl->deskripsi }}</td>
                        </tr>
                        @endforeach
                    </tr> --}}
                     {{-- <tr>
                        <th rowspan="{{ count($data['cpls'])+1 }}"><h5>Capaian Pembelajaran</h5></th>
                        <th colspan="8"></th>
                    </tr> --}}
                    @php
                      $isFirst = true;
                    @endphp
                    @foreach ($data['cpls'] as $cpl)
                    
                    <tr>
                        @if($isFirst)
                        <th rowspan="{{ count($data['cpls'])+2 }}"><strong>Capaian Pembelajaran</strong></th>
                        @endif
                        <td colspan="2">{{ $cpl['kode'] }}</td>
                        <td colspan="6">{{ $cpl['deskripsi'] }}</td>
                    </tr>
                    @php
                    $isFirst = false;
                  @endphp
                    @endforeach
                    <tr>
                        <th colspan="8"><strong>CP-MK</strong></th>
                        <tr>
                            <th colspan="8">{{ $data['cp_mk'] ? $data['cp_mk'] : '-' }}</th>
                        </tr>
                    </tr>
                    <tr>
                        <th><strong>Deskripsi Singkat</strong></th>
                        <td colspan="8">{{ $data['deskripsi_singkat'] }}</td>
                    </tr>
                    <tr>
                        <th rowspan="2"><strong>Pustaka</strong></th>
                        <th colspan="2"><strong>Jenis</strong></th>
                        <td colspan="6">{{ $data['pustaka']->jenis }}</td>
                    </tr>
                    <tr>
                        <th colspan="2"><strong>Sumber</strong></th>
                        <td colspan="6">{{ $data['pustaka']->sumber }}</td>
                    </tr>
                    <tr>
                        <th rowspan="2"><strong>Media Pembelajaran</strong></th>
                        <th colspan="4"><strong>Hardware</strong></th>
                        <td colspan="4"><strong>Software</strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">{{ $data['mp_hardware'] }}</th>
                        <td colspan="4">{{ $data['mp_software'] }}</td>
                    </tr>
                    <tr>
                        <th><strong>Dosen Pengampu</strong></th>
                        <td colspan="8">{{ $data['pengampu']->name }}</td>
                    </tr>
                    <tr>
                        <th><strong>Matakuliah Syarat</strong></th>
                        <td colspan="8">{{ $data['matakuliah_syarat'] ? $data['matakuliah_syarat']->nama : '-' }}</td>
                    </tr>
                </table>
            </div>
            <br>
            <div>
                <table class="table table-bordered">
                    <colgroup>
                        <col style="width: 10%">
                        <col style="width: 20%">
                        <col style="width: 20%">
                        <col style="width: 15%">
                        <col style="width: 10%">
                        <col style="width: 15%">
                        <col style="width: 10%">
                    </colgroup>
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
                        @foreach($data['pertemuan'] as $post)
                            @if($post['istest'] == "UTS" || $post['istest'] == "UAS")
                                <tbody>
                                    <tr>
                                        <td>{{ $post['minggu_ke'] }}</td>
                                        <td colspan="8">
                                            <center>
                                                {{ $post['istest'] }}
                                            </center>
                                        </td>
                                    </tr>
                                </tbody> 
                            @else
                                <tbody>
                                    <tr>
                                        <td>{{ $post['minggu_ke'] }}</td>
                                        <td>{{ $post['kemampuan_akhir'] }}</td>
                                        <td>{{ $post['bahan_kajian'] }}</td>
                                        <td>{{ $post['metode_pembelajaran'] }}</td>
                                        <td>{{ $post['waktu'] }}*50</td>
                                        <td>{{ $post['pengalaman_belajar'] }}</td>
                                        <td>{{ $post['bobot_nilai'] }}</td>
                                    </tr>
                                </tbody>
                            @endif
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
