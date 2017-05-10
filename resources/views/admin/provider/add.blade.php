@extends('admin.master')
@section('controller', 'Provider')
@section('action', 'Add')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.blocks.error')
    <form action="" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <div class="form-group">
            <label>Provider Name</label>
            <input class="form-control" name="txtProviderName" placeholder="Please Enter Provider Name" value="{!! old('txtProviderName') !!}"/>
        </div>
        <div class="form-group">
            <label>Provider Address</label>
            <input class="form-control" name="txtProviderAddress" placeholder="Please Enter Provider Address" value="{!! old('txtProviderAddress') !!}"/>
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input class="form-control" name="txtPhoneNumber" placeholder="Please Enter Phone Number" value="{!! old('txtPhoneNumber') !!}"/>
        </div>
        <button type="submit" class="btn btn-default">Provider Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>
@endsection()