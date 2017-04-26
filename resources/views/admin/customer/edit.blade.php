@extends('admin.master')
@section('description', 'User')
@section('author', 'Nam Anh')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Customer
            <small>Edit</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
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
            </div>
            <button type="submit" class="btn btn-default">User Edit</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </form>
    </div>
</div>
@endsection