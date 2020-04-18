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
                    <p class="my-0 text-secondary text-mute">Tempat Transit</p>
                </div>
            </div>
        </div>
        <div class="container mt-0 mb-5">
            @include('layouts.success')
            <hr>
            <a href="{{route('transit.create')}}" class="btn btn-success text-white mb-4">Tambah Data</a>
            <div class="row">
                <div class="col-12">
                    <table id="tableProfile" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr class="table-warning">
                                <th>No</th>
                                <th>Tempat Transit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transit as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->tempat_transit}}</td>
                                    <td>
                                        <form method="post" action="{{route('transit.destroy',[$row->kd_transit])}}" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                            @csrf
                                            {{method_field('delete')}}
                                            <a href="{{route('transit.edit',[$row->kd_transit])}}" class="btn btn-warning rounded text-white"><i class="material-icons">edit</i></a>
                                            <button type="submit" class="btn btn-danger rounded text-white"><i class="material-icons">delete</i></button>
                                        </form>
                                    </td>
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
