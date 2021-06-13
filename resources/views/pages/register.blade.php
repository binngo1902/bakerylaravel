@extends('layout.index')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng kí</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Home</a> / <span>Đăng kí</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        @if (count($errors)>0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err )
                    <span style="text-align:center">{{$err}}</span>
                @endforeach
            </div>
        @endif
        @if (session('thongbao'))
            <div class="alert alert-success">
                <span style="text-align: center">{{session('thongbao')}}</span>
            </div>
        @endif
        <form action="{{route('postregister')}}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng kí</h4>
                    <div class="space20">&nbsp;</div>


                    <div class="form-block">
                        <label style="display:block;" for="email">Email address*</label>
                        <input type="email" id="email" name="email" required>
                        <span id="check" style="color:red; line-height:2rem;"></span>

                    </div>

                    <div class="form-block">
                        <label for="your_last_name">Fullname*</label>
                        <input type="text" id="your_last_name" name="ten" required>
                    </div>

                    <div class="form-block">
                        <label for="adress">Address*</label>
                        <input type="text" id="adress" name="address" value="Street Address" required>
                    </div>


                    <div class="form-block">
                        <label for="phone">Phone*</label>
                        <input type="text" id="phone" name="phone_number" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Password*</label>
                        <input type="password"  name="password" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Re password*</label>
                        <input type="password"   name="passwordAgain" required>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div>
@endsection
@section('script')
<script>
    $('#email').blur(function(e){
        $.ajax({
            type: "get",
            url: "check_email",
            data: { 'email': $('#email').val()},
            success: function (response) {
                $('#check').html(response);
            }
        });
    });
</script>
@endsection
