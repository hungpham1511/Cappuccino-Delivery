@extends('layouts.menu')

@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0">Edit order infomation</h1>
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

    <form action="{{ route('orders.update',$order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>IdReceipt</strong>
                    <input type="text" name="IdReceipt" value="{{ $order->IdReceipt }}"class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ReceiptDate</strong>
                    <input type="text" name="ReceiptDate" value="{{ $order->ReceiptDate }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Payment</strong>
                    <input type="number" name="Payment" value="{{ $order->Payment }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Note</strong>
                    <input type="text" name="Note" value="{{ $order->Note }}"class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status</strong>
                    <input type="number" name="Status" value="{{ $order->Status }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total</strong>
                    <input type="number" name="Total" value="{{ $order->Total }}"class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection