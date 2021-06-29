@extends('layouts.userlog')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <a class="btn btn-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Navigation menu --}}
@section('nav-menu')
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
@endsection

{{-- Menu --}}
@section('coffee')
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
@endsection

@section('iceBlended')
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
@endsection

@section('tea')
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
@endsection

@section('smoothie')
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
@endsection

{{-- Cart --}}
@section('cart')
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
        <div class="row">
            <span id="span-promotion"></span>
            <input type="text" id="promotion-code" placeholder="Promotio Code">
            <span id="span-button-submit"></span>
            <button id="button-submit" type="button">Submit</button>
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
@endsection

{{-- Footer --}}
@section('footer')
<div class="row">
    <div class="col-lg-4">
        <span id="span-logo-img"></span>
        <img id="logo-img2" src="Assets/Frame2.png" alt="logo image">
        <h4 id="logo-name2"><span id="span-logo-name1"></span> CAPPUCCINO <br> <span id="span-logo-name2"></span> DELIVERY</h4>
    </div>
    <div class="col-lg-8">
        <i class="footer-contact fa fa-facebook" aria-hidden="true"><span id="span-facebook"></span> cappuccino.com</i>
        <i class="footer-contact fa fa-instagram" aria-hidden="true"><span id="span-instagram"></span> _ilovecappu</i>
        <i class="footer-contact fa fa-phone" aria-hidden="true"><span id="span-phone"></span> 0898536271</i>
        <i class="footer-contact fa fa-building" aria-hidden="true"><span id="span-building"></span> 86-88 Cao Thắng, phường 4, quận 3, Hồ Chí Minh</i>
    </div>
</div>
@endsection

{{-- Order form --}}