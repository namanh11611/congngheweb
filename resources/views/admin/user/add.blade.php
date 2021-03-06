@extends('admin.master')
@section('description', 'User')
@section('author', 'Nam Anh')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">User
            <small>Add</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.blocks.error')
        <form action = "{!! route('admin.user.getAdd') !!}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" name="txtUser" placeholder="Please Enter Username" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" />
            </div>
            <div class="form-group">
                <label>RePassword</label>
                <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" />
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input class="form-control" name="txtFirstName" placeholder="Please Enter FistName" />
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input class="form-control" name="txtLastName" placeholder="Please Enter LastName" />
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input class="form-control" name="txtPhoneNumber" placeholder="Please Enter Phonebumer" />
            </div>
            <div class="form-group">
                <label>Address</label>
                <input class="form-control" name="txtAddress" placeholder="Please Enter Username" />
            </div>
            <div class="form-group">
                <label>User Level</label>
                <label class="radio-inline">
                    <input name="rdoLevel" value="1" checked="" type="radio">SuperAdmin
                </label>
                <label class="radio-inline">
                    <input name="rdoLevel" value="2" type="radio">Admin
                </label>
                <label class="radio-inline">
                    <input name="rdoLevel" value="3" type="radio">Member
                </label>
            </div>
            <button type="submit" class="btn btn-default">User Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </form>
    </div>
</div>
@endsection