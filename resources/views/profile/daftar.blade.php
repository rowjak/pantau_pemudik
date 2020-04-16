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
                        <h1 class="font-weight-light mb-5 text-center"><small class="font-weight-light">Selamat Datang</small>,<br><span class="text-mute">Silahkan Isi Biodata Anda</span></h1>
                        <form class="form-admin" action="{{route('storeDaftar')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="border-bottom">Data Perjalanan</h6>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="provinsi_asal">Provinsi Asal</label>
                                <select class="form-control select2" id="provinsi_asal" name="provinsi_asal">
                                    <option value="" selected disabled>Pilih Provinsi Asal</option>
                                    @foreach ($provinsi as $row)
                                        <option value="{{$row->kd_provinsi}}">{{$row->nama_provinsi}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="kabupaten_asal">Kabupaten Asal</label>
                                <select class="form-control select2" id="kabupaten_asal" name="kabupaten_asal">
                                    <option value="" selected disabled>Pilih Kabupaten Asal</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="kecamatan_asal">Kecamatan Asal</label>
                                <select class="form-control select2" id="kecamatan_asal" name="kecamatan_asal">
                                    <option value="" selected disabled>Pilih Kecamatan Asal</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="desa_asal">Desa/Kelurahan Asal</label>
                                <select class="form-control select2" id="desa_asal" name="desa_asal">
                                    <option value="" selected disabled>Pilih Desa/Kelurahan Asal</option>
                                </select>
                            </div>
                            <hr>
                            <div class="form-group mb-2">
                                <label for="provinsi_tujuan">Provinsi Tujuan</label>
                                <select class="form-control select2" id="provinsi_tujuan" name="provinsi_tujuan">
                                    <option value="" selected disabled>Pilih Provinsi Tujuan</option>
                                    @foreach ($provinsi as $row)
                                        <option value="{{$row->kd_provinsi}}">{{$row->nama_provinsi}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="kabupaten_tujuan">Kabupaten Tujuan</label>
                                <select class="form-control select2" id="kabupaten_tujuan" name="kabupaten_tujuan">
                                    <option value="" selected disabled>Pilih Kabupaten Tujuan</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="kecamatan_tujuan">Kecamatan Tujuan</label>
                                <select class="form-control select2" id="kecamatan_tujuan" name="kecamatan_tujuan">
                                    <option value="" selected disabled>Pilih Kecamatan Tujuan</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="desa_tujuan">Desa/Kelurahan Tujuan</label>
                                <select class="form-control select2" id="desa_tujuan" name="desa_tujuan">
                                    <option value="" selected disabled>Pilih Desa/Kelurahan Tujuan</option>
                                </select>
                            </div>
                            <hr>
                            <div class="form-group mb-2">
                                <label for="transportasi">Media Transportasi</label>
                                <select class="form-control select2" id="transportasi" name="transportasi">
                                    <option value="" selected disabled>Pilih Media Transportasi</option>
                                    @foreach ($transportasi as $row)
                                        <option value="{{$row->kd_transportasi}}">{{$row->nama_kendaraan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group float-label datepicker-label">
                                <input type="text" name="tgl_sampai" id="tgl_sampai" class="form-control datepicker" required>
                                <label for="tgl_sampai" class="form-control-label">Tanggal Perkiraan Sampai</label>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="border-bottom">Biodata</h6>
                                </div>
                            </div>
                            <div class="form-group float-label active mb-2">
                                <input type="text" name="no_hp" id="no_hp" class="form-control" required value="{{Session::get('no_hp')}}">
                                <label for="no_hp" class="form-control-label">Nomor HP</label>
                            </div>
                            <div class="form-group float-label mb-2">
                                <input type="text" name="nik" id="nik" class="form-control" required >
                                <label for="nik" class="form-control-label">NIK</label>
                            </div>
                            <div class="form-group float-label mb-2">
                                <input type="text" name="nama" id="nama" class="form-control" required >
                                <label for="nama" class="form-control-label">Nama Lengkap</label>
                            </div>
                            <div class="form-group mb-2">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control select2" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group float-label mb-2">
                                <input type="number" name="usia" id="usia" class="form-control" required >
                                <label for="usia" class="form-control-label">Usia</label>
                            </div>
                            <input type="hidden" name="hub_kekerabatan" value="-">
                            {{-- <div class="form-group mb-2">
                                <label for="hub_kekerabatan">Hubungan Kekerabatan</label>
                                <select class="form-control select2" id="hub_kekerabatan" name="hub_kekerabatan">
                                    <option value="" selected disabled>Pilih Hubungan Kekerabatan</option>
                                    <option value="Anak">Anak</option>
                                    <option value="Istri">Istri</option>
                                    <option value="Mertua">Mertua</option>
                                    <option value="Orangtua">Orangtua</option>
                                    <option value="Saudara Ipar">Saudara Ipar</option>
                                    <option value="Saudara Kandung">Saudara Kandung</option>
                                    <option value="Suami">Suami</option>
                                    <option value="Teman">Teman</option>
                                    <option value="Tetangga">Tetangga</option>
                                </select>
                            </div> --}}
                            <div class="form-group mb-2">
                                <label for="pekerjaan">Pekerjaan</label>
                                <select class="form-control select2" id="pekerjaan" name="pekerjaan">
                                    <option value="" selected disabled>Pilih Pekerjaan</option>
                                    <option value="Buruh">Buruh</option>
                                    <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                    <option value="PNS">PNS</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group float-label">
                                <input type="text" name="alamat" id="alamat" class="form-control" required >
                                <label for="alamat" class="form-control-label">Alamat Tinggal Dibatang</label>
                            </div>
                    </div>
                </div>
            </div>
            <div class="w-100"></div>
            <div class="col-12 mt-auto pb-4 col-md-6 col-lg-5 mx-auto login-footer">
                <button type="submit" class="btn btn-lg btn-block btn-default text-uppercase position-relative"><span>SIMPAN</span><i class="material-icons right-absoute">arrow_forward</i></button>
            </form>

            </div>
        </div>
        <!-- page content ends -->
@endsection
