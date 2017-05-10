@extends('user.master')
@section('description', 'Checkout')
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
            <li class="active">Checkout</li>
        </ul>
        <div class="row">
            <!-- Account Login-->
            <div class="span9">
                <div class="checkoutsteptitle">Step 1 : Delivery Details<a class="modify">Modify</a>
                </div>
                <div class="checkoutstep">
                    <div class="row">
                        <form class="form-horizontal">
                            <fieldset>
                                <div class="span4">
                                    <div class="control-group">
                                        <label class="control-label" >First Name<span class="red">*</span></label>
                                        <div class="controls">
                                            <input type="text" class=""  value="">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" >Last Name<span class="red">*</span></label>
                                        <div class="controls">
                                            <input type="text" class=""  value="">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" >E-Mail<span class="red">*</span></label>
                                        <div class="controls">
                                            <input type="text" class=""  value="">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" >Telephone<span class="red">*</span></label>
                                        <div class="controls">
                                            <input type="text" class=""  value="">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" >Fax</label>
                                        <div class="controls">
                                            <input type="text" class=""  value="">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" >Password<span class="red">*</span></label>
                                        <div class="controls">
                                            <input type="text" class=""  value="">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" >Password Confirm<span class="red">*</span></label>
                                        <div class="controls">
                                            <input type="text" class=""  value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <label class="control-label" >Company</label>
                                        <div class="controls">
                                            <input type="text" class=""  value="">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" >Company Id</label>
                                        <div class="controls">
                                            <input type="text" class=""  value="">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" >Address 1<span class="red">*</span></label>
                                        <div class="controls">
                                            <input type="text" class=""  value="">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" >Address 2</label>
                                        <div class="controls">
                                            <input type="text" class=""  value="">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" >City<span class="red">*</span></label>
                                        <div class="controls">
                                            <input type="text" class=""  value="">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" >Post Code<span class="red">*</span></label>
                                        <div class="controls">
                                            <input type="text" class=""  value="">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" >Country<span class="red">*</span></label>
                                        <div class="controls">
                                            <select >
                                                <option>Please Select</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" >Region / State<span class="red">*</span></label>
                                        <div class="controls">
                                            <select >
                                                <option>Please Select</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <a class="btn btn-orange pull-right" href="{!! url('home') !!}" onclick="xacNhanMuaHang('Bạn đã đặt hàng thành công?')">Confirm</a>
                </div>
                <div class="checkoutsteptitle">Step 2: Confirm Order<a class="modify">Modify</a>
                </div>
                <div class="checkoutstep">
                    <div class="cart-info">
                        <table class="table table-striped table-bordered">
                            < <tr>
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
                    <div class="row">
                        <div class="pull-right">
                            <div class="span4 pull-right">
                                <table class="table table-striped table-bordered ">
                                    <tbody>
                
                                    <tr>
                                        <td><span class="extra bold totalamout">Total :</span></td>
                                        <td><span class="bold totalamout">{!! $total1 !!}</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar Start-->
            <div class="span3">
                <aside>
                    <div class="sidewidt">
                        <h2 class="heading2"><span> Checkout Steps</span></h2>
                        <ul class="nav nav-list categories">
                            <li>
                                <a class="active" href="#">Checkout Options</a>
                            </li>
                            <li>
                                <a href="#">Billing Details</a>
                            </li>
                            <li>
                                <a href="#">Delivery Details</a>
                            </li>
                            <li>
                                <a href="#">Delivery Method</a>
                            </li>
                            <li>
                                <a href="#"> Payment Method</a>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
            <!-- Sidebar End-->
        </div>
    </div>
</section>
<script type="text/javascript">
    function xacNhanMuaHang(msg) {
  if(window.confirm(msg)){
    return true;
  }
  return false;
}
</script>
@endsection