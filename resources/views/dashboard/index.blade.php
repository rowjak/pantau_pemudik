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
        <div class="container-fluid bg-template mb-4">
            <div class="row hn-290 position-relative">
                <div class="background opac heightset px-0 mx-0">
                    <img src="{{asset('')}}theme/images/alun-alun.jpg" alt="">
                </div>
                <div class="container align-self-end">
                    <h2 class="font-weight-light text-uppercase">Pantau Mudik</h2>
                    <p class="text-mute mb-2">Sistem Informasi Pemantauan Pemudik di Wilayah Kabupaten Batang</p>
                    @include('layouts.alert')
                    @if(Auth::guard('pemudik')->check() | Auth::guard('admin')->check())

                    @else
                    <form action="{{url('login')}}" method="post">
                        @csrf
                    <input type="text" name="no_hp" class="form-control form-control-lg search bottom-25 position-relative border-0" placeholder="No. HP, Contoh : 085741880658">
                    @endif
                </div>
            </div>
        </div>
        @if(Auth::guard('pemudik')->check() | Auth::guard('admin')->check())

        @else
        <div class="container">
            <br>
            <div class="row">
                <div class="col-12">
                    @include('layouts.error')
                    {!! htmlFormSnippet() !!}
                    <button type="submit" class="mt-2 btn btn-warning btn-block">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
        @endif

        {{-- <div class="container my-5">
            <div class="row mb-4">
                <div class="col text-uppercase">
                    <p class="text-mute mb-0">Berita Terbaru</p>
                    <h4 class="mb-0">Hari Ini, <small class="text-mute vm">23/12/2019</small></h4>
                </div>
                <div class="col-auto align-self-end">
                    <a href="#">Lihat Semua</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card mb-4 overflow-hidden bg-template">
                        <div class="overlay"></div>
                        <div class="background">
                            <img src="{{asset('')}}theme/images/woman-1852907_640%402x.png" alt="">
                        </div>
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col">
                                    <span class="tag">Trending</span>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-info btn-rounded-34"><i class="material-icons md-16">bookmark</i></button>
                                    <button class="btn btn-info btn-rounded-34 ml-2"><i class="material-icons md-16">share</i></button>
                                </div>
                            </div>
                            <br>
                            <a href="newsdetails.html" class="h4 mb-2 font-weight-normal">Best Discovery ever in UX</a>
                            <p class="text-mute mb-2">Lorem ipsum dolor sit amet, consect etur adipiscing elit. Sndisse conv allis.</p>
                            <div class="small mb-0">
                                <figure class="avatar avatar-20 mr-1"><img src="{{asset('')}}theme/images/beautiful-2150881_640%402x.png" alt=""> </figure>
                                Alessia Monks
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card mb-4 overflow-hidden bg-template">
                        <div class="overlay"></div>
                        <div class="background">
                            <img src="{{asset('')}}theme/images/turtle-863336_640%402x.png" alt="">
                        </div>
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col">
                                    <span class="tag">Trending</span>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-info btn-rounded-34"><i class="material-icons md-16">bookmark</i></button>
                                    <button class="btn btn-info btn-rounded-34 ml-2"><i class="material-icons md-16">share</i></button>
                                </div>
                            </div>
                            <br>
                            <a href="newsdetails.html" class="h4 mb-2 font-weight-normal">Engaging and interesting UI UX</a>
                            <p class="text-mute mb-2">Lorem ipsum dolor sit amet, consect etur adipiscing elit. Sndisse conv allis.</p>
                            <div class="small mb-0">
                                <figure class="avatar avatar-20 mr-1"><img src="{{asset('')}}theme/images/man-945482_640%402x.png" alt=""> </figure>
                                Fernandes John
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 mb-4">
                    <div class="row">
                        <div class="col-4">
                            <figure class="m-0 h-150 w-100 rounded overflow-hidden">
                                <div class="background">
                                    <img src="{{asset('')}}theme/images/joy-2483926_640%402x.png" alt="">
                                </div>
                            </figure>
                        </div>
                        <div class="col">
                            <a href="newsdetails.html" class="h4 mb-3 font-weight-normal">Awesome people create awesome things</a>
                            <p class="small text-mute">Lorem ipsum dolor sit amet, consect etur adipiscing elit. Sndisse conv allis. Lorem ipsum dolor sit amet.</p>
                            <a href="newsdetails.html" class="text-dark">Read More <i class="material-icons vm md-16">arrow_forward</i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <div class="row">
                        <div class="col-4">
                            <figure class="m-0 h-150 w-100 rounded overflow-hidden">
                                <div class="background">
                                    <img src="{{asset('')}}theme/images/woman-1852907_640%402x.png" alt="">
                                </div>
                            </figure>
                        </div>
                        <div class="col">
                            <a href="newsdetails.html" class="h4 mb-3 font-weight-normal">Creative people create creative things</a>
                            <p class="small text-mute">Lorem ipsum dolor sit amet, consect etur adipiscing elit. Sndisse conv allis. Lorem ipsum dolor sit amet.</p>
                            <a href="newsdetails.html" class="text-dark">Read More <i class="material-icons vm md-16">arrow_forward</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="container my-5">
            <div class="row">

                @if (request()->is('/') | request()->is('dashboard'))
                    @include('dashboard.provinsi')
                @endif
                @if (request()->is('dashboard/kabupaten*'))
                    @include('dashboard.kabupaten')
                @endif
                @if (request()->is('dashboard/kecamatan*'))
                    @include('dashboard.kecamatan')
                @endif
                @if (request()->is('dashboard/desa*'))
                    @include('dashboard.desa')
                @endif
            </div>

        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-12 text-uppercase">
                    <hr>
                    <h5 class="mb-0 text-center">Statistik Pemudik</h5>
                    <h6 class="mb-0 text-center">Jumlah Pemudik</h6>
                </div>
                <div class="col-12 mt-2">
                    <div id="chartJumlahPemudik"></div>
                </div>
            </div>

        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-12 text-uppercase">
                    <hr>
                    <h5 class="mb-0 text-center">Data Pemudik Per-Kecamatan</h5>
                </div>
                <div class="col-12 mt-2">
                    <table id="tableKecamatan" class="table nowrap table-bordered table-striped dt-responsive" style="width: 100%">
                        <thead>
                            <tr class="table-warning">
                                <th>Nama Kecamatan</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-12 text-uppercase">
                    <hr>
                    <h5 class="mb-0 text-center">Data Pemudik Per-Desa</h5>
                </div>
                <div class="col-12 mt-2">
                    <table id="tableDesa" class="table nowrap table-bordered table-striped dt-responsive" style="width: 100%">
                        <thead>
                            <tr class="table-warning">
                                <th>Nama Kecamatan</th>
                                <th>Nama Desa</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

@endsection

@section('script')

    @if (request()->is('/') | request()->is('dashboard'))
        <script>
            $(function(){
                $('#statprov').DataTable({
                    processing: true,
                    pageLength: 7,
                    lengthMenu: [[7, 10, 25, 50, -1], [7, 10, 25, 50, "All"]],
                    language: {
                        processing: 'Sedang Memuat Data...'
                    },
                    order: ['1','desc'],
                    serverSide: true,
                    ajax: {
                        url: "{{route('dashboard.index')}}"
                    },
                    columns: [
                        {
                            data: 'nama_provinsi',
                            name: 'nama_provinsi'
                        },
                        {
                            data: 'pemudik_count',
                            name: 'pemudik_count'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        }
                    ]
                })
            })
        </script>
    @endif

    @if (request()->is('dashboard/kabupaten*'))
        <script>
            $(function(){
                $('#statkab').DataTable({
                    processing: true,
                    pageLength: 7,
                    lengthMenu: [[7, 10, 25, 50, -1], [7, 10, 25, 50, "All"]],
                    language: {
                        processing: 'Sedang Memuat Data...'
                    },
                    order: ['2','desc'],
                    serverSide: true,
                    ajax: {
                        url: "{{route('dashboard.kabupaten',[$nama_provinsi->kd_provinsi])}}"
                    },
                    columns: [
                        {
                            data: 'nama_kabupaten',
                            name: 'nama_kabupaten'
                        },
                        {
                            data: 'nama_provinsi',
                            name: 'nama_provinsi'
                        },
                        {
                            data: 'pemudik_count',
                            name: 'pemudik_count'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        }
                    ]
                })
            })
        </script>
    @endif

    @if (request()->is('dashboard/kecamatan*'))
        <script>
            $(function(){
                $('#statkec').DataTable({
                    processing: true,
                    pageLength: 7,
                    lengthMenu: [[7, 10, 25, 50, -1], [7, 10, 25, 50, "All"]],
                    language: {
                        processing: 'Sedang Memuat Data...'
                    },
                    order: ['3','desc'],
                    serverSide: true,
                    ajax: {
                        url: "{{route('dashboard.kecamatan',[$nama_kabupaten->kd_kabupaten])}}"
                    },
                    columns: [
                        {
                            data: 'nama_kecamatan',
                            name: 'nama_kecamatan'
                        },
                        {
                            data: 'nama_kabupaten',
                            name: 'nama_kabupaten'
                        },
                        {
                            data: 'nama_provinsi',
                            name: 'nama_provinsi'
                        },
                        {
                            data: 'asalpemudik_count',
                            name: 'asalpemudik_count'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        }
                    ]
                })
            })
        </script>
    @endif

    @if (request()->is('dashboard/desa*'))
        <script>
            $(function(){
                $('#statdes').DataTable({
                    processing: true,
                    pageLength: 7,
                    lengthMenu: [[7, 10, 25, 50, -1], [7, 10, 25, 50, "All"]],
                    language: {
                        processing: 'Sedang Memuat Data...'
                    },
                    order: ['4','desc'],
                    serverSide: true,
                    ajax: {
                        url: "{{route('dashboard.desa',[$nama_kecamatan->kd_kecamatan])}}"
                    },
                    columns: [
                        {
                            data: 'nama_desa',
                            name: 'nama_desa'
                        },
                        {
                            data: 'nama_kecamatan',
                            name: 'nama_kecamatan'
                        },
                        {
                            data: 'nama_kabupaten',
                            name: 'nama_kabupaten'
                        },
                        {
                            data: 'nama_provinsi',
                            name: 'nama_provinsi'
                        },
                        {
                            data: 'asalpemudik_count',
                            name: 'asalpemudik_count'
                        }
                    ]
                })
            })
        </script>
    @endif
@endsection
