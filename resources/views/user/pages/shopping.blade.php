@extends('user.master')
@section('description', 'Shopping')
@section('author', 'Nam Anh')
@section('content')
<section id="product">
    <div class="container">
        <!--  breadcrumb -->
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
                <span class="divider">/</span>
            </li>
            <li class="active"> Shopping Cart</li>
        </ul>
        <h1 class="heading1"><span class="maintext">Shopping Cart</span><span class="subtext"> All items in your  Shopping Cart</span></h1>
        <!-- Cart-->
        <div class="cart-info">
            <table class="table table-striped table-bordered">
                <tr>
                    <th class="image">Image</th>
                    <th class="name">Product Name</th>       
                    <th class="quantity">Quantity</th>
                    <th class="total">Action</th>
                    <th class="price">Unit Price</th>
                    <th class="total">Total</th>

                </tr>
                <form method="POST" action="">
                     
                 @foreach ($content as $item)
                 <input  name="_token" type="hidden" value="{!! csrf_token() !!}" />
                <tr>                  
                    <td class="image"><a href="#"><img title="product" alt="product" src="{!! asset('../resources/upload/'.$item->options->img) !!}" height="50" width="50"></a></td>
                    <td  class="name"><a href="#">{!! $item->name !!}</a></td>                   
                    <td class="quantity"><input class="span1 qty" type="text" size="1" id="{!! $item->rowId !!}" value='{!! $item->qty !!}' name="quantity[40]" />
                    </td>
                    <td class="total"> 
                        <a href="#" class="update" id="{!! $item->rowId !!}" onclick="update_item('{!! $item->rowId !!}')"><img class="tooltip-test" data-original-title="Update" src="{!! asset('/user/img/update.png') !!}" alt=""></a>
                        <a href="{!! url('xoa-san-pham',['id'=>$item->rowId]) !!}"><img class="tooltip-test" data-original-title="Remove"  src="{!! asset('user/img/remove.png') !!}" alt=""></a></td>
                    <td class="price" id="price_{!! $item->rowId !!}">{!! $item->price !!}</td>
                    <td class="total sum_total_{!! $item->rowId !!}" id="total_{!! $item->rowId !!}">{!! $item->price*$item->qty !!}</td>
                </tr>
                @endforeach
                </form>
            </table>
        </div>
        <div class="container">
            <div class="pull-right">
                <div class="span4 pull-right">
                    <table class="table table-striped table-bordered ">
                       
                        <tr>
                            <td><span class="extra bold totalamout">Total :</span></td>
                            <td><span class="bold totalamout" id="sum_total">{!! $total1 !!}</span></td>
                        </tr>
                    </table>
                    <a href="{!! url('check-out') !!}"><input type="submit" value="CheckOut" class="btn btn-orange pull-right"></a>
                    <a href="{!! url('/') !!}" ><input type="submit" value="Continue Shopping" class="btn btn-orange pull-right mr10"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    
    function update_item(id)
    {
        var rowId = id;
        var qty = $("#"+id).val();
        var token = $("input[name='_token']").val();
        console.log(parseInt($("#price_" + id).html()));
        var total = qty*parseInt($("#price_" + id).html());
        $("#total_" + id).html(total);
        var sum_total = 0;
        // for (var i = 0; i < $(".sum_total").length; i++)
        // {
        //     sum_total += $(".sum_total")[i].html();
        // }
        @foreach ($content as $item)
            sum_total += parseInt($(".sum_total_" + '{!! $item->rowId !!}' ).html());
            // console.log(sum_total);
        @endforeach
        $("#sum_total").html(sum_total);
       // $.ajax({
       //     url: 'cap-nhat/' + rowId + '/' + qty,
       //     type: 'GET',
       //     cache: false,
       //     data: {"_token":token, 
       //          "id":rowId, "qty":qty},
       //     success: function (data) {
       //         if(data = "oke"){
       //              // window.location.reload();
       //         }
       //     }
       // });
    }
    
</script>
@endsection
<script type="text/javascript">
    
</script>