@extends('layouts.menu')

@section('content')
<div id="wrapper">  
    
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Orders</h1>
            <div class="pull-left">
                <a class="btn btn-primary" href="{{ route('orders.create') }}" title="Create an order"> <i class="fas fa-plus-circle" style="padding-top: 5%">&nbsp;Add Orders</i></a>
            </div>
        </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        {{-- <button class="btn add" data-toggle="modal" data-target="#addModal"><i class="add-btn fas fa-plus"></i></button> --}}
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6" style="margin-bottom: 15px;">
                            <div>
                                <div class="mx-auto pull-right">
                                    <div class="">
                                        <form action="{{ route('orders.index') }}" method="GET" role="search">
                                            <div class="input-group">
                                                <span class="input-group-btn mr-2">
                                                    <button class="btn btn-primary" type="submit" title="Search projects">
                                                        <span class="fas fa-search"></span>
                                                    </button>
                                                </span>
                                                <input type="text" class="form-control" name="term" placeholder="Search Name" id="term">
                                                <a href="{{ route('orders.index') }}">
                                                    <span class="input-group-btn ml-2">
                                                        <button class="btn btn-danger" type="button" title="Refresh page">
                                                            <span class="fas fa-sync-alt"></span>
                                                        </button>
                                                    </span>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th>IdReceipt</th>
                                    <th>ReceiptDate</th>
                                    <th>Payment</th>
                                    <th>Note</th>
                                    <th>Status</th>  
                                    <th>Total</th>
                                    <th>Action</th>
                                    
                                </tr>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->IdReceipt }}</td>
                                    <td>{{ $order->ReceiptDate }}</td>
                                    <td>{{ $order->Payment }}</td>
                                    <td>{{ $order->Note }}</td>
                                    <td>{{ $order->Status }}</td>
                                    <td>{{ $order->Total }}</td>
                                    <td>
                                        <form action="{{ route('orders.destroy',$order->IdReceipt) }}" method="POST">
                                            <a class="btn btn-warning" href="{{ route('orders.edit',$order->IdReceipt) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete this product?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <div class="d-flex justify-content-center">
                                {!! $orders->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End of Main Content -->
</div>
@endsection
