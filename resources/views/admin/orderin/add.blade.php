@extends('admin.master')
@section('controller', 'Order Input')
@section('action', 'Add')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.blocks.error')
    <form action="" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <div class="form-group">
            <label>Order Code</label>
            <input class="form-control" name="txtOrderCode" placeholder="Please Enter Order Code" />
        </div>
        <div class="form-group">
            <label>Amount Payed</label>
            <input class="form-control" name="txtAmountPayed" placeholder="Please Enter Amount Payed" />
        </div>
        <div class="form-group">
            <label>Date Input</label>
            <input id="datepicker" class="form-control" name="txtDateIn" placeholder="Please Enter Date Input" />
        </div>
        <div class="form-group">
            <label>Provider</label>
            <input class="form-control" name="txtProvider" placeholder="Please Enter Provider" list="providers"/>
            <datalist id="providers">
                @foreach($provider as $item_provider)
                    <option value="{!! $item_provider['name_provider'] !!}">
                @endforeach
            </datalist>
            <a class="btn btn-primary" style="margin: 10px 0 10px 0; float: right;"
               href="{!! route('admin.provider.getAdd') !!}" target="_blank">Add Provider</a>
        </div>
        <label style="margin-top: 40px; margin-bottom: 10px">Detail Order</label>
        <table class="table table-striped table-bordered table-hover" id="tbDetailOrderIn">
            <thead>
            <tr>
                <th width="40%" class="center">Name Product</th>
                <th width="20%" class="center">Quantity</th>
                <th class="center">Price Input</th>
                <th width="5%" class="center">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr class="odd gradeX" align="center">
                <td>
                    <input class="form-control" name="txtProductName[]" placeholder="Name Product" list="products"/>
                    <datalist id="products">
                        @foreach($product as $item_product)
                            <option value="{!! $item_product['name'] !!}">
                        @endforeach
                    </datalist>
                </td>
                <td><input class="form-control" name="txtQuantity[]" placeholder="Quantity"/></td>
                <td><input class="form-control" name="txtPriceIn[]" placeholder="Price Input"/></td>
                <td class="center"><button id="btnDeleteDetailOrderIn" type="button" class="btn btn-danger" title="Remove"><i class="fa fa-minus-circle"></i></button></td>
            </tr>
            <tr class="even gradeC" align="center">
                <td></td>
                <td></td>
                <td></td>
                <td class="center"><button type="button" id="btnAddDetailOrderIn" class="btn btn-primary" title="Add"><i class="fa fa-plus-circle"></i></button></td>
            </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-default">Order Input Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
        </form>
</div>
@endsection()