<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- CSS --}}
    <link href="{{ asset('css/signin.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/custom.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/order-page.css')}}" rel="stylesheet" type="text/css>" media="all">
    <link href="{{ asset('css/order-form.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/custom_admin.css')}}" rel="stylesheet" type="text/css" media="all">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cappucino Delivery</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

    <!-- Favicon-->
    <link href="picture/Favicon1.svg" rel="icon" type="image/x-icon" media="all">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="app">
        <nav>

                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Sign in') }}
                </a> --}}
                <header>
                    <img id="home-page" class="logo" src="{{ asset('picture/Frame2.png') }}" alt="">
                    <p class="logo-name">CAPPUCCINO <br>DELIVERY</p>
                </header>
        </nav>

        <div class="py-4">
            @yield('content')
        </div>
        <div class="container-fluid">
            <div class="row">
                {{-- Nav menu --}}
                <div class="col-lg-2">
                    @yield('nav-menu')
                </div>

                {{-- Menu items --}}
                <div class="col-lg-6">
                    <input type="text" id="search" placeholder="Search..."><br>
                    {{-- Coffee --}}
                    @yield('coffee')
                    {{-- Ice Blended --}}
                    @yield('iceBlended')
                    {{-- Tea --}}
                    @yield('tea')
                    {{-- Smoothie --}}
                    @yield('smoothie')
                </div>

                {{-- Grocery store --}}
                <div class="col-lg-4">
                    @yield('cart')
                </div>
            </div>

            {{-- Footer --}}
            <div class="footer">
                @yield('footer')
            </div>
        </div>
        {{-- Order form --}}
        @yield('order')
    </div>    
</body>
</html>
