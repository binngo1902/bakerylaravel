@extends('layout.index')
@section('content')

<div class="inner-header">

    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đặt hàng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('trangchu')}}">Trang chủ</a> / <span>Đặt hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        @if (count($errors)>0)
            <div class="alert alert-danger" style="text-align:center">
                @foreach ($errors->all() as $err )
                    <span >{{$err}}</span><br>
                @endforeach
            </div>
        @endif

        @if (session('thongbao'))
            <div class="alert alert-success"style="text-align:center">
                <span >{{session('thongbao')}}</span><br>

            </div>
            @endif

            @if (Session::has('Cartshopping'))

        <form action="{{route('postcheckout')}}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <h4>Đặt hàng</h4>
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        <label for="name">Họ tên*</label>
                        <input type="text" id="name" name='ten' placeholder="Họ tên" required>
                    </div>
                    <div class="form-block">
                        <label>Giới tính </label>
                        <input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
                        <input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>

                    </div>

                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" id="email" name="email" required placeholder="expample@gmail.com">
                    </div>

                    <div class="form-block">
                        <label for="adress">Địa chỉ*</label>
                        <input type="text" id="adress" name="address" placeholder="Street Address" required>
                    </div>


                    <div class="form-block">
                        <label for="phone">Điện thoại*</label>
                        <input type="text" id="phone" name="phone" required>
                    </div>

                    <div class="form-block">
                        <label for="notes">Ghi chú</label>
                        <textarea id="notes" name="notes"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                        <div class="your-order-body" style="padding: 0px 10px">
                            <div class="your-order-item">
                                <div>
                                <!--  one item	 -->
                                    @foreach (Session::get('Cartshopping')->products as $item )

                                    <div class="media">
                                        <img width="25%" src="image/product/{{$item['productInfo']->image}} " style="width:6rem; " alt="" class="pull-left">
                                        <div class="media-body">
                                            <p class="font-large">{{$item['productInfo']->name}}</p>
                                            <span class="color-gray your-order-info" >Giá: {{$item['productInfo']->promotion_price ? number_format($item['productInfo']->promotion_price) : number_format($item['productInfo']->unit_price)}}</span>
                                            <span class="color-gray your-order-info">Số lượng: {{$item['quantity']}}</span>
                                        </div>
                                    </div>
                                    @endforeach

                                <!-- end one item -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            {{-- @if(Session::has('Cartshopping')) --}}
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                <div class="pull-right"><h5 class="color-black" >{{number_format(Session::get('Cartshopping')->totalPrice)}}</h5></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>

                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
                                    <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                                    <div class="payment_box payment_method_bacs" style="display: block;">
                                        Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                                    </div>
                                </li>

                                <li class="payment_method_cheque">
                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
                                    <label for="payment_method_cheque">Chuyển khoản </label>
                                    <div class="payment_box payment_method_cheque" style="display: none;">
                                        Chuyển tiền đến tài khoản sau:
                                        <br>- Số tài khoản: 123 456 789
                                        <br>- Chủ TK: Nguyễn A
                                        <br>- Ngân hàng ACB, Chi nhánh TPHCM
                                    </div>
                                </li>

                            </ul>
                        </div>

                        <div class="text-center"><button type="submit" class="btn btn-primary" style="min-width:20px">Đặt hàng</button> </submit></div>
                    </div> <!-- .your-order -->
                </div>
            </div>
        </form>
        @else
        <div class="alert alert-danger"style="text-align:center;">
            <span >Không có món nào trong giỏ hàng</span>
        </div>
        @endif
    </div> <!-- #content -->
</div>
@endsection
