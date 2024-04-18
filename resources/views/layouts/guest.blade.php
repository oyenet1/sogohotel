<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>


    <script src="js/aos.js"></script>

    <script src="js/bootstrap-datepicker.js"></script>


    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
    @vite(['resources/css/app.css', 'resources/js/main.js', 'resources/css/bootstrap.min.css', 'resources/css/animate.css', 'resources/css/owl.carousel.min.css', 'resources/css/aos.css', 'resources/css/bootstrap-datepicker.css', 'resources/css/fancybox.min.css', 'fonts/ionicons/css/ionicons.min.css', 'fonts/fontawesome/css/font-awesome.min.css', 'resources/css/style.css', 'resources/css/jquery.timepicker.css', 'resources/js/app.js', 'resources/js/aos.js', 'resources/js/bootstrap.min.js', 'resources/js/bootstrap-datepicker.js', 'resources/js/main.js', 'resources/js/jquery-3.3.1.min.js', 'resources/js/jquery-migrate-3.0.1.min.js', 'resources/js/jquery.fancybox.min.js', 'resources/js/jquery.magnific-popup.min.js', 'resources/js/jquery.stellar.min.js', 'resources/js/jquery.timepicker.min.js', 'resources/js/jquery.validate.min.js', 'resources/js/jquery.waypoints.min.js', 'resources/js/owl.carousel.min.js', 'resources/js/popper.min.js'])


    <title>Document</title>
    {{-- @livewireStyles --}}
    <style>
        [x-cloak] {
            display: none;
        }

        a.hover,
        a.underline {
            color: black !important;
            text-decoration: underline !important;
        }
    </style>
    {{-- @livewireStyles --}}
    @stack('styles')
</head>

{{-- @php
    $permissions = currentUserPermissions();
@endphp --}}

<body class="bg-background-50">



    {{-- @livewireScripts --}}

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{--
    <x-livewire-alert::flash /> --}}
    {{-- alert conponent --}}
    {{-- <x-livewire-alert::scripts /> --}}
    @stack('scripts')
    <script>
        window.addEventListener('swal:success',
            function(e) {
                Swal.fire(e.detail);
            });

        // confirm single deleted
        window.addEventListener('swal:confirm', event => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won\'t be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#f11',
                confirmButtonColor: ''
                confirmButtonText: 'Yes delete it'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('deleteConfirm');
                    // Swal.fire(
                    //   'Deleted!'
                    //   , 'Your file has been deleted'
                    //   , 'success'
                    // )
                }
            });
        });

        // confirm multiple delete
        window.addEventListener('swal:multiple', event => {
            Swal.fire({
                title: 'Are you sure you?',
                text: "You are deleting buck records at once, you won\'t be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#f11',
                confirmButtonText: 'Go Ahead'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteMutipleConfirm');
                    // Swal.fire(
                    //   'Deleted!'
                    //   , 'Your file has been deleted'
                    //   , 'success'
                    // )
                }
            });
        });
    </script>
    <script>
        // JavaScript function to go back to the previous page
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
