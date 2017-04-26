@extends('admin.master')
@section('description', 'User')
@section('author', 'Nam Anh')
@section('content')
<div class="row">
    <div class="col-lg-12">
<<<<<<< HEAD
        <h1 class="page-header">Customer
=======
        <h1 class="page-header">User
>>>>>>> 637970dab95fa97fdb6091913e9fc9b6288cf574
            <small>Edit</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
<<<<<<< HEAD
    @if(count($errors) > 0)
    <div class="alert alert-danger">
      <h3 class="error"> {{'Lỗi dữ liệu nhập vào, vui lòng kiểm tra lại !'}}</h3>
    </div>
     @endif
        <form action="" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label>First Name</label>
                <input class="form-control" name="txtFirstName" value="
                {!!old('txtFirstName', isset($data) ? $data['firs_name'] : null)!!}" />
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input class="form-control" name="txtLastName" value="
                {!!old('txtLastName', isset($data) ? $data['last_name'] : null)!!}" />
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input class="form-control" name="txtPhoneNumber" value="
                {!!old('txtPhoneNumber', isset($data) ? $data['phone_number'] : null)!!}" />
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input class="form-control" name="txtAddress" value="
                {!!old('txtAddress', isset($data) ? $data['address'] : null)!!}" />
=======
        <form action="" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" name="txtUser" value="
                {!!
                    old('txtUser', isset($data) ? $data['username'] : null)
                !!}" disabled />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="txtPass" 
                 placeholder="Please Enter Password" />
            </div>
            <div class="form-group">
                <label>RePassword</label>
                <input type="password" class="form-control" name="txtRePass" 
                placeholder="Please Enter RePassword" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="txtEmail" 
                value="{!!
                    old('txtEmail', isset($data) ? $data['email'] : null)
                !!}" 
                placeholder="Please Enter Email" />
            </div>
            <div class="form-group">
                <label>User Level</label>
                <label class="radio-inline">
                    <input name="rdoLevel" value="1" type="radio"
                    @if($data['level'] == 1 )
                     checked="checked" 
                     @endif
                    >Admin
                </label>
                <label class="radio-inline">
                    <input name="rdoLevel" value="2" type="radio"
                    @if($data['level'] == 2 ||  $data['level'] == 3)
                     checked="checked" 
                     @endif
                    >Member
                </label>
>>>>>>> 637970dab95fa97fdb6091913e9fc9b6288cf574
            </div>
            <button type="submit" class="btn btn-default">User Edit</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </form>
    </div>
</div>
@endsection