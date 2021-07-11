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
        <li class="nav-item active">
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
        <h1 class="h3 mb-0">Edit Promotion</h1>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('promotion.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
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
  
    <form action="{{ route('promotion.update',$data->idPromotion) }}" method="POST" id="editPromo">
        @csrf
        @method('PUT')
        <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Promotion Type</strong>
                    <select class="form-control" id="promotionType" name="promotionType" onclick="editChanged(this)" required focus>
                        
                        <option value="{{ $data->promotionType }} " hidden disabled selected>
                            @if ($data->promotionType==0)
                                    <td>
                                     Percent discount
                                    </td>
                                    @elseif ($data->promotionType ==1) 
                                    <td>
                                     Money discount
                                    </td>
                                @endif
                        </option>
                        <option value="0">Percent discount</option>
                        <option value="1">Money discount</option>
                        <!--@if ($data->promotionType==0)
                            <option value="2">Money discount</option>
                        @elseif ($data->promotionType ==1) 
                            <option value="1">Percent discount</option>
                        @endif-->
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Promotion Code</strong>
                    <input type="text" name="promotionCode" value="{{ $data->promotionCode }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" id="percentDis">
                    <strong>Percent discount</strong>
                    <input type="text" id="percentPromo" name="percentPromo"  value="{{ $data->percentPromo }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" id="moneyDis">
                    <strong>Money discount</strong>
                    <input type="text" id="moneyPromo" name="moneyPromo" value="{{ $data->moneyPromo }}" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Expire Day</strong>
                    <input type="text" name="expireDay" value="{{ $data->expireDay }}" class="form-control" min="2020-07-11" max="2022-12-31">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success" onclick="updateChanged(this)">Submit</button>
            </div>
        </div>
    </form>
</div>
<script src="{{ asset('js/promotion.js') }}"></script>
@endsection