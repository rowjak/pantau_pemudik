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
                    <p class="mt-3 mb-2">Pemudik</p>
                    <h5 class="font-weight-normal mb-0">{{Auth::guard('pemudik')->user()->nik}}</h5>
                    <p class="my-0 text-secondary text-mute">{{Auth::guard('pemudik')->user()->nama}}</p>
                </div>
            </div>
        </div>
        <div class="container mt-0 mb-5">
            <h4>List Data Yang Dilaporkan</h4>
            <a href="{{route('laporkan')}}" class="btn btn-success text-white mb-4">Tambah Data</a>
            <div class="row">
                <div class="col-12">
                    <table id="tableProfile" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr class="table-warning">
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Usia</th>
                                <th>Hubungan Kekerabatan</th>
                                <th>Pekerjaan</th>
                                <th>Laporan Harian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemudik as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->nik}}</td>
                                    <td>{{$row->nama}}</td>
                                    <td>{{$row->jenis_kelamin}}</td>
                                    <td>{{$row->alamat}}</td>
                                    <td>{{$row->usia}} Tahun</td>
                                    <td>{{$row->hub_kekerabatan}}</td>
                                    <td>{{$row->pekerjaan}}</td>
                                    <td><a href="{{route('screening',[$row->kd_pemudik])}}" class="btn btn-primary text-white">Isi Laporan</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <h4>Statistik Kesehatan Harian</h4>

        </div>
        <!-- page content ends -->
@endsection
