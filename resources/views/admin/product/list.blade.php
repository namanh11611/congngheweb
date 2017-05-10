@extends('admin.master')
@section('description', 'Product')
@section('author', 'Nam Anh')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Product
            <small>List</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr class="odd gradeX" align="center">
                <td>{!! $item["id"] !!}</td>
                <td>{!! $item["name"] !!}</td>
                <td>
                    <?php $cate = DB::table('category')->where('id', $item["cate_id"])->first(); ?>
                    @if(!empty($cate->name))
                        {!! $cate->name !!}
                    @endif
                </td>
                <td>{!! number_format($item["price"], 0, ",", ".") !!} VNĐ</td>
                <td>{!! $item["quantity"] !!}</td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! URL::route('admin.product.getDelete', $item['id']) !!}"
                                                                          onclick="return xacnhanxoa('Do You Want To Delete This Product?')"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.product.getEdit', $item['id']) !!}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection