@extends('admin.master')
@section('description', 'Cate')
@section('author', 'Nam Anh')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Category
            <small>List</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Name</th>
                <th>Category Parent</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        <?php $stt = 0 ?>
        @foreach ($data as $item)
        <?php $stt = $stt + 1 ?>
            <tr class="odd gradeX" align="center">
                <td><?php echo $stt?></td>
                <td>{!! $item["name"] !!}</td>
                <td>
                 @if ($item["parent_id"] == 0)
                     {!! "None" !!}
                 @else
                      <?php 
                         $parent = DB::table('category')->where('id',$item["parent_id"])->first();
                         echo $parent->name;
                     ?>
                 @endif
                    
                 </td>
       
                 <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Không')" href="{!! URL::route('admin.cate.getDelete',$item['id']) !!}"> Delete</a></td>
                 <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.cate.getEdit',$item['id']) !!}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection