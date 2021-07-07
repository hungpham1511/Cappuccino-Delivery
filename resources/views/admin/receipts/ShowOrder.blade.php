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
        <li class="nav-item active">
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

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0">Show Detail Receipt</h1>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('receipts.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>IdUser:</strong>
                {{ $receipt->idUser }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>IdReceipt:</strong>
                {{ $receipt->idReceipt }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Amount:</strong>
                {{ $receipt->amount }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Size:</strong>
                {{ $receipt->size }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ReceiptDate:</strong>
                {{ $receipt->receiptDate }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Payment:</strong>
                {{ $receipt->payment }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Note:</strong>
                {{ $receipt->note }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{ $receipt->status }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Weekly book:</strong>
                {{ $receipt->isWeeklyBook }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tota:l</strong>
                {{ $receipt->total }}
            </div>
        </div>
    </div>
@endsection