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
                    <p class="mt-3 mb-2">DESA</p>
                    <h5 class="font-weight-normal mb-0">DESA {{Auth::guard('admin')->user()->desa->nama_desa}}</h5>
                    <p class="my-0 text-secondary text-mute">KECAMATAN {{Auth::guard('admin')->user()->desa->kecamatan->nama_kecamatan}}</p>
                </div>
            </div>
        </div>
        <div class="container mt-0 mb-5">
            <h4>List Data Pemudik</h4>
            <a href="{{route('pemudik.daftar')}}" class="btn btn-success rounded text-white mb-4">Tambah Data Pemudik + Perjalanan</a>
            <a href="{{route('pemudik.create')}}" class="btn btn-warning rounded text-white mb-4">Tambah Data Pemudik</a>
            <div class="row">
                <div class="col-12">
                    <table id="tablePemudik" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr class="table-warning">
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>No. HP</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat Asal</th>
                                <th>Alamat Tujuan</th>
                                <th>Usia</th>
                                <th>Hubungan Kekerabatan</th>
                                <th>Pekerjaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <h4>Statistik Kesehatan Harian</h4>

        </div>
        <!-- page content ends -->
@endsection
