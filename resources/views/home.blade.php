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

@section('menu')
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