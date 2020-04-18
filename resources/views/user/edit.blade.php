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
                        <h2 class="font-weight-light mb-5 text-center"><small class="font-weight-light">Selamat Datang</small>,<br><span class="text-mute">Form Ubah Data Tempat Transit</span></h2>
                        <form action="{{route('user.update',[$user->kd_admin])}}" method="post">
                            {{ method_field('put') }}
                            @csrf
                            @include('layouts.error')
                            <div class="form-group float-label mb-2 active">
                                <input type="text" name="username" id="username" class="form-control" value="{{$user->username}}">
                                <label for="username" class="form-control-label">Username</label>
                            </div>
                            <div class="form-group mb-2">
                                <label for="kd_kecamatan">Kecamatan</label>
                                <select class="form-control select2" id="kd_kecamatan" name="kd_kecamatan">
                                    @foreach ($kecamatan as $row)
                                        <option value="{{$row->kd_kecamatan}}" @if($user->desa->kecamatan->kd_kecamatan == $row->kd_kecamatan) selected @endif>{{$row->nama_kecamatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="kd_desa">Desa</label>
                                <select class="form-control select2" id="kd_desa" name="kd_desa">
                                    <option value="" selected disabled>Pilih Desa</option>
                                    @foreach ($desa as $row)
                                        <option value="{{$row->kd_desa}}" @if($user->kd_desa == $row->kd_desa) selected @endif>{{$row->nama_desa}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group float-label mb-2 ">
                                <input type="password" name="password" id="password" class="form-control">
                                <label for="password" class="form-control-label">Password</label>
                                <small>Jika Tidak Ingin Mengubah Password, Kosongkan Field Ini</small>
                            </div>

                    </div>
                </div>
            </div>
            <div class="w-100"></div>
            <div class="col-12 mt-auto pb-4 col-md-6 col-lg-5 mx-auto login-footer">
                <button type="submit" class="btn btn-lg btn-block btn-primary text-uppercase position-relative"><span>PERBARUI</span><i class="material-icons right-absoute">arrow_forward</i></button>
            </form>

            </div>
        </div>
        <!-- page content ends -->
@endsection
