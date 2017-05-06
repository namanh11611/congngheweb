@extends('admin.master')
@section('description', 'User')
@section('author', 'Nam Anh')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">User
            <small>List</small>
            @if(isset($usrLog))
            <small>{{$usrLog->username}}</small>
            @endif
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Username</th>
                <th>Level</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        @foreach($user as $item_user)
            <tr class="odd gradeX" align="center">
                <td>{!! $item_user["id"] !!}</td>
                <td>{!! $item_user["username"] !!}</td>
                <td>{!! $item_user["level"] !!}</td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Không')" href="{!!
                URL::route('admin.user.getDelete',$item_user['id']) !!}"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!!
                URL::route('admin.user.getEdit',$item_user['id']) !!}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection