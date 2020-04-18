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
                        <h2 class="font-weight-light mb-5 text-center"><small class="font-weight-light">Selamat Datang</small>,<br><span class="text-mute">Form Tambah Data User Desa</span></h2>
                        <form action="{{route('user.store')}}" method="post">
                            @csrf
                            @include('layouts.error')
                            <div class="form-group float-label mb-2 ">
                                <input type="text" name="username" id="username" class="form-control" autofocus>
                                <label for="username" class="form-control-label">Username</label>
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
                            <div class="form-group float-label mb-2 ">
                                <input type="password" name="password" id="password" class="form-control" autofocus>
                                <label for="password" class="form-control-label">Password</label>
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
