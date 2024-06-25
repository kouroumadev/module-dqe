<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CNSS') }}</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logos/main-logo.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logos/main-logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logos/main-logo.png') }}">


    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->

    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/styles/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/styles/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('theme/src/plugins/switchery/switchery.min.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/src/plugins/jquery-steps/jquery.steps.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/styles/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/src/styles/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/src/plugins/sweetalert2/sweetalert2.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css') }}">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4- toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .loading-spinner {
            display: none;
            /* Initially hidden */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }
    </style>

    {{-- sweetAlert --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script> --}}

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jqc-1.12.4/dt-1.11.4/b-2.2.2/r-2.2.9/sc-2.0.5/sp-1.4.0/datatables.min.css" />

    {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jqc-1.12.4/dt-1.11.4/b-2.2.2/r-2.2.9/sc-2.0.5/sp-1.4.0/datatables.min.js"></script> --}}



    {{-- Ajax --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script> --}}




    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>

</head>

<body>
    @include('sweetalert::alert')

    @yield('content')




    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- js -->
    {{-- <script src="{{ asset('theme/src/scripts/jquery.min.js') }}"></script> --}}
    <script src="{{ asset('theme/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('theme/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('theme/vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/apexcharts/apexcharts.min.js') }}"></script>

    {{-- <script src="{{ asset('theme/vendors/scripts/dashboard.js') }}"></script> --}}
    <script src="{{ asset('theme/src/plugins/jquery-steps/jquery.steps.js') }}"></script>
    <script src="{{ asset('theme/vendors/scripts/steps-setting.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <script src="{{ asset('theme/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('theme/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/js/vfs_fonts.js') }}"></script>

    <!-- Datatable Setting js -->
    <script src="{{ asset('theme/vendors/scripts/datatable-setting.js') }}"></script>

    <!-- add sweet alert js & css in footer -->
    <script src="{{ asset('theme/src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/sweetalert2/sweet-alert.init.js') }}"></script>

    {{-- Ajax --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script> --}}



    {{-- <script src="{{ asset('theme/vendors/scripts/datatable-setting.js') }}"></script> --}}
    <script>
        // setting CSRF token in head section //
        $.ajaxSetup({
            headers: ({
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            })
        })

        function returnRef() {
            // var mission_id = document.getElementById('mission_id').value;
            // var mission_id = $("#miss_id").val();
            //alert(id);
            $.ajax({
                type: 'GET',
                url: "{{ route('rendezvous.prendre') }}",
                dataType: 'json',
                // data: {
                //     id: id
                // },
                success: function() {

                }
            })


        }

        // function getPrestation() {
        //     // var mission_id = document.getElementById('mission_id').value;
        //     var nature = $("#nature").val();
        //     //alert(mission_id);
        //     $.ajax({
        //         type: 'GET',
        //         url: "{{ route('prestation.ajax') }}",
        //         dataType: 'json',
        //         data: {
        //             nature: nature
        //         },
        //         success: function(data) {
        //             // console.log(data);
        //             $('select[name="subsubcategory_id"]').html('');
        //             var d = $('select[name="prestation"]').empty();
        //             $.each(data, function(key, value) {
        //                 $('select[name="prestation"]').append('<option value="' + value.id + '">' +
        //                     value.libelle + '</option>')
        //             })
        //         }
        //     })


        // }
    </script>

</body>

</html>
