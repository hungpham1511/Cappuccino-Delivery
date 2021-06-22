@extends('layouts.menu')

@section('content')
<div class="container">
    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0">Add New Topping</h1>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('topping.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
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
  
    <form action="{{ route('topping.store') }}" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" name="name" class="form-control" placeholder="Butter">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price</strong>
                    <input type="number" name="price" class="form-control" placeholder="10000">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection