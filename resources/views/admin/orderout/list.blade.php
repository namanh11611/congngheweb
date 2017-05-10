@extends('admin.master')
@section('controller', 'Order Output')
@section('action', 'List')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th class="sorting_desc" aria-sort="descending">ID Order</th>
            <th>Customer</th>
            <th>Status</th>
            <th>Total</th>
            <th>Date Added</th>
            <th>Date Modified</th>
            <th>Treat Order</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order as $item_order)
        <tr class="odd gradeX" align="center">
            <td>{!! $item_order['id'] !!}</td>
            <td>
                <?php
                    $customer = DB::table('customers')->where('id', $item_order['customer_id'])->first();
                    echo $customer->first_name.' '.$customer->last_name;
                ?>
            </td>
            <td>{!! $item_order['status'] !!}</td>
            <td>
                <?php
                    $detail_order = DB::table('order_out_products')->where('orderout_id', $item_order['id'])->get();
//                        echo '<pre>';
//                        print_r($detail_order);
//                        echo '</pre>';
                    $total = 0;
                    foreach ($detail_order as $item_detail){
                        $total += $item_detail->quantity*$item_detail->price_out;
                    }
                    echo number_format($total, 0, ",", ".");
                ?>
            </td>
            <td>{!! $item_order['created_at'] !!}</td>
            <td>{!! $item_order['updated_at'] !!}</td>
            @if(strcmp($item_order['status'], 'Completed') == 0)
                <td class="center"><i class="fa fa-th-large fa-fw"></i> <a href="">View</a></td>
            @else
                <td class="center"><i class="fa fa-th-large fa-fw"></i> <a href="{!! URL::route('admin.orderout.getTreat', $item_order['id']) !!}">Treat</a></td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endsection()
