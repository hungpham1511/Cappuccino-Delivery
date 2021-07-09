<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- CSS --}}
    <link href="{{ asset('css/order-page.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/order-form.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/order-form-responsive.css')}}" rel="stylesheet" type="text/css" media="all">
    <!-- Favicon -->
    <link href="picture/Favicon1.svg" rel="icon" type="image/x-icon" media="all">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cappucino Delivery</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    {{-- Header --}}
    <div class="header">
        <div class="user">
            <i id="grocery-icon" class="fas fa-user dropdown-toggle" aria-hidden="true" data-toggle="dropdown"></i>  
            <ul class="dropdown-menu" style="text-align: center">
                <li><a href="{{ route('orderhistory') }}">Order History</a></li>
                <hr class="sidebar-divider">
                <li><a href="{{ route('user.edit',Auth::user()) }}">Edit infomation</a></li>
                <hr class="sidebar-divider">
                <li>
                    <a class="btn btn-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                
            </ul>  
        </div>
        <img id="logo-img1" src="{{ asset('picture/Frame2.png') }}" alt="logo image">
        <h4 id="logo-name1">CAPPUCCINO <br> DELIVERY</h4>
    </div>
    <h3 id="select-cf">SELECT YOUR COFFEE</h3>
    {{-- Content --}}

    {{--  Menu Mobile  --}}
    <div class="nav-menu-mobile">
        <div class="list-group">
            <div class="list-group-item">
                <div class="navbar bg-white">
                    <div class="navbar-nav">
                        <a class="nav-item" href="#coffee">
                            <h4 class="nav-name">Coffee</h4>
                        </a>
                        <a class="nav-item" href="#iced-blended">
                            <h4 class="nav-name">Iced Blended</h4>
                        </a>
                        <a class="nav-item" href="#tea">
                            <h4 class="nav-name">Tea</h4>
                        </a>
                        <a class="nav-item" href="#smoothie">
                            <h4 class="nav-name">Smoothie</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Page content --}}
    <div class="container-fluid px-0">
        <div class="row mx-0">
            {{-- Navigation menu --}}
            <div class="col-lg-2">
                <!-- Menu Web -->
                <div class="nav-menu-web">
                    <div class="list-group">
                        <div class="list-group-item">
                            <a href="#">
                                <h4 id="link-menu">Menu</h4>
                            </a>
                        </div>
                        <div class="list-group-item">
                            <div class="navbar bg-white">
                                <div class="navbar-nav">
                                    <a class="nav-item" href="#coffee">
                                        <h4>Coffee</h4>
                                    </a>
                                    <a class="nav-item" href="#iced-blended">
                                        <h4>Iced Blended</h4>
                                    </a>
                                    <a class="nav-item" href="#tea">
                                        <h4>Tea</h4>
                                    </a>
                                    <a class="nav-item" href="#smoothie">
                                        <h4>Smoothie</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            {{-- Menu --}}
            <div class="col-lg-6">

                {{-- Coffee --}}
                <h4 class="coffee-title" id="coffee"> Coffee</h4><br>
                <div class="row menu-item">
                    @foreach ($coffee as $c)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top" src={{$c->picture}} alt="..."></a>
                            <div class="card-body">
                                <h4 class="card-title">{{$c->name}}</h4>
                                <p class="card-text">{{$c->description}}<span id="span-affogato"></span></p>
                                <h5 id="item-price">{{$c->price}} VND</h5>
                            </div>
                            <div class="card-footer">
                                <button 
                                type="button" 
                                class="button-order"
                                onclick="openOrderForm('{{$c->name}}', '{{$c->picture}}','{{$c->description}}','{{$c->price}}',{{$c->idDrink}})"
                                >Order</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Ice Blended --}}
                <h4 class="iced-title" id="iced-blended">Iced Blended</h4><br>
                <div class="row menu-item">
                        @foreach ($iceBlended as $i)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src={{$i->picture}} alt="..."></a>
                                <div class="card-body">
                                    <h4 class="card-title">{{$i->name}}</h4>
                                    <p class="card-text">{{$i->description}}<span id="span-affogato"></span></p>
                                    <h5 id="item-price">{{$i->price}} VND</h5>
                                </div>
                                <div class="card-footer">
                                    <button 
                                    type="button" 
                                    class="button-order"
                                    onclick="openOrderForm('{{$i->name}}', '{{$i->picture}}','{{$i->description}}','{{$i->price}}',{{$i->idDrink}})"
                                    >Order</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>

                {{-- Tea --}}
                <h4 class="tea-title" id="tea">Tea</h4><br>
                <div class="row menu-item">
                        @foreach ($tea as $t)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src={{$t->picture}} alt="..."></a>
                                <div class="card-body">
                                    <h4 class="card-title">{{$t->name}}</h4>
                                    <p class="card-text">{{$t->description}}<span id="span-affogato"></span></p>
                                    <h5 id="item-price">{{$t->price}} VND</h5>
                                </div>
                                <div class="card-footer">
                                    <button 
                                    type="button" 
                                    class="button-order"
                                    onclick="openOrderForm('{{$t->name}}', '{{$t->picture}}','{{$t->description}}','{{$t->price}}',{{$t->idDrink}})"
                                    >Order</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>

                {{-- Smoothie --}}
                <h4 class="smoothie-title" id="smoothie">Smoothie</h4><br>
                <div class="row menu-item">
                        @foreach ($smoothie as $s)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src={{$s->picture}} alt="..."></a>
                                <div class="card-body">
                                    <h4 class="card-title">{{$s->name}}</h4>
                                    <p class="card-text">{{$s->description}}<span id="span-affogato"></span></p>
                                    <h5 id="item-price">{{$s->price}} VND</h5>
                                </div>
                                <div class="card-footer">
                                    <button 
                                    type="button" 
                                    class="button-order" 
                                    onclick="openOrderForm('{{$s->name}}', '{{$s->picture}}','{{$s->description}}','{{$s->price}}',{{$s->idDrink}})">
                                    Order</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>

            {{-- Shopping Cart --}}
            <div class="col-lg-4">
                <!-- Table Striped Boostrap -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td colspan="4" class="amount">Amount</td>
                            <td class="cost1">Cost</td>
                        </tr>
                    </thead>
                    <tbody class="cart-detail">
                        <tr class="row2">
                            <td colspan="4">Total</td>
                            <td class="total"></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="td-button2" colspan="5">
                                <form action="{{ route('checkout') }}">
                                    <button type="submit" class="button-view">View Cart</button>
                                </form>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        {{-- Footer --}}
        <div class="footer">
            <div class="row mx-0">
                <div class="col-lg-4 logo-brand">
                    <img class="logo-img2" src="{{asset('picture/Frame2.png')}}" alt="logo image">
                    <h4 class="logo-name2">CAPPUCCINO <br>DELIVERY</h4>
                </div>
                <div class="col-lg-8">
                    <i class="footer-contact fa fa-facebook" aria-hidden="true">cappuccino.com</i>
                    <i class="footer-contact fa fa-instagram" aria-hidden="true">_ilovecappu</i>
                    <i class="footer-contact fa fa-phone" aria-hidden="true">0898536271</i>
                    <i class="footer-contact fa fa-building" aria-hidden="true">86-88 Cao Thắng, phường 4, quận 3, Hồ Chí Minh</i>
                </div>
            </div>
        </div>
    </div>

    {{-- Model --}}
    <div class="model hidden" id="order-form">
        <div class="model-overlay"></div>
        <div class="model-body">
            <div class="model-inner">
                <div class="order-container">
                    <div class="order-detail">
                        <i class="close-btn fas fa-times"></i>

                        <div class="order-size">
                            <p class="p-model">Size: </p>
                            <div class="choose-size">
                                <div class="large">
                                    <input class="size" type="radio" name="size" value="5000">
                                    <span>L (+5000 VND)</span>
                                </div>
                                <div class="medium">
                                    <input class="size" type="radio" name="size">
                                    <span>M</span>
                                </div>
                                <div class="small">
                                    <input class="size" type="radio" name="size" value="5000">
                                    <span>S (-5000 VND)</span>
                                </div>
                            </div>
                        </div>
                        {{-- Topping --}}
                        <div class="order-customize">
                            <p class="p-model">Topping: </p>
                            @foreach($toppings as $topping)
                            <div class="customize-item">
                                <div class="topping-item">
                                    <span id="idTopping">{{ $topping->idTopping }}</span>
                                    <input class="topping" type="checkbox" value="{{$topping->price}}">
                                    <p class="p-model">{{$topping->name}}</p>
                                </div>
                                <span>+{{$topping->price}} VND</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="order-checkout">
                        <div class="counter">
                            <i class="minus-btn desc fa fa-minus-circle"></i>
                            <span id="count-value"></span>
                            <i class="plus-btn asc fa fa-plus-circle"></i>
                        </div>
                        <div class="add">
                            <p class="p-model" id="add" >Add to Cart</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/order-page.js') }}"></script>
</body>