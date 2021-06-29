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
 
@section('menuItems')
    {{-- Show Coffee --}}
    @foreach ($coffees as $coffee)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
            <a href="#"><img class="card-img-top" src={{$coffee->picture}} alt="..."></a>
            <div class="card-body">
                <h4 class="card-title">{{$coffee->name}}</h4>
                <p class="card-text">{{$coffee->description}}<span id="span-affogato"></span></p>
                <h5 id="item-price">{{$coffee->price}} VND</h5>
            </div>
            <div class="card-footer">
                <button type="button" class="button-order">Order</button>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Show Ice Blended --}}
    @foreach ($iceBlendeds as $iceBlended)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
            <a href="#"><img class="card-img-top" src={{$iceBlended->picture}} alt="..."></a>
            <div class="card-body">
                <h4 class="card-title">{{$iceBlended->name}}</h4>
                <p class="card-text">{{$iceBlended->description}}<span id="span-affogato"></span></p>
                <h5 id="item-price">{{$iceBlended->price}} VND</h5>
            </div>
            <div class="card-footer">
                <button type="button" class="button-order">Order</button>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Show Tea --}}
    @foreach ($teas as $tea)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
            <a href="#"><img class="card-img-top" src={{$tea->picture}} alt="..."></a>
            <div class="card-body">
                <h4 class="card-title">{{$tea->name}}</h4>
                <p class="card-text">{{$tea->description}}<span id="span-affogato"></span></p>
                <h5 id="item-price">{{$tea->price}} VND</h5>
            </div>
            <div class="card-footer">
                <button type="button" class="button-order">Order</button>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Show Smoothie --}}
    @foreach ($smoothies as $smoothie)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
            <a href="#"><img class="card-img-top" src={{$smoothie->picture}} alt="..."></a>
            <div class="card-body">
                <h4 class="card-title">{{$smoothie->name}}</h4>
                <p class="card-text">{{$smoothie->description}}<span id="span-affogato"></span></p>
                <h5 id="item-price">{{$smoothie->price}} VND</h5>
            </div>
            <div class="card-footer">
                <button type="button" class="button-order">Order</button>
            </div>
        </div>
    </div>
    @endforeach
@endsection