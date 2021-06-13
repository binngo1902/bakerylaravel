@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại bánh
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if (count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err )
                            <span>{{$err}}</span>
                        @endforeach
                    </div>
                @endif

                @if (session('msg'))
                    <div class="alert alert-success">
                        {{session('msg')}}
                    </div>
                @endif
                <form action="{{route('postedit',['id'=>$type->id])}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Loại bánh</label>
                        <input class="form-control" name="name" value="{{$type->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" name="description" >{{$type->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>

                        <input type="file" name="Hinh" id="" class='form-control'>
                        <img width="200px"src="image/product/{{$type->image}}" alt="">
                    </div>

                    <button type="submit" class="btn btn-default">Loại bánh Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
