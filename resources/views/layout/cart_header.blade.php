
@if (Session::has('Cartshopping'))
    @php
        $count = 0;
    @endphp
    @foreach (Session::get('Cartshopping')->products as $item )
    <div class="cart-item">
        <div class="media" style="padding-right:0">
            <a class="pull-left" href="#"><img src="image/product/{{$item['productInfo']->image}} " alt=""></a>
            <div class="media-body" >
                <span class="cart-item-title">{{$item['productInfo']->name}}</span>
                {{-- <span class="cart-item-options">{{$item['product']->quantity}}</span> --}}

                <span class="cart-item-amount" >{{$item['quantity']}} x <span>{{$item['productInfo']->promotion_price ? number_format($item['productInfo']->promotion_price) : number_format($item['productInfo']->unit_price)}}</span></span>

                <button type="button" class="btn-close" id='deletecart' data-id="{{$item['productInfo']->id}}" style="width:1.5rem; height:1.5rem; float:right;   " aria-label="Close">X</button>
            </div>
            <div class="fa-pull-left" >
                {{-- <button type="button" class="btn-close"  style="width:1rem; height:1rem; float:left;" aria-label="Close">X</button> --}}

            </div>
        </div>
    </div>
    @php
        $count++;
    @endphp
    @if($count == 4)
        <center>......</center>
    @break
    @endif
    @endforeach
    <input type="hidden" id="cart-quantity" value="{{Session::get('Cartshopping')->totalQuantity}}">
    <input type="hidden" id="cart-total" value="{{Session::get('Cartshopping')->totalPrice}}">

@endif
</div>


<div class="cart-caption">
    @if (Session::has('Cartshopping')!=null)
    <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value" id="cart-total-show" >{{number_format(Session::get('Cartshopping')->totalPrice)}} VNĐ</span></div>

    @else
    <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value" id="cart-total" value="0"></span></div>

    @endif
    <div class="clearfix"></div>

    <div class="center">
        <div class="space10">&nbsp;</div>
        <a href="{{route('shoppingcart')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
    </div>
</div>

