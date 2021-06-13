@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cake
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px" enc>
                @if (count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err )
                            <span style="text-align: center;">{{$err}}</span>
                        @endforeach
                    </div>
                @endif
                @if (session('msg'))
                <div class="alert alert-success">
                    {{session('msg')}}
                </div>
                @endif
                <form action="{{route('postaddproduct')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="">Loại bánh</label>
                      <select name="id_type" id="" class='form-control'>
                          @foreach ($types as $type )
                              <option value="{{$type->id}}">{{$type->name}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Nhập tên loại bánh" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Unit price</label>
                        <input class="form-control" name="unit_price" placeholder="Nhập giá bánh" />
                    </div>
                    <div class="form-group">
                        <label>Promotion price</label>
                        <input class="form-control" name="promotion_price" value=0 placeholder="Nhập giá discount bánh" />
                    </div>
                    <div class="form-group">
                        <label>Unit</label>
                        <input class="form-control" name="unit"  placeholder="Nhập đơn vị bánh" />
                    </div>
                    <div class="form-group">
                        <label>New</label>
                        <select name="new" id="" class='form-control'>
                            <option value="1" selected>Mới ra</option>
                            <option value="0">Bình thường</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="hinh"  class="form-control">
                    </div>

                    <button type="submit" class="btn btn-default">Thêm sản phẩm</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
