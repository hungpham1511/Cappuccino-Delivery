@extends('layouts.userlog')

@section('edit')
<h1 style="text-align: center">Chỉnh sửa thông tin người dùng</h1>
<div class="container">
    <form style="border: none;" action="" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Full Name</strong>
                    <input type="text" name="fullName" class="form-control" placeholder="Nguyễn Văn A">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Username</strong>
                    <input type="text" name="username" class="form-control" placeholder="NVA123">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gender</strong>
                    <input type="number" name="gender" class="form-control" placeholder="1: Male    2: Female    3: Other">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone</strong>
                    <input type="number" name="phone" class="form-control" placeholder="0124356789">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address</strong>
                    <input type="text" name="address" class="form-control" placeholder="13 Mai Văn Vĩnh, Tân Quy, Quận 7, Thành phố Hồ Chí Minh">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email</strong>
                    <input type="text" name="email" class="form-control" placeholder="abcxyz@gmail.com">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password</strong>
                    <input type="text" name="password" class="form-control" placeholder="nva24rhe3">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection