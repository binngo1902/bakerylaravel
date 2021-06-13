<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bakery BinNgo</title>
    <base href="{{asset('')}}">

</head>
<body>
    <div class="col-sm-6">
        <div class="your-order">
            <div class="your-order-head"><h5>Đơn hàng của bạn {{$data}}</h5></div>
            <div class="your-order-body" style="padding: 0px 10px">
                <div class="your-order-item">
                    <div>
                    <!--  one item	 -->
                        @foreach (Session::get('Cartshopping')->products as $item )

                        <div class="media">
                            {{-- <img width="25%" src="{{$message->embed(asset("image/product/".$item['productInfo']->image))}}" style="width:6rem; " alt="" class="pull-left"> --}}
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

           </div> <!-- .your-order -->
    </div>
</body>
</html>
