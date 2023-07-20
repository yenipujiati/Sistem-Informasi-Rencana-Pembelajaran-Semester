<div class="header">
    <table>
        <tr>
        <td style="padding-right: 10px;">
            <center>
                @php
                    $imagePath = public_path('images/ukrim.jpg');
                    $imageData = base64_encode(file_get_contents($imagePath));
                    $imageSrc = 'data:image/jpeg;base64,' . $imageData;
                    @endphp
                    <img src="{{ $imageSrc }}" width="130" style="display:block; margin:auto;">
            </center>
        </td>
        <td>
            <center>
                <h1>UNIVERSITAS KRISTEN IMMANUEL (UKRIM)</h1> 
                <p>Jl. Solo Km 11.1 Purwomartani, Kalasan, Kabupaten, Sleman, Daerah Istimewa Yogyakarta (DIY)</p> 
                <p>Telp (0274) 496256, Fax: (0274) 496423, <a href="http://www.ukrim.ac.id">www.ukrim.ac.id</a></p> 
                <p> email: <a href="mailto:humas@ukrimuniversity.ac.id">humas@ukrimuniversity.ac.id</a></p> 
            </center>
        </td>
        </tr>
        <tr>
        <td colspan="2">
            <center>
            <h3><strong>RENCANA PEMBELAJARAN SEMESTER (RPS) <br> PROGRAM STUDI SARJANA INFORMATIKA</strong></h3>
            </center>
        </td>
        </tr>
    </table>
</div>

<div class="footer">
    <table>
        <tr>
            <td>
                <center>
                    <p style="color: blue">
                        DOKUMEN SISTEM MUTU <br>
                        UNIVERSITAS KRISTEN IMMANUEL YOGYAKARTA
                    </p>
                </center>
            </td>
            <td>
                <center>
                    <p>
                        <span style="color: red;">Tidak diperkenankan</span> dengan cara apapun dan alasan apapun membuat
                        salinan tanpa seijin Ketua Lembaga Penjamin Mutu Internal
                    </p>
                </center>
            </td>
        </tr>
    </table>
</div>

        <div class="content">
            <div class="container">
                <table class="table table-bordered">
                    <colgroup>
                        {{-- <col style="width: 15%">
                        <col style="width: 15%">
                        <col style="width: 15%">
                        <col style="width: 15%">
                        <col style="width: 15%">
                        <col style="width: 25%"> --}}
                    </colgroup>
                    <tr>
                        <th><strong>Matakuliah</strong></th>
                        <th><strong>Kode</strong></th>
                        <th colspan="2"><strong>Rumpun MK</strong></th>
                        <th colspan="1"><strong>Bobot</strong></th>
                        <th colspan="1"><strong>Semester</strong></th>
                        <th colspan="3"><strong>Tanggal Penyusunan</strong></th>
                    </tr>
                    <tr>
                        <td>{{ $data['matakuliah']['nama'] }}</td>
                        <td>{{ $data['matakuliah']['kode'] }}</td>
                        <td colspan="2">{{ $datajoin->nama }}</td>
                        <td colspan="1">{{ $data['matakuliah']['bobot'] }}</td>
                        <td colspan="1">{{ $data['matakuliah']['semester'] }}</td>
                        <td colspan="3">{{ $datajoin->created_date }}</td>
                    </tr>
                    <tr>
                        <th rowspan="2"><h5>Otorisasi</h5></th>
                        <th><strong>Pengembang RP</strong></th>
                        <th colspan="2"><strong>Koordinator Rumpun MK</strong></th>
                        <th colspan="5"><strong>Ketua Program Studi</strong></th>
                    </tr>
                    <tr>
                        <td>{{ $data['pengembang']['name'] }}</td>
                        <td colspan="2">{{ $data['koordinator']['name'] ?? '-' }}</td>
                        <td colspan="5">{{ $data['kaprodi']['name'] }}</td>
                    </tr>
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
                        <th rowspan="{{ count($data['cpls'])+2 }}"><h5>Capaian Pembelajaran</h5></th>
                        @endif
                        <td>{{ $cpl['kode'] }}</td>
                        <td colspan="7">{{ $cpl['deskripsi'] }}</td>
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
                        <th rowspan="2">Pustaka</th>
                        <th><strong>Jenis</strong></th>
                        <td colspan="7">{{ $data['pustaka']['jenis'] }}</td>
                    </tr>
                    <tr>
                        <th><strong>Sumber</strong></th>
                        <td colspan="7">{{ $data['pustaka']['sumber'] }}</td>
                    </tr>
                    <tr>
                        <th rowspan="2">Media Pembelajaran</th>
                        <th colspan="4"><strong>Hardware</strong></th>
                        <td colspan="4"><strong>Software</strong></td>
                    </tr>
                    <tr>
                        <th colspan="4">{{ $data['mp_hardware'] }}</th>
                        <td colspan="4">{{ $data['mp_software'] }}</td>
                    </tr>
                    <tr>
                        <th><strong>Dosen Pengampu</strong></th>
                        <td colspan="8">{{ $data['pengampu']['name'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th><strong>Matakuliah Syarat</strong></th>
                        <td colspan="8">{{ $data['matakuliah_syarat']['nama'] ?? '-' }}</td>
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
                    <tbody>
                        @foreach($data['pertemuan'] as $post)
                            @if($post['istest'] == "UTS" || $post['istest'] == "UAS")
                                    <tbody>
                                        <tr>
                                            <td>{{ $post['minggu_ke'] }}</td>
                                            <td colspan="6">
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
                    </tbody>
                </table>
            </div>
        </div>
<style>
    @page {
        margin-top: 10px;
        margin-bottom: 10px;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid black;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    th[colspan], td[colspan] {
        border-right: 1px solid black;
    }

    th:last-child, td:last-child {
        border-right: 1px solid black;
    }

    tr:last-child th, tr:last-child td {
        border-bottom: 1px solid black;
    }
    
    .text {
        display: inline-block;
        vertical-align: middle;
        margin-left: 10px;
    }

    .line {
        border-top: 1px solid black;
        margin: 20px 0;
    }

    .header {
        position: fixed;
        top: 0;
        width: 100%;
    }

    .header table {
        width: 100%;
    }

    .header td {
        padding: 5px;
    }

    .header h1, .header p {
        margin: 0;
    }

    body {
        margin-top: 250px; /* Adjust the top margin as needed */
        margin-bottom: 70px; /* Adjust the bottom margin as needed */
    }


    .content {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: calc(100vh - 460px); /* Adjust as needed */
    }

    .footer {
        position: fixed;
        bottom: 0;
        width: 100%;
    }

    .footer table {
        width: 100%;
    }

    .footer td {
        padding: 5px;
    }

    .footer p {
        margin: 0;
    }

    .otorisasi-header {
        position: relative;
    }

    .pengembang-rp {
        position: absolute;
        left: 0;
        width: 50%; /* You can adjust this value based on your needs */
    }

    .kode-content {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        visibility: visible;
    }
</style>