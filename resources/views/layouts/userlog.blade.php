<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('css/signin.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/custom.css')}}" rel="stylesheet" type="text/css" media="all">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cappucino Delivery</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

    <!-- Favicon-->
    <link href="img/Favicon1.svg" rel="icon" type="image/x-icon" media="all">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
    <div id="app">
        <nav>

                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Sign in') }}
                </a> --}}
                <header>
                    <img id="home-page" class="logo" src="{{ asset('img/Frame2.png') }}" alt="">
                    <p class="logo-name">CAPPUCCINO <br>DELIVERY</p>
                </header>


        </nav>

        <main class="py-4" style="margin-bottom: 10%;">
            @yield('content')
            <!-- <div class="row menu-item">
                @yield('menuItems')
            </div> -->
        </main>

</body>
</html>
