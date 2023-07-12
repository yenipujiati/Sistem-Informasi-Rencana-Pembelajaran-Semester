<div class="header">
    <h1>UNIVERSITAS KRISTEN IMMANUEL</h1>
    <p>Jl. Solo Km 11,1, PO BOX 64/YKAP</p>
    <p>Telepon 0274-49626, Fax: 0274496423</p>
    <p><a href="http://www.ukrim.ac.id">www.ukrim.ac.id</a> email: <a href="mailto:humas@ukrimuniversity.ac.id">humas@ukrimuniversity.ac.id</a></p>
</div>
<div class="line"></div>
<div>
    <div class="col md-3">
        <div class="col-md-12">
            <h3><strong>Rencana Pembelajaran Semester</strong></h3>
            <div class="container">
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
                        <th><strong>Matakuliah</strong></th>
                        <th colspan="2"><strong>Kode</strong></th>
                        <th colspan="2"><strong>Rumpun MK</strong></th>
                        <th colspan="1"><strong>Bobot</strong></th>
                        <th colspan="1"><strong>Semester</strong></th>
                        <th colspan="2"><strong>Tanggal Penyusunan</strong></th>
                    </tr>
                    <tr>
                        <td>{{ $data['matakuliah']['nama'] }}</td>
                        <td colspan="2">{{ $data['matakuliah']['kode'] }}</td>
                        <td colspan="2">{{ $datajoin->nama }}</td>
                        <td colspan="1">{{ $data['matakuliah']['bobot'] }}</td>
                        <td colspan="1">{{ $data['matakuliah']['semester'] }}</td>
                        <td colspan="2">{{ $datajoin->created_date }}</td>
                    </tr>
                    <tr>
                        <th rowspan="2"><h5>Otorisasi</h5></th>
                        <th colspan="2"><strong>Pengembang RP</strong></th>
                        <th colspan="2"><strong>Koordinator Rumpun MK</strong></th>
                        <th colspan="4"><strong>Ketua Program Studi</strong></th>
                    </tr>
                    <tr>
                        <td colspan="2">{{ $data['pengembang']['name'] }}</td>
                        <td colspan="2">{{ $data['koordinator']['name'] }}</td>
                        <td colspan="4">{{ $data['kaprodi']['name'] }}</td>
                    </tr>
                    <tr>
                        <th rowspan="{{ count($data['cpls'])+1 }}"><h5>Capaian Pembelajaran</h5></th>
                        @foreach ($data['cpls'] as $cpl)
                        <tr>
                            <td colspan="2">{{ $cpl['kode'] }}</td>
                            <td colspan="6">{{ $cpl['deskripsi'] }}</td>
                        </tr>
                        @endforeach
                    </tr>
                    <tr>
                        <th><strong>Deskripsi Singkat</strong></th>
                        <td colspan="8">{{ $data['deskripsi_singkat'] }}</td>
                    </tr>
                    <tr>
                        <th rowspan="2">Pustaka</th>
                        <th colspan="2"><strong>Jenis</strong></th>
                        <td colspan="6">{{ $data['pustaka']['jenis'] }}</td>
                    </tr>
                    <tr>
                        <th colspan="2"><strong>Sumber</strong></th>
                        <td colspan="6">{{ $data['pustaka']['sumber'] }}</td>
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
                        <td colspan="8">{{ $data['pengampu']['name']}}</td>
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
    </div>
</div>
<style>
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

    .page-break {
        page-break-before: always;
    }

    .header {
        text-align: center;
        margin-bottom: 10px;
    }

    .header h1, .header p {
        margin: 5px 0;
    }

    .logo {
        display: inline-block;
        vertical-align: middle;
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
</style>