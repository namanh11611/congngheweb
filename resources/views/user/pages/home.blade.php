@extends('user.master')
@section('description', 'Home')
@section('author', 'Nam Anh')
@section('content')
<!-- Featured Product-->
<section id="featured" class="row mt40">
    <div class="container">
        <h1 class="heading1"><span class="maintext">Featured Products</span><span class="subtext"> See Our Most featured Products</span>
        </h1>
        <ul class="thumbnails">
             @foreach($product as $item)
            <li class="span3">
                <a class="prdocutname" href="{!! url('chi-tiet-san-pham',[$item->id,$item->alias]) !!}">{!! $item->name !!}</a>
                <div class="thumbnail">
                    <a href="{!! url('chi-tiet-san-pham',[$item->id,$item->alias]) !!}"><img alt="" src="{!! asset('../resources/upload/'.$item->image) !!}"></a>
                    <div class="pricetag">
                        <span class="spiral"></span><a href="{!! url('mua-hang',[$item->id,$item->alias]) !!}" class="productcart">ADD TO CART</a>
                        <div class="price">
                            <div class="pricenew">{!! number_format($item->price,0,",",".") !!}</div>
                            <div class="priceold"></div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</section>

<!-- Latest Product-->
<section id="latest" class="row">
    <div class="container">
        <h1 class="heading1"><span class="maintext">Latest Products</span><span class="subtext"> See Our  Latest Products</span>
        </h1>
        <ul class="thumbnails">
        @foreach($lasted_product as $lasted_item)
            <li class="span3">
                <a class="productname" href="{!! url('chi-tiet-san-pham',[$item->id,$item->alias]) !!}">{!! $lasted_item->name !!}</a>
                <div class="thumbnail">
                    <a href="{!! url('chi-tiet-san-pham',[$lasted_item->id,$lasted_item->alias]) !!}"><img alt="" src="{!! asset('../resources/upload/'.$lasted_item->image) !!}"></a>
                    <div class="pricetag">
                        <span class="spiral"></span><a href="{!! url('mua-hang',[$lasted_item->id,$lasted_item->alias]) !!}" class="productcart">ADD TO CART</a>
                        <div class="price">
                            <div class="pricenew">{!! number_format($lasted_item->price,0,",",".") !!}</div>
                            <div class="priceold"></div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
            
        </ul>
    </div>
</section>
@endsection