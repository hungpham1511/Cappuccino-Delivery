@extends('layouts.admin')

@section('sidebar')
    @parent

    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                <span>Today Order</span></a>
        </li>
        
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('menu.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Menu</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Receipt -->
        <li class="nav-item">
            <a class="nav-link"  href="{{ route('receipts.index') }}">
                <i class="fas fa-money-check-alt"></i>
                <span>Receipts</span></a>
        </li>
        <hr class="sidebar-divider">
        <!-- Nav Item - Topping -->
        <li class="nav-item">
            <a class="nav-link"  href="{{ route('topping.index') }}">
                <i class="fas fa-cookie-bite"></i>
                <span>Topping</span></a>
        </li>

        <hr class="sidebar-divider">

        <!-- Nav Item - Users -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('customers.index') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Customers</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Nav Item - Promotions -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('promotion.index') }}">
                <i class="fas fa-tags"></i>
                <span>Promotion</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">


    </ul>
@endsection

@section('content')
    <!-- Page Heading -->
     <!-- Begin Page Content -->
     <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Today order</h1>
        </div>
   
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
                                        <form action="{{ route('dashboard') }}" method="GET" role="search">
                                            <div class="input-group">
                                                <span class="input-group-btn mr-2">
                                                    <button class="btn btn-primary" type="submit" title="Search projects">
                                                        <span class="fas fa-search"></span>
                                                    </button>
                                                </span>
                                                <input type="text" class="form-control" name="term" placeholder="Search Name" id="term">
                                                <a href="{{ route('dashboard') }}">
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
                                    <th>Id Receipt</th>
                                    <th>Id User</th>
                                    <th>Receipt Date</th>
                                    <th>Payment</th>
                                    <th>Note</th>
                                    <th>Status</th>                                    
                                    <th>Total</th>                                                                     
                                    <th>Action</th>                                   
                                </tr>
                                @foreach ($check as $receipt)
                                    
                                            <tr>
                                                <td>{{ $receipt->idReceipt }}</td>
                                                <td>{{ $receipt->idUser }}</td>
                                                <td>{{ $receipt->receiptDate }}</td>
                                                @if ($receipt->payment == 1)
                                                    <td>COD</td>
                                                @elseif ($receipt->payment == 2)
                                                    <td>Momo</td>
                                                @else <td>Bank</td>
                                                @endif
                                                <td>{{ $receipt->note }}</td>
                                                @if ($receipt->status == 1)
                                                    <td>Order Received</td>
                                                @elseif ($receipt->status == 2)
                                                    <td>Payment Received</td>
                                                @elseif ($receipt->status == 3)
                                                    <td>Delivering</td>
                                                @else <td>Finish</td>
                                                @endif
                                                @if ($receipt->isWeeklyBook==true)
                                                    <td class="delivered">
                                                    Booked
                                                    </td>
                                                @else 
                                                    <td>
                                                    None
                                                    </td>
                                                @endif
                                                <td>{{ $receipt->total }}</td>
                                                
                                                <td>
                                                    <form action="{{ route('receipts.destroy',$receipt->idReceipt) }}" method="POST">
                                                        <a class="btn btn-warning" href="{{ route('receipts.edit',$receipt->idReceipt) }}">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete this product?')">Delete</button>
                                                    </form>
                                                </td>
                                            
                                            </tr>
                                        
                                    
                                @endforeach
                            </table>
                            <div class="d-flex justify-content-center">
                                {!! $receipts->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
