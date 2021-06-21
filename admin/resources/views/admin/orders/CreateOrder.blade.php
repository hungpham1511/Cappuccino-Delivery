@extends('layouts.menu')

@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0">Add New Order</h1>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('orders.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
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
  
    <form action="{{ route('orders.store') }}" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ReceiptDate</strong>
                    <input type="text" name="ReceiptDate" class="form-control" placeholder="20/02/2012">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Payment</strong>
                    <input type="number" name="Payment" class="form-control" placeholder="1: COD    2: Momo    3: Bank">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Note</strong>
                    <input type="text" name="Note" class="form-control" placeholder="Before 5pm.">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status</strong>
                    <input type="number" name="Status" class="form-control" placeholder="1: Order Received    2: Payment received    3: Delivering    4: Finish">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total</strong>
                    <input type="number" name="Total" class="form-control" placeholder="100000">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection