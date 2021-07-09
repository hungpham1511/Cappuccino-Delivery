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
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0">Edit receipt infomation</h1>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('receipts.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
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

    <form action="{{ route('receipts.update',$receipt->idReceipt) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>IdUser</strong>
                    <input type="number" name="idUser" value="{{ $receipt->idUser }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>IdReceipt</strong>
                    <input type="text" name="idReceipt" value="{{ $receipt->idReceipt }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ReceiptDate</strong>
                    <input type="text" name="receiptDate" value="{{ $receipt->receiptDate }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Payment</strong>
                    <select class="form-control" id="payment" name="payment" onclick="editChanged(this)" required focus>
                        <option value="{{ $receipt->payment }} " hidden disabled selected>
                            @if ($receipt->payment==1)
                                <td>COD</td>
                            @elseif ($receipt->payment ==2) 
                                <td>Momo</td>
                            @elseif ($receipt->payment ==3) 
                                <td>Bank</td>
                            @endif
                        </option>
                        <option value="1">COD</option>
                        <option value="2">Momo</option>
                        <option value="3">Bank</option>
                        <!--@if ($receipt->payment==1)
                        @elseif ($receipt->payment ==2) 
                        @elseif ($receipt->payment ==3) 
                        @endif-->
                    </select>
                    {{-- <input type="number" name="payment" value="{{ $receipt->payment }}" class="form-control"> --}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status</strong>
                        <select class="form-control" id="status" name="status" onclick="editChanged(this)" required focus>
                            <option value="{{ $receipt->status }} " hidden disabled selected>
                                @if ($receipt->status==1)
                                    <td>Order Received</td>
                                @elseif ($receipt->status ==2) 
                                    <td>Payment Received</td>
                                @elseif ($receipt->status ==3) 
                                    <td>Delivering</td>
                                @elseif ($receipt->status ==3) 
                                    <td>Finished</td>
                                @endif
                            </option>
                            <option value="1">Order Received</option>
                            <option value="2">Payment Received</option>
                            <option value="3">Delivering</option>
                            <option value="4">Finished</option>
                            <!--@if ($receipt->status==1)
                            @elseif ($receipt->status ==2) 
                            @elseif ($receipt->status ==3) 
                            @elseif ($receipt->status ==4) 
                            @endif-->
                        </select>
                    {{-- <input type="text" name="status" value="{{ $receipt->status }}" class="form-control"> --}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Weekly book</strong>
                    <select class="form-control" id="isWeeklyBook" name="isWeeklyBook" onclick="editChanged(this)" required focus>
                        <option value="{{ $receipt->isWeeklyBook }} " hidden disabled selected>
                            @if ($receipt->status==0)
                                <td>None</td>
                            @elseif ($receipt->status ==1) 
                                <td>Booked</td>
                            @endif
                        </option>
                        <option value="0">None</option>
                        <option value="1">Booked</option>
                        <!--@if ($receipt->isWeeklyBook==0)
                        @elseif ($receipt->isWeeklyBook ==1) 
                        @endif-->
                    </select>
                    {{-- <input type="number" name="isWeeklyBook" value="{{ $receipt->isWeeklyBook }}" class="form-control" placeholder="0: none 1: booked"> --}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total</strong>
                    <input type="number" name="total" value="{{ $receipt->total }}"class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Note</strong>
                    <input type="text" name="note" value="{{ $receipt->note }}"class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection