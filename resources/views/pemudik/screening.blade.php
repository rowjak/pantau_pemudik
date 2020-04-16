@extends('layouts.templateform')
@section('meta')
    @include('meta::manager', [
        'title'         => 'Sistem Informasi Pemantauan Mudik Wilayah Kabupaten Batang',
        'description'   => 'This is my example description',
        'image'         => asset('theme/images/logo.png'),
    ])
@endsection
@section('content')
        <!-- page content here -->
        <div class="row flex-colum">
            <div class="col-12 col-md-6 col-lg-5 mx-auto login-row">
                <div class="row h-100">
                    <div class="col-12 align-self-center">
                        <h1 class="font-weight-light mb-5 text-center"><small class="font-weight-light">Laporan Harian</small></h1>
                        <form action="{{route('storeScreening',[$pemudik->kd_pemudik])}}" method="post">
                            @csrf
                            {{method_field('PUT')}}
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="2">#</th>
                                        <th scope="col">Pertanyaan</th>
                                        <th scope="col">Ya</th>
                                        <th scope="col">Tidak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="2"><b>A</b></td>
                                        <td><b>Riwayat Perjalanan</b></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>1</td>
                                        <td>Apakah dalam 14 hari pernah berkunjung/tinggal di daerah corona menyebar?</td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_satu" value="1" required></div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_satu" value="0" required></div></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>2</td>
                                        <td>Apakah pernah kontak dengan pasien positif corona?</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_dua" value="1" required></div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_dua" value="0" required></div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>B</b></td>
                                        <td><b>Kondisi Kesehatan</b></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>1</td>
                                        <td>Batuk</td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_tiga" value="1" required></div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_tiga" value="0" required></div></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>2</td>
                                        <td>Meriang</td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_empat" value="1" required></div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_empat" value="0" required></div></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>3</td>
                                        <td>Diare</td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_lima" value="1" required></div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_lima" value="0" required></div></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>4</td>
                                        <td>Sakit Tenggorokan</td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_enam" value="1" required></div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_enam" value="0" required></div></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>5</td>
                                        <td>Nyeri di seluruh tubuh</td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_tujuh" value="1" required></div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_tujuh" value="0" required></div></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>6</td>
                                        <td>Sakit Kepala</td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_delapan" value="1" required></div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_delapan" value="0" required></div></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>7</td>
                                        <td>Demam di atas suhu 38C</td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_sembilan" value="1" required></div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_sembilan" value="0" required></div></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>8</td>
                                        <td>Kesulitan Bernafas/Sesak</td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_sepuluh" value="1" required></div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_sepuluh" value="0" required></div></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>9</td>
                                        <td>Lemas/Lesu</td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_sebelas" value="1" required></div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_sebelas" value="0" required></div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>C</b></td>
                                        <td><b>Riwayat Sakit</b></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>1</td>
                                        <td>Gangguan pernapasan kronis</td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_duabelas" value="1" required></div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_duabelas" value="0" required>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>2</td>
                                        <td>Jantung, Stroke, Darah Tinggi</td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_tigabelas" value="1" required></div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_tigabelas" value="0" required>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>3</td>
                                        <td>Diabetes</td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_empatbelas" value="1" required></div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_empatbelas" value="0" required>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>4</td>
                                        <td>Penyakit ginjal</td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_limabelas" value="1" required></div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_limabelas" value="0" required>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>5</td>
                                        <td>Kanker</td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_enambelas" value="1" required></div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="k_enambelas" value="0" required>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                    </div>
                        <hr>
                </div>
            </div>
        </div>
        <div class="w-100"></div>
        <div class="col-12 mt-auto pb-4 col-md-6 col-lg-5 mx-auto login-footer">
            <button type="submit" class="btn btn-lg btn-block btn-default text-uppercase position-relative"><span>Simpan</span><i class="material-icons right-absoute">arrow_forward</i></button>
                    </form>
        </div>
        <!-- page content ends -->
@endsection
