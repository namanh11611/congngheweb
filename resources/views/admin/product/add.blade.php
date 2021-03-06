@extends('admin.master')
@section('description', 'Product')
@section('author', 'Nam Anh')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Product
            <small>Add</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        @include('admin.blocks.error')
        <form action="{!! route('admin.product.postAdd') !!}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="sltParent">
                    <option value="">Please Choose Category</option>
                    <?php cate_parent($cate, 0, "--", old('sltParent')); ?>
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" placeholder="Please Enter The Product Name" value="{!! old('txtName') !!}"/>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" name="txtPrice" placeholder="Please Enter The Product Price" value="{!! old('txtPrice') !!}"/>
            </div>
            {{--<div class="form-group">--}}
                {{--<label>Intro</label>--}}
                {{--<textarea class="form-control" rows="3" name="txtIntro" value="{!! old('txtIntro') !!}"></textarea>--}}
                {{--<script type="text/javascript">ckeditor("txtIntro")</script>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--<label>Content</label>--}}
                {{--<textarea class="form-control" rows="3" name="txtContent" value="{!! old('txtName') !!}"></textarea>--}}
            {{--</div>--}}
            <div class="form-group">
                <label>Images</label>
                <input type="file" name="fImages" value="{!! old('fImages') !!}">
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input class="form-control" name="txtQuantity" placeholder="Please Enter The Number Of Products" value="{!! old('txtQuantity') !!}"/>
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control" name="txtDescription" rows="3" value="{!! old('txtDescription') !!}"></textarea>
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
            <button type="submit" class="btn btn-default">Product Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </form>
    </div>
</div>
@endsection