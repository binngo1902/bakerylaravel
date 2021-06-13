@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        @if(session('msg'))
            <div class="alert alert-success" style="margin-top: 20px">
                {{session('msg')}}
            </div>
        @endif

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
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type )

                    <tr class="odd gradeX" align="center">
                        <td>{{$type->id}}</td>
                        <td>{{$type->name}}</td>
                        <td>{{$type->description}}</td>
                        <td><img width="100px" src="image/product/{{$type->image}}" alt=""></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('getdelete',['id'=>$type->id])}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('getedit',['id'=>$type->id])}}">Edit</a></td>
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
