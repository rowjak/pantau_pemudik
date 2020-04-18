
<!doctype html>
<html lang="en" class="color-theme-green">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">

    @yield('meta')

    <link rel='icon' href='{{asset('theme/images/logo.png')}}' type='image/x-icon' />


    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="{{asset('')}}theme/vendor/materializeicon/material-icons.css">

    <!-- Roboto fonts CSS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('')}}theme/vendor/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link href="{{asset('')}}theme/vendor/swiper/css/swiper.min.css" rel="stylesheet">

    <!-- select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <!-- select2-bootstrap4-theme -->
    <link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet">

    <!-- bootstrap 4 datepicker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="{{asset('')}}theme/css/style.css" rel="stylesheet">
<body>
    <!-- Loader -->
    <div class="row no-gutters vh-100 loader-screen">
        <div class="bg-template background-overlay"></div>
        <div class="col align-self-center text-white text-center">
            <img src="{{asset('')}}theme/images/logo.png" alt="logo">
            <h1 class="mb-0 mt-3">Pantau</h1>
            <p class="text-mute subtitle"> Mudik</p>
            <div class="loader-ractangls">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <!-- Loader ends -->

    <!-- wrapper starts -->
    <div class="wrapper">
        <!-- header -->
        <div class="header">
            <div class="row no-gutters">
                <div class="col-auto">
                    <button class="btn btn-link" onclick="window.history.go(-1); return false;"><i class="material-icons">chevron_left</i><span class="new-notification"></span></button>
                </div>
                <div class="col text-left">
                    <div class="header-logo">
                        <img src="{{asset('')}}theme/images/logo.png" alt="" class="header-logo">
                        <h4>Pantau<br><small class="text-mute">Pemudik</small></h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- header ends -->

        <div class="container">
            @yield('content')
        </div>

    </div>
    <!-- wrapper ends -->

    <!-- jquery, popper and bootstrap js -->
    <script src="{{asset('')}}theme/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('')}}theme/js/popper.min.js"></script>
    <script src="{{asset('')}}theme/vendor/bootstrap-4.4.1/js/bootstrap.min.js"></script>

    <!-- cookie js -->
    <script src="{{asset('')}}theme/vendor/cookie/jquery.cookie.js"></script>

    <!-- swiper js -->
    <script src="{{asset('')}}theme/vendor/swiper/js/swiper.min.js"></script>

    <!-- select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <!-- bootstrap 4 datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <!-- template custom js -->
    <script src="{{asset('')}}theme/js/main.js"></script>

    <!-- page level script -->
    <script>

        $(function(){
            $('.select2').select2({
                theme: 'bootstrap4'
            })

            $('#select_perjalanan').select2({
                theme: 'bootstrap4',
                placeholder: "Cari Rombongan...",
                minimumInputLength: 2,
                ajax: {
                    url: '{{route('pemudik.create')}}',
                    dataType: 'json',
                    data: function (params) {
                        return {
                            q: $.trim(params.term)
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });

            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true
            })
            .on('hide', function(e) {
                $('.datepicker-label').addClass('active')
            });

            $('#kd_kecamatan').on('select2:select', function (e) {
                $('#kd_desa').find('option').not(':first').remove()
                $('#kd_desa').val(null).trigger('change')
                $.get( "{{url('api/getDesa')}}/"+$('#kd_kecamatan').val(), function( data ) {
                    $.each(data, function( index, value ) {
                        $('#kd_desa').append('<option value="'+value.kd_desa+'">'+value.nama_desa+'</option>')
                    })
                });
            });

            $('#provinsi_asal').on('select2:select', function (e) {
                $('#kabupaten_asal').find('option').not(':first').remove()
                $('#kabupaten_asal').val(null).trigger('change')
                $.get( "{{url('api/getKabupaten')}}/"+$('#provinsi_asal').val(), function( data ) {
                    $.each(data, function( index, value ) {
                        $('#kabupaten_asal').append('<option value="'+value.kd_kabupaten+'">'+value.nama_kabupaten+'</option>')
                    })
                });
            });

            $('#kabupaten_asal').on('select2:select', function (e) {
                $('#kecamatan_asal').find('option').not(':first').remove()
                $('#kecamatan_asal').val(null).trigger('change')
                $.get( "{{url('api/getKecamatan')}}/"+$('#kabupaten_asal').val(), function( data ) {
                    $.each(data, function( index, value ) {
                        $('#kecamatan_asal').append('<option value="'+value.kd_kecamatan+'">'+value.nama_kecamatan+'</option>')
                    })
                });
            });

            $('#kecamatan_asal').on('select2:select', function (e) {
                $('#desa_asal').find('option').not(':first').remove()
                $('#desa_asal').val(null).trigger('change')
                $.get( "{{url('api/getDesa')}}/"+$('#kecamatan_asal').val(), function( data ) {
                    $.each(data, function( index, value ) {
                        $('#desa_asal').append('<option value="'+value.kd_desa+'">'+value.nama_desa+'</option>')
                    })
                });
            });

            $('#provinsi_tujuan').on('select2:select', function (e) {
                $('#kabupaten_tujuan').find('option').not(':first').remove()
                $('#kabupaten_tujuan').val(null).trigger('change')
                $.get( "{{url('api/getKabupaten')}}/"+$('#provinsi_tujuan').val(), function( data ) {
                    $.each(data, function( index, value ) {
                        $('#kabupaten_tujuan').append('<option value="'+value.kd_kabupaten+'">'+value.nama_kabupaten+'</option>')
                    })
                });
            });

            $('#kabupaten_tujuan').on('select2:select', function (e) {
                $('#kecamatan_tujuan').find('option').not(':first').remove()
                $('#kecamatan_tujuan').val(null).trigger('change')
                $.get( "{{url('api/getKecamatan')}}/"+$('#kabupaten_tujuan').val(), function( data ) {
                    $.each(data, function( index, value ) {
                        $('#kecamatan_tujuan').append('<option value="'+value.kd_kecamatan+'">'+value.nama_kecamatan+'</option>')
                    })
                });
            });

            $('#kecamatan_tujuan').on('select2:select', function (e) {
                $('#desa_tujuan').find('option').not(':first').remove()
                $('#desa_tujuan').val(null).trigger('change')
                $.get( "{{url('api/getDesa')}}/"+$('#kecamatan_tujuan').val(), function( data ) {
                    $.each(data, function( index, value ) {
                        $('#desa_tujuan').append('<option value="'+value.kd_desa+'">'+value.nama_desa+'</option>')
                    })
                });
            });



        })

        $(window).on('load', function() {
            $('body').addClass('header-dark');
        })

        function loginAdmin(){
            $('#form-admin').submit();
        }

    </script>

</body>

</html>
