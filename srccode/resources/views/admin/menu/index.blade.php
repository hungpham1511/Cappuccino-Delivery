@extends('layouts.menu')

@section('content')

<!-- Begin Page Content -->
<div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Menu</h1>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('menu.create') }}" title="Create a drink"> <i class="fas fa-plus-circle" style="padding-top: 5%">&nbsp;Add Drinks</i></a>
        </div>
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
                                        <form action="{{ route('menu.index') }}" method="GET" role="search">
                                            <div class="input-group">
                                                <span class="input-group-btn mr-2">
                                                    <button class="btn btn-primary" type="submit" title="Search projects">
                                                        <span class="fas fa-search"></span>
                                                    </button>
                                                </span>
                                                <input type="text" class="form-control" name="term" placeholder="Search Name" id="term">
                                                <a href="{{ route('menu.index') }}">
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
                            {{-- <div class="dataTable_filter" id="dataTables_filter">
                                <label>Search:
                                    <input type="search" class="form-control form-control-sm" placeholder aria-controls="dataTable">
                                </label>
                            </div> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th>Category</th>
                                    <th>IdDrink</th>
                                    <th>Name</th>
                                    <th>Picture</th>
                                    <th>Price</th>  
                                    <th>Description</th>
                                    <th>Action</th>
                                    
                                </tr>
                                @foreach ($drinks as $product)
                                <tr>
                                    <td>{{ $product->category }}</td>
                                    <td>{{ $product->idDrink }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->picture }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        <form action="{{ route('menu.destroy',$product->idDrink) }}" method="POST">
                                            <a class="btn btn-warning" href="{{ route('menu.edit',$product->idDrink) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete this drink?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <div class="d-flex justify-content-center">
                                {!! $drinks->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->

@endsection