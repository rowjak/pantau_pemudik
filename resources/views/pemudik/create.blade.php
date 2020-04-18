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
                        <form action="{{route('pemudik.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="border-bottom">Biodata</h6>
                                </div>
                            </div>
                            @include('layouts.error')
                            <div class="form-group float-label mb-2 active">
                                <input type="text" name="kd_perjalanan" id="kd_perjalanan" class="form-control" required>
                                <label for="kd_perjalanan" class="form-control-label">Kode Perjalanan</label>
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
                            <div class="form-group mb-2">
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
                            </div>
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
                            <div class="form-group mb-2">
                                <label for="kd_transit">Tempat Transit</label>
                                <select class="form-control select2" id="kd_transit" name="kd_transit">
                                    <option value="" selected disabled>Pilih Tempat Transit</option>
                                    @foreach ($transit as $row)
                                        <option value="{{$row->kd_transit}}">{{$row->tempat_transit}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="kd_kecamatan">Kecamatan</label>
                                <select class="form-control select2" id="kd_kecamatan" name="kd_kecamatan">
                                    <option value="" selected disabled>Pilih Kecamatan</option>
                                    @foreach ($kecamatan as $row)
                                        <option value="{{$row->kd_kecamatan}}">{{$row->nama_kecamatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="kd_desa">Desa</label>
                                <select class="form-control select2" id="kd_desa" name="kd_desa">
                                    <option value="" selected disabled>Pilih Desa</option>
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
