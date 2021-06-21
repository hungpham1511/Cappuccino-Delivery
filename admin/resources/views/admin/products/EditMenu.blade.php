@extends('layouts.menu')

@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0">Edit Drink</h1>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('products.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Please fill the blank!<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update',$product->IdDrink) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category</strong>
                    <input type="text" name="Category" value="{{ $product->Category }}" class="form-control" placeholder="Coffee">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" name="Name" value="{{ $product->Name }}" class="form-control" placeholder="Affogato">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description</strong>
                    <input type="text" name="Description" value="{{ $product->Description }}" class="form-control" placeholder="an Italian coffee-based dessert">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price</strong>
                    <input type="text" name="Price" value="{{ $product->Price }}" class="form-control" placeholder="50000">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Picture</strong>
                    <input type="text" name="Picture" value="{{ $product->Picture }}" class="form-control" placeholder="xyz">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection