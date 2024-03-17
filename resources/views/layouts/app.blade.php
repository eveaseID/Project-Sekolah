<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/register.css">

    

    <style>
        .dropdown-toggle::after {
            display:none !important;
        }

        .colored-toast.swal2-icon-success {
            background-color: #a5dc86 !important;
        }

        .colored-toast.swal2-icon-error {
            background-color: #f27474 !important;
        }

        .colored-toast .swal2-title {
            color: white;
            top: 5px;
        }

        .text-blue {
            color: #4b9ef7;
            background: #e6f2ff;
            font-weight: bold;
            font-size: 14px;
            padding: 0 10px;
            border-radius: 5px
        }
        .text-green {
            color: #50d0ad;
            background: #dbffec;
            font-weight: bold;
            font-size: 14px;
            padding: 0 10px;
            border-radius: 5px
        }
        .text-red {
            color: #f56b7b; 
            background: #ffdfe9;
            font-weight: bold;
            font-size: 14px;
            padding: 0 10px;
            border-radius: 5px;
        }
    </style>

    @yield('styles')

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div id="app">

        @if (Auth::check())
            @include('layouts.components.sidebar')
        @endif

        @if (!Auth::check())
            @include('layouts.components.navbar')
        @endif

        <main class="py-4">
            @yield('content')
        </main>

        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <script>
    function defaultToast(option = {type, title}) {
        const {type='success', title} = option;
        console.log(type, title);
        Swal.fire({
            toast: true,
            width: 350,
            icon: type,
            title: title,
            position: 'top-right',
            showConfirmButton: false,
            timer: 2500,
            customClass: {
                popup: 'colored-toast'
            },
            iconColor: 'white',
        })
    }
    </script>
    @yield('scripts')
    @livewireScripts
</body>
</html>