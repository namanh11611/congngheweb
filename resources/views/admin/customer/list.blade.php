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
<<<<<<< HEAD
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!!
                URL::route('admin.customer.getDelete',$item_customer['id']) !!}"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!!
                URL::route('admin.customer.getEdit',$item_customer['id']) !!}">Edit</a></td>
=======
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
>>>>>>> 637970dab95fa97fdb6091913e9fc9b6288cf574
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection