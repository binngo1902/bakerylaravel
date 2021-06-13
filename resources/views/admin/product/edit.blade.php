@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cake
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if (count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err )

                        <span>{{$err}}</span><br>
                        @endforeach
                    </div>
                @endif
                @if (session('msg'))
                    <div class="alert alert-success">
                        {{session('msg')}}
                    </div>
                @endif


                <form action="{{route('posteditproduct',['id'=>$list->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Loại bánh</label>
                        <select name="id_type" id="" class='form-control'>
                            @foreach ($types as $type )
                            @if ($type->id == $list->id_type)
                            <option value="{{$type->id}}" selected>{{$type->name}}</option>
                            @else
                            <option value="{{$type->id}}" >{{$type->name}}</option>
                            @endif
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên bánh</label>
                        <input class="form-control" name="name" value="{{$list->name}}" />
                    </div>

                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" name="description">{{$list->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Unit Price</label>
                        <input class="form-control" name="unit_price" value={{$list->unit_price}} />
                    </div>
                    <div class="form-group">
                        <label>Prmotion Price</label>
                        <input class="form-control" name="promotion_price" value={{$list->promotion_price}} />

                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="hinh">
                        <img width="200px"src="image/product/{{$list->image}}" alt="">
                    </div>
                    <div class="form-group">
                        <label>Unit</label>
                        <input class="form-control" name="unit" value="{{$list->unit}}"/>
                    </div>
                    <div class="form-group">
                        <label>New</label>
                        <select name="new" id=""class='form-control'>
                            @if ($list->new == 0)
                                <option value="0" selected>Không mới</option>
                                <option value="1" >Mới</option>
                            @endif
                            @if ($list->new == 1)
                                <option value="0" >Không mới</option>
                                <option value="1" selected >Mới</option>
                            @endif

                        </select>
                    </div>

                    <button type="submit" class="btn btn-default">Cake Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
