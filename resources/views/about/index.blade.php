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
            <div class="row hn-154 position-relative">
                <!-- use hn-60 if there is no page specific name required as below and remove below container -->
                <div class="container align-self-end">
                    <h3 class="font-weight-light">About us</h3>
                    <p class="text-mute mb-4">Our design is our identity</p>
                </div>
            </div>
        </div>
        <div class="container bg-template position-relative mb-4 py-5">
            <div class="background opac">
                <img src="{{asset('')}}theme/images/turtle-863336_640%402x.png" alt="">
            </div>
            <div class="row">
                <div class="col-12 col-md-8 col-lg-6">
                    {{-- <h1 class="jumbotron-heading font-weight-normal">Lemux Network</h1>
                    <p class="lead">An application with business class and creative design</p>
                    <p class="text-mute">Lemux is HTML template based on Bootstrap 4.3.1 framework. This html template can be used in various business domains like Manufacturing, inventory, IT, administration etc. </p>
                    <p>
                        <a href="#" class="btn btn-default btn-rounded shadow my-2">Call to action</a>
                    </p> --}}
                </div>
            </div>
        </div>
        <div class="container position-relative my-5">
            <div class="row mb-4">
                <div class="col text-uppercase">
                    <p class="text-mute mb-0">About us</p>
                    <h4 class="mb-0">We are</h4>
                </div>
            </div>

            {{-- <p class="text-mute">Lemux is HTML template based on Bootstrap 4.3.1 framework. This html template can be used in various business domains like Manufacturing, inventory, IT, administration etc. for admin panel, system development, web applications, even website can be created. This template also considered social pages, ecommerce pages and many more. </p> --}}
        </div>
        <div class="container position-relative my-5">
            <div class="row">
                <div class="col-6">
                    <figure class="overflow-hidden rounded text-center mb-0">
                        <img src="{{asset('')}}theme/images/joy-2483926_640%402x.png" alt="" class="w-100 mx-auto">
                    </figure>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <figure class="overflow-hidden rounded text-center">
                                <img src="{{asset('')}}theme/images/turtle-863336_640%402x.png" alt="" class="w-100 mx-auto">
                            </figure>
                        </div>
                        <div class="col-12">
                            <figure class="overflow-hidden rounded text-center mb-0">
                                <img src="{{asset('')}}theme/images/woman-1852907_640%402x.png" alt="" class="w-100 mx-auto">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page content ends -->
@endsection
