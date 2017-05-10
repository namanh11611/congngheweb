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
<<<<<<< HEAD
                    <span class="sale tooltip-test">Sale</span>
=======
>>>>>>> 4dc4d890a4caba765c8e7996dfa504d7abfa3d81
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
        @foreach($product as $item)
            <li class="span3">
<<<<<<< HEAD
                <a class="prdocutname" href="product.html">{!! $item->name !!}</a>
=======
                <a class="prdocutname" href="{!! url('chi-tiet-san-pham',[$item->id,$item->alias]) !!}">{!! $item->name !!}</a>
>>>>>>> 4dc4d890a4caba765c8e7996dfa504d7abfa3d81
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
@endsection