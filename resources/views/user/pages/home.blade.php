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
                    <span class="sale tooltip-test">Sale</span>
<<<<<<< HEAD
                    <a href="{!! url('chi-tiet-san-pham',[$item->id,$item->alias]) !!}"><img alt="" src="{!! asset('../resources/upload/'.$item->image) !!}"></a>
=======
                    <a href="#"><img alt="" src="{!! asset('../resources/upload/'.$item->image) !!}"></a>
>>>>>>> a445310d4c7577143afd9a50b08b795f9c6f5a33
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
        @foreach($product as $item)
            <li class="span3">
                <a class="prdocutname" href="product.html">LAPTOP DELL VOSTRO</a>
                <div class="thumbnail">
<<<<<<< HEAD
                    <a href="{!! url('chi-tiet-san-pham',[$item->id,$item->alias]) !!}"><img alt="" src="{!! url('user/img/product1a.jpg') !!}"></a>
=======
                    <a href="#"><img alt="" src="{!! url('user/img/product1.jpg') !!}"></a>
                    <div class="pricetag">
                        <span class="spiral"></span><a href="{!! url('mua-hang',[$item->id,$item->alias]) !!}" class="productcart">ADD TO CART</a>
                        <div class="price">
                            <div class="pricenew">$4459.00</div>
                            <div class="priceold">$5000.00</div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="span3">
                <a class="prdocutname" href="product.html">MACBOOK AIR 2015</a>
                <div class="thumbnail">
                    <a href="#"><img alt="" src="{!! url('user/img/product2.jpg') !!}"></a>
                    <div class="pricetag">
                        <span class="spiral"></span><a href="{!! url('mua-hang',[$item->id,$item->alias]) !!}" class="productcart">ADD TO CART</a>
                        <div class="price">
                            <div class="pricenew">$4459.00</div>
                            <div class="priceold">$5000.00</div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="span3">
                <a class="prdocutname" href="product.html">LAPTOP DELL VOSTRO</a>
                <div class="thumbnail">
                    <span class="new tooltip-test">New</span>
                    <a href="#"><img alt="" src="{!! url('user/img/product1.jpg') !!}"></a>
                    <div class="pricetag">
                        <span class="spiral"></span><a href="{!! url('mua-hang',[$item->id,$item->alias]) !!}" class="productcart">ADD TO CART</a>
                        <div class="price">
                            <div class="pricenew">$4459.00</div>
                            <div class="priceold">$5000.00</div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="span3">
                <a class="prdocutname" href="product.html">MACBOOK AIR 2015</a>
                <div class="thumbnail">
                    <a href="#"><img alt="" src="{!! url('user/img/product2.jpg') !!}"></a>
>>>>>>> a445310d4c7577143afd9a50b08b795f9c6f5a33
                    <div class="pricetag">
                        <span class="spiral"></span><a href="{!! url('mua-hang',[$item->id,$item->alias]) !!}" class="productcart">ADD TO CART</a>
                        <div class="price">
                            <div class="pricenew">$4459.00</div>
                            <div class="priceold">$5000.00</div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
            
        </ul>
    </div>
</section>
@endsection