@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>{{$user->email}}</small>
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


                <form action="{{route('postedituser',['id'=>$user->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input name='ten' class="form-control" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" value="{{$user->email}}" disabled />
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input name='phone_number' class="form-control" value="{{$user->phone}}">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input class="form-control" name="address" value={{$user->address}}/>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" id="" class='form-control'>
                            @if ($user->level == 0)
                            <option value="0" selected>Bình thường</option>
                            <option value="1" >Admin</option>
                            @endif
                            @if ($user->level == 1)
                            <option value="0" >Bình thường</option>
                            <option value="1" selected>Admin</option>
                            @endif
                        </select>
                    </div>


                    <button type="submit" class="btn btn-default">User Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
