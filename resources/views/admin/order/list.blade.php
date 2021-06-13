@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            @if (session('msg'))
                <div class="alert alert-success"style="margin-top:20px">
                    <span >{{session('msg')}}</span>
                </div>

            @endif

            <div class="col-lg-12">
                <h1 class="page-header">Đơn hàng
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Notes</th>
                        <th>Address</th>
                        <th>Total</th>
                        <th>Id_bill</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $list )

                    <tr class="odd gradeX" align="center">
                        <td>{{$list->id}}</td>
                        <td>{{$list->name}}</td>
                        <td>{{$list->gender}}</td>
                        <td>{{$list->email}}</td>
                        <td>{{$list->phone_number}}</td>
                        <td>{{$list->notes}}</td>
                        <td>{{$list->address}}</td>
                        <td>{{number_format($list->total)}}</td>
                        <td>{{$list->bills_id}}</td>


                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('getdeleteorder',['id'=>$list->id])}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('getbilldetails',['id'=>$list->bills_id])}}">View </a></td>
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
