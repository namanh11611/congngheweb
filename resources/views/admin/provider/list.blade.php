@extends('admin.master')
@section('controller', 'Provider')
@section('action', 'List')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Provider Name</th>
            <th>Provider Address</th>
            <th>Phone Number</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 0 ?>
        @foreach($data as $item_provider)
        <?php $stt += 1 ?>
        <tr class="odd gradeX" align="center">
            <td>{!! $stt !!}</td>
            <td>{!! $item_provider['name_provider'] !!}</td>
            <td>{!! $item_provider['address'] !!}</td>
            <td>{!! $item_provider['phone_number'] !!}</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! URL::route('admin.provider.getDelete', $item_provider['id']) !!}"
                                                                      onclick="return xacnhanxoa('Do You Want To Delete This User')"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.provider.getEdit', $item_provider['id']) !!}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection()
