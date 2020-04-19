<!doctype html>
<html lang="en" class="color-theme-green">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <link rel='icon' href='{{asset('theme/images/logo.png')}}' type='image/x-icon' />

    @yield('meta')

    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="{{asset('')}}theme/vendor/materializeicon/material-icons.css">

    <!-- Roboto fonts CSS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('')}}theme/vendor/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Apexcharts CSS -->
    <link href="{{asset('')}}theme/vendor/apexcharts/apexcharts.css" rel="stylesheet">
    <link href="{{asset('')}}theme/vendor/apexcharts/apexcharts-bar.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link href="{{asset('')}}theme/vendor/swiper/css/swiper.min.css" rel="stylesheet">

    <!-- Datatables Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">

    <!-- select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <!-- select2-bootstrap4-theme -->
    <link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet"> <!-- for live demo page -->

    <!-- Custom styles for this template -->
    <link href="{{asset('')}}theme/css/style.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    {!! htmlScriptTagJsApi() !!}


<body>
    <!-- Loader -->
    <div class="row no-gutters vh-100 loader-screen">
        <div class="bg-template background-overlay"></div>
        <div class="col align-self-center text-white text-center">
            <img src="{{asset('')}}theme/images/logo.png" alt="logo">
            <h1 class="mb-0 mt-3">Pantau Pemudik</h1>
            <p class="text-mute subtitle"> Kabupaten Batang</p>
            <div class="loader-ractangls">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <!-- Loader ends -->

    <!-- sidebar -->
    <div class="sidebar">
        @if(Auth::guard('pemudik')->check() | Auth::guard('admin')->check())

        <div class="row no-gutters">
            <div class="col-auto align-self-center">
                <figure class="avatar avatar-40">
                    <img src="{{asset('')}}theme/images/avatar.jpeg" alt="">
                </figure>
            </div>
            <div class="col pl-3 align-self-center">
                @if(Auth::guard('pemudik')->check())
                    <p class="my-0">{{Auth::guard('pemudik')->user()->nik}}</p>
                    <p class="text-mute my-0 small">{{Auth::guard('pemudik')->user()->nama}}</p>
                @elseif(Auth::guard('admin')->check())
                    @if(Auth::guard('admin')->user()->level == 'admin')
                    <p class="my-0">Administrator</p>
                    <p class="text-mute my-0 small">Pantau Pemudik</p>
                    @else
                    <p class="my-0">DESA {{Auth::guard('admin')->user()->desa->nama_desa}}</p>
                    <p class="text-mute my-0 small">KEC. {{Auth::guard('admin')->user()->desa->kecamatan->nama_kecamatan}}</p>
                    @endif
                @endif
            </div>
        </div>
        @endif

        <div class="list-group main-menu my-5">
            <a href="{{route('dashboard.index')}}" class="list-group-item list-group-item-action @if(request()->is('/') | request()->is('dashboard*')) active @endif"><i class="material-icons">dashboard</i>Dashboard</a>
            {{-- <a href="{{route('berita.index')}}" class="list-group-item list-group-item-action {{ (request()->is('berita*')) ? 'active' : '' }}"><i class="material-icons">view_day</i>Berita Terbaru</a> --}}

            @if(!Auth::guard('admin')->check())
            <a href="{{route('profile.index')}}" class="list-group-item list-group-item-action {{ (request()->is('profile*')) ? 'active' : '' }}"><i class="material-icons">account_circle</i>Input Data</a>
            @else
            <a href="{{route('pemudik.index')}}" class="list-group-item list-group-item-action {{ (request()->is('pemudik*')) ? 'active' : '' }}"><i class="material-icons">account_circle</i>Data Pemudik</a>
            <a href="{{route('transit.index')}}" class="list-group-item list-group-item-action {{ (request()->is('transit*')) ? 'active' : '' }}"><i class="material-icons">place</i>Tempat Transit</a>
                @if(Auth::guard('admin')->user()->level == 'admin')
                <a href="{{route('user.index')}}" class="list-group-item list-group-item-action {{ (request()->is('user*')) ? 'active' : '' }}"><i class="material-icons">people</i>Manajemen User</a>
                @endif
            @endif


            <a href="{{route('about')}}" class="list-group-item list-group-item-action {{ (request()->is('about')) ? 'active' : '' }}"><i class="material-icons">info</i>Tentang Kami</a>
            @if(Auth::guard('pemudik')->check() | Auth::guard('admin')->check())
            <form id="form_logout" action="{{ route('logout') }}" method="get">
                @csrf
            </form>
            <a href="javascript:;" onclick="logout()" class="list-group-item list-group-item-action"><i class="material-icons">power_settings_new</i>Logout</a>
            @endif
            <a href="javascript:void(0)" class="list-group-item list-group-item-action mt-4" data-toggle="modal" data-target="#colorscheme"><i class="material-icons">color_lens_outline</i>Ubah Tema</a>
        </div>
    </div>
    <!-- sidebar ends -->

    <!-- wrapper starts -->
    <div class="wrapper">

        <!-- header -->
        <div class="header">
            <div class="row no-gutters">
                <div class="col-auto">
                    <button class="btn btn-link menu-btn"><i class="material-icons menu">menu</i><i class="material-icons closeicon">close</i><span class="new-notification"></span></button>
                </div>
                <div class="col text-left">
                    <div class="header-logo">
                        <img src="{{asset('')}}theme/images/logo.png" alt="" class="header-logo">
                        <h4>Pantau<br><small class="text-mute">Pemudik</small></h4>
                    </div>
                </div>
                {{-- <div class="col-auto">
                    <a href="notification.html" class="btn btn-link"><i class="material-icons">notifications_none</i><span class="counts">9+</span></a>
                </div> --}}
            </div>
        </div>
        <!-- header ends -->

        @yield('content')

        <!-- footer -->
        <div class="footer">
            <div class="no-gutters">
                <div class="col-auto mx-auto">
                    <div class="row no-gutters justify-content-center">
                        <div class="col-auto">
                            <a href="{{route('dashboard.index')}}" class="btn btn-link-default @if(request()->is('/') | request()->is('dashboard*')) active @endif">
                                <span class="icon-text"><i class="material-icons">dashboard</i></span>
                                <span class="text-name">Dashboard</span>
                            </a>
                        </div>
                        @if(!Auth::guard('admin')->check())
                        <div class="col-auto">
                            <a href="{{route('profile.index')}}" class="btn btn-link-default {{ (request()->is('profile*')) ? 'active' : '' }}">
                                <span class="icon-text"><i class="material-icons">account_circle</i></span>
                                <span class="text-name">Input Data</span>
                            </a>
                        </div>
                        @else
                        <div class="col-auto">
                            <a href="{{route('pemudik.index')}}" class="btn btn-link-default {{ (request()->is('pemudik*')) ? 'active' : '' }}">
                                <span class="icon-text"><i class="material-icons">account_circle</i></span>
                                <span class="text-name">Data Pemudik</span>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('transit.index')}}" class="btn btn-link-default {{ (request()->is('transit*')) ? 'active' : '' }}">
                                <span class="icon-text"><i class="material-icons">place</i></span>
                                <span class="text-name">Tempat Transit</span>
                            </a>
                        </div>
                        @if(Auth::guard('admin')->user()->level == 'admin')
                        <div class="col-auto">
                            <a href="{{route('user.index')}}" class="btn btn-link-default {{ (request()->is('user*')) ? 'active' : '' }}">
                                <span class="icon-text"><i class="material-icons">people</i></span>
                                <span class="text-name">User</span>
                            </a>
                        </div>
                        @endif
                        @endif
                        <div class="col-auto">
                            <a href="{{route('about')}}" class="btn btn-link-default {{ (request()->is('about')) ? 'active' : '' }}">
                                <span class="icon-text"><i class="material-icons">info</i></span>
                                <span class="text-name">Tentang Kami</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer ends -->
    </div>
    <!-- wrapper ends -->

    <!-- color chooser menu start -->
    <div class="modal fade " id="colorscheme" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header theme-header border-0">
                    <h6 class="">Color Picker</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <div class="text-center theme-color">
                        <button class="m-1 btn red-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="red"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn blue-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="blue"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn yellow-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="yellow"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn green-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="green"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn pink-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="pink"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn orange-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="orange"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn purple-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="purple"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn deeppurple-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="deeppurple"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn lightblue-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="lightblue"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn teal-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="teal"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn lime-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="lime"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn deeporange-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="deeporange"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn gray-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="gray"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn black-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="black"><i class="material-icons w-50">color_lens_outline</i></button>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-6 text-left">
                        <div class="row">
                            <div class="col-auto text-right align-self-center"><i class="material-icons text-warning md-36 vm">wb_sunny</i></div>
                            <div class="col-auto text-center align-self-center px-0">
                                <div class="custom-control custom-switch float-right">
                                    <input type="checkbox" name="themelayout" class="custom-control-input" id="theme-dark">
                                    <label class="custom-control-label" for="theme-dark"></label>
                                </div>
                            </div>
                            <div class="col-auto text-left align-self-center"><i class="material-icons text-dark md-36 vm">brightness_2</i></div>
                        </div>
                    </div>
                    <div class="col-6 text-right">
                        <div class="row">
                            <div class="col-auto text-right align-self-center">LTR</div>
                            <div class="col-auto text-center align-self-center px-0">
                                <div class="custom-control custom-switch float-right">
                                    <input type="checkbox" name="rtllayout" class="custom-control-input" id="theme-rtl">
                                    <label class="custom-control-label" for="theme-rtl"></label>
                                </div>
                            </div>
                            <div class="col-auto text-left align-self-center">RTL</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- color chooser menu ends -->

    <!-- jquery, popper and bootstrap js -->
    <script src="{{asset('')}}theme/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('')}}theme/js/popper.min.js"></script>
    <script src="{{asset('')}}theme/vendor/bootstrap-4.4.1/js/bootstrap.min.js"></script>

    <!-- cookie js -->
    <script src="{{asset('')}}theme/vendor/cookie/jquery.cookie.js"></script>

    <!-- swiper js -->
    <script src="{{asset('')}}theme/vendor/swiper/js/swiper.min.js"></script>

    <!-- swiper js -->
    <script src="{{asset('')}}theme/vendor/sparklines/jquery.sparkline.min.js"></script>

    <!-- datatables js -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

    <!-- select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <!-- template custom js -->
    <script src="{{asset('')}}theme/js/main.js"></script>

    @yield('script')

    <script>
        $(function(){
            $('.select2').select2({
                theme: 'bootstrap4'
            })

            // $.get( "{{url('api/getPemudik')}}", function( data ) {
            //     console.log(data);
            // });

            $('#tableProfile').DataTable({
                order: []
            })



            $('#tableUser').DataTable({
                processing: true,
                pageLength: 7,
                lengthMenu: [[7, 10, 25, 50, -1], [7, 10, 25, 50, "All"]],
                language: {
                    processing: 'Sedang Memuat Data...'
                },
                order: [],
                serverSide: true,
                ajax: {
                    url: "{{route('user.index')}}"
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'kecamatan',
                        name: 'kecamatan'
                    },
                    {
                        data: 'desa',
                        name: 'desa'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            })

            $('#tablePemudik').DataTable({
                processing: true,
                pageLength: 7,
                lengthMenu: [[7, 10, 25, 50, -1], [7, 10, 25, 50, "All"]],
                language: {
                    processing: 'Sedang Memuat Data...'
                },
                order: [],
                serverSide: true,
                ajax: {
                    url: "{{url('api/pemudik')}}"
                },
                columns: [
                    {
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'no_hp',
                        name: 'no_hp'
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin'
                    },
                    {
                        data: 'alamat_asal',
                        name: 'alamat_asal'
                    },
                    {
                        data: 'alamat_tujuan',
                        name: 'alamat_tujuan'
                    },
                    {
                        data: 'usia',
                        name: 'usia'
                    },
                    {
                        data: 'hub_kekerabatan',
                        name: 'hub_kekerabatan'
                    },
                    {
                        data: 'pekerjaan',
                        name: 'pekerjaan'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            })

            $('#tableKecamatan').DataTable({
                processing: true,
                pageLength: 7,
                lengthMenu: [[7, 10, 25, 50, -1], [7, 10, 25, 50, "All"]],
                language: {
                    processing: 'Sedang Memuat Data...'
                },
                order: ['1','desc'],
                serverSide: true,
                ajax: {
                    url: "{{url('api/pemudikkecamatan')}}"
                },
                columns: [
                    {
                        data: 'nama_kecamatan',
                        name: 'nama_kecamatan'
                    },
                    {
                        data: 'pemudik_count',
                        name: 'pemudik_count'
                    }
                ]
            })

            $('#tableDesa').DataTable({
                processing: true,
                pageLength: 7,
                lengthMenu: [[7, 10, 25, 50, -1], [7, 10, 25, 50, "All"]],
                language: {
                    processing: 'Sedang Memuat Data...'
                },
                order: ['2','desc'],
                serverSide: true,
                ajax: {
                    url: "{{url('api/pemudikDesa')}}"
                },
                columns: [
                    {
                        data: 'nama_kecamatan',
                        name: 'nama_kecamatan'
                    },
                    {
                        data: 'nama_desa',
                        name: 'nama_desa'
                    },
                    {
                        data: 'pemudik_count',
                        name: 'pemudik_count'
                    }
                ]
            })

            if($('#chartJumlahPemudik').length){
                var options = {
                    series: [{
                        name: "Jumlah",
                        data: [21, 22, 10]
                    }],
                    chart: {
                        height: 350,
                        type: 'bar',
                        events: {
                            click: function(chart, w, e) {
                            // console.log(chart, w, e)
                            }
                        }
                    },
                    colors: ['#00E396','#FEB019','#FF4560'],
                    plotOptions: {
                    bar: {
                        columnWidth: '45%',
                        distributed: true
                    }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    legend: {
                        show: false
                    },
                    xaxis: {
                        categories: [
                            ['Sehat'],
                            ['Sehat Dengan Resiko'],
                            ['Perlu Intervensi'],
                        ],
                        labels: {
                            style: {
                                colors: ['#00E396','#FEB019','#FF4560'],
                                fontSize: '12px'
                            }
                        }
                    }
                };

                var chart = new ApexCharts(document.querySelector("#chartJumlahPemudik"), options);
                chart.render();
            }




        })

        function logout(){
            $('#form_logout').submit();
        }
    </script>



</body>

</html>
