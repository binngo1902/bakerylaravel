@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
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
                        <th>Description</th>
                        <th>Unit Price</th>
                        <th>Promotion Price</th>
                        <th>Image</th>
                        <th>New</th>
                        <th>Unit</th>
                        <th>Loại bánh</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $list )

                    <tr class="odd gradeX" align="center">
                        <td>{{$list->id}}</td>
                        <td>{{$list->name}}</td>
                        <td>{{$list->description}}</td>
                        <td>{{number_format($list->unit_price)}}</td>
                        <td>{{number_format($list->promotion_price)}}</td>
                        <td><img width="100px"src="image/product/{{$list->image}}" alt=""></td>
                        <td>{{$list->new}}</td>
                        <td>{{$list->unit}}</td>
                        <td>{{$list->type_products->name}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('getdeleteproduct',['id'=>$list->id])}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('geteditproduct',['id'=>$list->id])}}">Edit</a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
