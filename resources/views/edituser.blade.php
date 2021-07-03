@extends('layouts.userlog')

@section('edit')
<h1 style="text-align: center">Chỉnh sửa thông tin người dùng</h1>
<div class="container">
        <form action="" style="border: none;" method="POST">
            {{-- <form action="{{ route('customers.update') }}" style="border: none;" method="POST"> --}}
                @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Full Name</strong>
                        <input type="text" name="fullName" value="{{ $customer->fullName }}" class="form-control" placeholder="Nguyễn Văn A">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Username</strong>
                        <input type="text" name="username" value="{{ $customer->username }}" class="form-control" placeholder="NVA123">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gender</strong>
                        <input type="number" name="gender" value="{{ $customer->gender }}" class="form-control" placeholder="1: Male    2: Female    3: Other">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Phone</strong>
                        <input type="number" name="phone" value="{{ $customer->phone }}" class="form-control" placeholder="0124356789">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Address</strong>
                        <input type="text" name="address" value="{{ $customer->address }}" class="form-control" placeholder="13 Mai Văn Vĩnh, Tân Quy, Quận 7, Thành phố Hồ Chí Minh">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email</strong>
                        <input type="text" name="email" value="{{ $customer->email }}" class="form-control" placeholder="abcxyz@gmail.com">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Password</strong>
                        <input type="text" name="password" value="{{ $customer->password }}" class="form-control" placeholder="nva24rhe3">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
</div>
@endsection