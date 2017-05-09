@extends('admin.master')
@section('description', 'Product')
@section('author', 'Nam Anh')
@section('content')
<style>
    .img_current{width: 150px;}
    .img_detail{width: 150px;}
    .icon_del{position: absolute; top: 0px; Left: 140px;}
    #insert{
        margin-top: 20px;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Product
            <small>Edit</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        @include('admin.blocks.error')
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="sltParent">
                    <option value="">Please Choose Category</option>
                    <?php cate_parent($cate, 0, "--", $product["cate_id"]); ?>
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" placeholder="Please Enter The Product Name" value="{!! old('txtName', isset($product) ? $product['name'] : null) !!}"/>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" name="txtPrice" placeholder="Please Enter The Product Price" value="{!! old('txtPrice', isset($product) ? $product['price'] : null) !!}"/>
            </div>
            {{--<div class="form-group">--}}
                {{--<label>Intro</label>--}}
                {{--<textarea class="form-control" rows="3" name="txtIntro"></textarea>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--<label>Content</label>--}}
                {{--<textarea class="form-control" rows="3" name="txtContent"></textarea>--}}
            {{--</div>--}}
            <div class="form-group">
                <label>Image Current</label>
                <img src="{!! asset('../resources/upload/'.$product['image']) !!}" class="img_current"/>
            </div>
            <div class="form-group">
                <label>Images</label>
                <input type="file" name="fImages">
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input class="form-control" name="txtQuantity" placeholder="Please Enter The Number Of Products" value="{!! old('txtQuantity', isset($product) ? $product['quantity'] : null) !!}"/>
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control" name="txtDescription" rows="3">{!! old('txtDescription', isset($product) ? $product['description'] : null) !!}</textarea>
                <script type="text/javascript">ckeditor("txtDescription")</script>
            </div>
            {{--<div class="form-group">--}}
                {{--<label>Product Status</label>--}}
                {{--<label class="radio-inline">--}}
                    {{--<input name="rdoStatus" value="1" checked="" type="radio">Visible--}}
                {{--</label>--}}
                {{--<label class="radio-inline">--}}
                    {{--<input name="rdoStatus" value="2" type="radio">Invisible--}}
                {{--</label>--}}
            {{--</div>--}}
            <button type="submit" class="btn btn-default">Product Edit</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </form>
    </div>
</div>
@endsection