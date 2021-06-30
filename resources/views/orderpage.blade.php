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
    <link href="img/Favicon1.svg" rel="icon" type="image/x-icon" media="all">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cappucino Delivery</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    {{-- <link href="{{ asset('assets/themify-icons/themify-icons.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    {{-- Header --}}
    <div class="header">
        <div class="cart">
            <span class="badge badge-danger">1</span>
            <i id="grocery-icon" class="fa fa-shopping-cart" aria-hidden="true" onclick="location.href='/User/Checkout/index.html'"></i>
        </div>
        <div class="order-history" onclick="location.href='../OrderHistory/index.html'">Order History</div>
        <img id="logo-img1" src="{{ asset('img/Frame2.png') }}" alt="logo image">
        <h4 id="logo-name1">CAPPUCCINO <br> DELIVERY</h4>
    </div>
    <h3 id="select-cf">SELECT YOUR COFFEE</h3>
    {{-- Content --}}


    {{-- Page content --}}
    <div class="container-fluid">
        <div class="row">
            {{-- Navigation menu --}}
            <div class="col-lg-2">
                <!-- Menu Web -->
                <div class="list-group" id="nav-menu-web">
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
        
            {{-- Menu --}}
            <div class="col-lg-6">
                <input type="text" id="search" placeholder="Search..."><br>

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
                                <button type="button" class="button-order">Order</button>
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
                                    <button type="button" class="button-order">Order</button>
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
                                    <button type="button" class="button-order">Order</button>
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
                                    <button type="button" class="button-order">Order</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>

            {{-- Shopping Cart --}}
            <div class="col-lg-4">
                <div class="list-group grocery" id="grocery-store">
                    <div class="row">
                        <span id="span-amount1"></span>
                        <p id="amount">Amount</p>
                        <span id="span-cost"></span>
                        <p id="cost">Cost</p>
                    </div>
                    <div class="order-info">
                        
                    </div>
                    <div class="list-group-item">
                        <div class="row">
                            <span id="span-sum1"></span>
                            <p>Sum</p>
                            <span id="span-sum2"></span>
                            <p id="sum">0 VND</p>
                        </div>
                        <div class="row">
                            <span id="span-shipping1"></span>
                            <p>Shipping</p>
                            <span id="span-shipping2"></span>
                            <p>0 VND</p>
                        </div>
                        
                    </div>
                    <div class="list-group-item">
                        <div class="row">
                            <span id="span-total1"></span>
                            <p>Total</p>
                            <span id="span-total2"></span>
                            <p id="total">0 VND</p>
                            <span id="span-button-view"></span>
                            <button id="button-view" type="button" onclick="location.href='/User/Checkout/index.html'">View Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        <div class="footer">
            <div class="row">
                <div class="col-lg-4">
                    <span id="span-logo-img"></span>
                    <img id="logo-img2" src="{{ asset('img/Frame2.png') }}" alt="logo image">
                    <h4 id="logo-name2"><span id="span-logo-name1"></span> CAPPUCCINO <br> <span id="span-logo-name2"></span> DELIVERY</h4>
                </div>
                <div class="col-lg-8">
                    <i class="footer-contact fab fa-facebook-f" aria-hidden="true"><span id="span-facebook"></span> cappuccino.com</i>
                    <i class="footer-contact fab fa-instagram" aria-hidden="true"><span id="span-instagram"></span> _ilovecappu</i>
                    <i class="footer-contact fas fa-phone" aria-hidden="true"><span id="span-phone"></span> 0898536271</i>
                    <i class="footer-contact fa fa-building" aria-hidden="true"><span id="span-building"></span> 86-88 Cao Thắng, phường 4, quận 3, Hồ Chí Minh</i>
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
                        <div class="order-name">
                            <img src="./Assets/image18.png" class="order-img" alt="Frappe">
                            <div>
                                <p class="p-model" style="padding-top: 5px"><b style="font-size:16px">Frappé</b></p>
                                <p class="p-model">a foam-covered iced coffee drink made from instant coffee</p>
                                <p class="p-model" id="order-size"></p>
                            </div>
                            <i class="close-btn fas fa-times"></i>
                        </div>
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

                        <div class="order-customize">
                            <p class="p-model">Topping: </p>
                            <div class="customize-item">
                                <div class="topping-item">
                                    <input type="radio" value="5000">
                                    <p class="p-model">Ice cream</p>
                                </div>
                                <span>+5000 VND</span>
                            </div>
                            <div class="customize-item">
                                <div class="topping-item">
                                    <input type="radio" value="10000">
                                    <p class="p-model">Sweet Serup</p>
                                </div>
                                <span>+10000 VND</span>
                            </div>
                            <div class="customize-item">
                                <div class="topping-item">
                                    <input type="radio" value="5000">
                                    <p class="p-model">Vanilla</p>
                                </div>
                                <span>+5000 VND</span>
                            </div>
                            <div class="customize-item">
                                <div class="topping-item">
                                    <input type="radio" value="5000">
                                    <p class="p-model">Butter</p>
                                </div>
                                <span>+8000 VND</span>
                            </div>
                            <div class="customize-item">
                                <div class="topping-item">
                                    <input type="radio" value="5000">
                                    <p class="p-model">Spices</p>
                                </div>
                                <span>+5000 VND</span>
                            </div>
                            <div class="customize-item">
                                <div class="topping-item">
                                    <input type="radio" value="5000">
                                    <p class="p-model">Non-dairy milks</p>
                                </div>
                                <span>+5000 VND</span>
                            </div>
                        </div>

                        <div class="order-note">
                            <div class="item">
                                <p class="p-model">Note:</p>
                                <input type="text" class="note-detail" id="note">
                            </div>
                        </div>
                    </div>
                    <div class="order-checkout">
                        <div class="counter">
                            <i class="minus-btn desc fa fa-minus-circle"></i>
                            <span id="count-value">1</span>
                            <i class="plus-btn asc fa fa-plus-circle"></i>
                        </div>
                        <div class="add">
                            <p class="p-model" id="add">Add to Cart</p>
                            <p class="p-model" id="totalCost">0 VND</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/order-page.js') }}"></script>
</body>