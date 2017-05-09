@extends('admin.master')
@section('controller', 'Order Input')
@section('action', 'List')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Order Code</th>
            <th>Amount Payed</th>
            <th>Total</th>
            <th>Date Input</th>
            <th>View Detail</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 0 ?>
        @foreach($order as $item_order)
        <?php $stt += 1 ?>
        <tr class="odd gradeX" align="center">
            <td>{!! $stt !!}</td>
            <td>{!! $item_order['bill_code'] !!}</td>
            <td>{!! number_format($item_order["amount_payed"], 0, ",", ".") !!}</td>
            <td>{!! number_format(totalOrderIn($item_order['id']), 0, ",", ".") !!}</td>
            <td>{!! $item_order['date_input'] !!}</td>
            <td class="center"><i class="fa fa-eye  fa-fw"></i><a href="#"> View</a></td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! URL::route('admin.orderin.getDelete', $item_order['id']) !!}"
                                                                      onclick="return xacnhanxoa('Do You Want To Delete This User')"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.orderin.getEdit', $item_order['id']) !!}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection()
