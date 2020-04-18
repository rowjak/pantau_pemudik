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
                        <form action="{{route('transit.update',[$transit->kd_transit])}}" method="post">
                            {{ method_field('put') }}
                            @csrf
                            @include('layouts.error')
                            <div class="form-group float-label mb-2 ">
                                <input type="text" name="tempat_transit" id="tempat_transit" class="form-control" autofocus value="{{$transit->tempat_transit}}">
                                <label for="tempat_transit" class="form-control-label">Tempat Transit</label>
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
