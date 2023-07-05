<div>
            <div class="col md-3">
                <div class="col-md-12">
                    <h3><strong>Rencana Pembelajaran Semester</strong></h3>
                    <div class="container">
                        <h5>Detail</h5>
                        <table class="table table-bordered">
                            <tr>
                                <td>Matakuliah</td>
                                <td><strong>{{ $data['matakuliah_id'] }}</strong></td>
                            </tr>
                            <tr>
                                <td>Pengembang RP</td>
                                <td><strong>{{ $data['pengembang_id']}}</strong></td>
                            </tr>
                            <tr>
                                <td>Koordinator</td>
                                <td><strong>{{$data['koordinator_id'] }}</strong></td>
                            </tr>
                            <tr>
                                <td>Kaprodi</td>
                                <td><strong>{{$data['kaprodi_id'] }}</strong></td>
                            </tr>
                            <tr>
                                <td>Capaian Pembelajaran</td>
                                <td><strong>{{ $data['deskripsi_singkat'] }}</strong></td>
                            </tr>
                            <tr>
                                <td>Media Pembelajaran (Hardware)</td>
                                <td><strong>{{ $data['mp_hardware'] }}</strong></td>
                            </tr>
                            <tr>
                                <td>Media Pembeajaran (Software)</td>
                                <td><strong>{{ $data['mp_software'] }}</strong></td>
                            </tr>
                            <tr>
                                <td>Dosen Pengampu</td>
                                <td><strong>{{ $data['pengampu_id'] }}</strong></td>
                            </tr>
                            <tr>
                                <td>Matakuliah Syarat</td>
                                <td><strong>{{ $data['matakuliah_syarat_id'] }}</strong></td>
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
                                        <td>{{ $data['jenis'] }}</td>
                                        <td>{{ $data['sumber'] }}, </td>
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