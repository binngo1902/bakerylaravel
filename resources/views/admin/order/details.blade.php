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
                <h1 class="page-header">Đơn hàng của {{$bill->customer->name}}<br>
                    <small>Mã hóa đơn {{$bill->id}}. Tổng: {{number_format($bill->total)}} VNĐ</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Image</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng tiền</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($billdetails as $bd )

                    <tr class="odd gradeX" align="center">
                        <td><img width="100px"src="image/product/{{$bd->products->image}}" alt=""></td>
                        <td>{{$bd->products->name}}</td>
                        <td>{{$bd->quantity}}</td>
                        <td>{{number_format($bd->unit_price)}}</td>
                        <td>{{number_format($bd->quantity*$bd->unit_price)}}</td>


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
