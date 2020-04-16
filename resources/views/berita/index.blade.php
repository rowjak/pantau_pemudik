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
            <div class="row hn-154 position-relative">
                <!-- use hn-60 if there is no page specific name required as below and remove below container -->
                <div class="container align-self-end">
                    <h3 class="font-weight-light">Berita Terbaru</h3>
                    <p class="text-mute mb-4">Sistem Informasi Pemantauan Pemudik Wilayah Kabupaten Batang</p>
                </div>
            </div>
        </div>
        <div class="container">
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
                        <div class="col pl-0">
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
                        <div class="col pl-0">
                            <a href="newsdetails.html" class="h4 mb-3 font-weight-normal">Creative people create creative things</a>
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
                                    <img src="{{asset('')}}theme/images/turtle-863336_640%402x.png" alt="">
                                </div>
                            </figure>
                        </div>
                        <div class="col pl-0">
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
                                    <img src="{{asset('')}}theme/images/weightless-60632_640%402x.png" alt="">
                                </div>
                            </figure>
                        </div>
                        <div class="col pl-0">
                            <a href="newsdetails.html" class="h4 mb-3 font-weight-normal">Creative people create creative things</a>
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
                                    <img src="{{asset('')}}theme/images/joy-2483926_640%402x.png" alt="">
                                </div>
                            </figure>
                        </div>
                        <div class="col pl-0">
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
                        <div class="col pl-0">
                            <a href="newsdetails.html" class="h4 mb-3 font-weight-normal">Creative people create creative things</a>
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
                                    <img src="{{asset('')}}theme/images/turtle-863336_640%402x.png" alt="">
                                </div>
                            </figure>
                        </div>
                        <div class="col pl-0">
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
                                    <img src="{{asset('')}}theme/images/weightless-60632_640%402x.png" alt="">
                                </div>
                            </figure>
                        </div>
                        <div class="col pl-0">
                            <a href="newsdetails.html" class="h4 mb-3 font-weight-normal">Creative people create creative things</a>
                            <p class="small text-mute">Lorem ipsum dolor sit amet, consect etur adipiscing elit. Sndisse conv allis. Lorem ipsum dolor sit amet.</p>
                            <a href="newsdetails.html" class="text-dark">Read More <i class="material-icons vm md-16">arrow_forward</i></a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-12 text-center">
                    <button class="btn btn-light">Load more</button>
                </div>
            </div> --}}
            <br>
        </div>
        <!-- page content ends -->

@endsection
