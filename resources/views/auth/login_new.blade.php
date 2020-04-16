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
                            <h1 class="font-weight-light mb-5 text-center"><small class="font-weight-light">Selamat Datang</small>,<br><span class="text-mute">Silahkan Login Untuk Akses Admin</span></h1>
                            <form class="form-admin" action="{{url('login_admin')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-auto align-self-center">
                                        <i class="material-icons text-mute mt-2">account_circle</i>
                                    </div>
                                    <div class="col pl-0">
                                        <div class="form-group float-label active">
                                            <input type="text" name="username" id="username" class="form-control" required autofocus value="">
                                            <label for="username" class="form-control-label">Username</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto align-self-center">
                                        <i class="material-icons text-mute mt-1">lock</i>
                                    </div>
                                    <div class="col pl-0">
                                        <div class="form-group float-label">
                                            <input type="password" name="password" id="password" class="form-control" required>
                                            <label for="password" class="form-control-label">Password</label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col-12 mt-auto pb-4 col-md-6 col-lg-5 mx-auto login-footer">
                    {{-- <a href="index.html" class="btn btn-lg btn-block btn-link text-secondary text-uppercase">Forgot Password?</a> --}}
                    {{-- <br> --}}
                    <button type="submit" class="btn btn-lg btn-block btn-default text-uppercase position-relative"><span>Login</span><i class="material-icons right-absoute">arrow_forward</i></button>
                </form>

                </div>
            </div>
        <!-- page content ends -->
@endsection
