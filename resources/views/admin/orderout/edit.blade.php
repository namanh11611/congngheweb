@extends('admin.master')
@section('controller', 'Order Output')
@section('action', 'Treat')
@section('content')
<div class="col-lg-12" style="padding-bottom:120px">
    @include('admin.blocks.error')
    <div class="col-lg-4">
        <table class="table table-striped table-bordered table-hover">
            <thead align="center">
                <tr>
                    <th>Customer</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php
                            echo $customer['first_name'].' '.$customer['last_name'].'<br>';
                            echo $customer['adress'].'<br>';
                            echo 'PostCode '.$customer['post_code'].'<br>';
                            echo 'Phone '.$customer['phone_number'];
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
    <div class="col-lg-8">
        <table class="table table-striped table-bordered table-hover">
            <thead align="center">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($detail as $item_detail)
            <tr>
                <td>
                    <?php
                        $product = DB::table('products')->where('id', $item_detail->product_id)->first();
                        echo $product->name;
                    ?>
                </td>
                <td class="text-right">{!! $item_detail->quantity !!}</td>
                <td class="text-right">{!! number_format($item_detail->price_out, 0, ',', '.') !!} đ</td>
                <td class="text-right">{!! number_format($item_detail->price_out*$item_detail->quantity, 0, ',', '.') !!} đ</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3" class="text-right">Sub-Total</td>
                <td class="text-right">{!! number_format(totalOrderOut($order->id)*0.9, 0, ',', '.') !!} đ</td>
            </tr>
            <tr>
                <td colspan="3" class="text-right">VAT(10%)</td>
                <td class="text-right">{!! number_format(totalOrderOut($order->id)*0.1, 0, ',', '.') !!} đ</td>
            </tr>
            <tr>
                <td colspan="3" class="text-right">Total</td>
                <td class="text-right">{!! number_format(totalOrderOut($order->id), 0, ',', '.') !!} đ</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div id="divcontrol" class="pull-right">
        <div class="col-lg-12 pull-right" style="margin-top: 15px">
            @if(strcmp($order->status, "Pending") == 0 || strcmp($order->status, "Return") == 0)
            <button id="btntreat" class="btn btn-default">Treat</button>
            <a id="btncancel" class="btn btn-default" onclick="return xacnhanxoa('Bạn có chắc chắn hủy hóa đơn')" href="{!! URL::route('admin.orderout.getCanceled', $order->id) !!}">Canceled</a>
            @elseif(strcmp($order->status, "Processing") == 0)
            <a class="btn btn-default" onclick="return xacnhanxoa('Bạn có chắc chắn với thao tác')" href="{!! URL::route('admin.orderout.getCompleted', $order->id) !!}">Completed</a>
            <a class="btn btn-default" onclick="return xacnhanxoa('Bạn có chắc chắn với thao tác')" href="{!! URL::route('admin.orderout.getReturn', $order->id) !!}">Return</a>
            @endif

        </div>
    </div>
    <div id="divborder" class="col-lg-12" style="background: lavender"></div>
    <div id="divtreating" class="col-lg-12" style="margin-top: 15px">
        <form action="" method="post">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <label>Post Office</label><select class="form-control" name="sltPostOffice">
                    <option value="0">Please Choose Post Office</option>
                    @foreach($list_post_office as $item_post_office)
                    <option value={!! $item_post_office->id !!}>{!! $item_post_office->name !!}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-default" onclick="return xacnhanxoa('Bạn có chắc chắn với thao tác')">Treat Order</button>
        </form>
    </div>
</div>
@endsection()
