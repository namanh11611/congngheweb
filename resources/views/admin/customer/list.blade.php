@extends('admin.master')
@section('description', 'User')
@section('author', 'Nam Anh')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">User
            <small>List</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        @foreach($customer as $item_customer)
            <tr class="odd gradeX" align="center">
                <td>{!! $item_customer["id"] !!}</td>
                <td>{!! $item_customer["firs_name"] !!}</td>
                <td>{!! $item_customer["last_name"] !!}</td>
                <td>{!! $item_customer["phone_number"] !!}</td>
                <td>{!! $item_customer["address"] !!}</td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection