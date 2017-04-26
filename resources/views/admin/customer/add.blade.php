@extends('admin.master')
@section('description', 'User')
@section('author', 'Nam Anh')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Customer
            <small>Add</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
    @if(count($errors) > 0)
    <div class="alert alert-danger">
      <h3 class="error"> {{'Lỗi dữ liệu nhập vào, vui lòng kiểm tra lại !'}}</h3>
    </div>
     @endif
        <form action = "{!! route('admin.customer.getAdd') !!}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
            <button type="submit" class="btn btn-default">User Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </form>
    </div>
</div>
@endsection