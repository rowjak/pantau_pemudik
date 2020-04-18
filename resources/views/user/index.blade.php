@extends('layouts.template')
@section('meta')
    @include('meta::manager', [
        'title'         => 'Sistem Informasi Pemantauan Mudik Wilayah Kabupaten Batang',
        'description'   => 'This is my example description',
        'image'         => asset('theme/images/logo.png'),
    ])
@endsection
@section('content')
        <!-- page content here -->
        <div class="container-fluid bg-template">
            <div class="row hn-114 position-relative">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <figure class="avatar avatar-120 top-30 position-relative">
                        <img src="{{asset('')}}theme/images/avatar.jpeg" alt="">
                    </figure>
                </div>
                <div class="col pl-0">
                    <p class="mt-3 mb-2">Administrator</p>
                    <h5 class="font-weight-normal mb-0">Master</h5>
                    <p class="my-0 text-secondary text-mute">Manajemen User</p>
                </div>
            </div>
        </div>
        <div class="container mt-0 mb-5">
            @include('layouts.success')
            <hr>
            <a href="{{route('user.create')}}" class="btn btn-success text-white mb-4">Tambah Data</a>
            <div class="row">
                <div class="col-12">
                    <table id="tableUser" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr class="table-warning">
                                <th>No</th>
                                <th>Username</th>
                                <th>Kecamatan</th>
                                <th>Desa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- page content ends -->
@endsection
