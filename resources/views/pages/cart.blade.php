
<div class="table-responsive">
    <!-- Shop Products Table -->
    <table class="shop_table beta-shopping-cart-table" cellspacing="0">
        <thead>
            <tr>
                <th class="product-name">Product</th>
                <th class="product-price">Price</th>
                <th class="product-quantity">Qty.</th>
                <th class="product-subtotal">Total</th>
                <th class="product-remove">Remove</th>
                <th class="product-edit">Edit</th>


            </tr>
        </thead>
        <tbody>

            @if (Session::has('Cartshopping') != null)

            @foreach (Session::get('Cartshopping')->products as $item )

            <tr class="cart_item">
                <td class="product-name">
                    <div class="media">
                        <img class="pull-left" src="image/product/{{$item['productInfo']->image}}" style="width:10rem;  " alt="">

                    </div>
                    <div class="media-body" style="text-algin:center;margin-top:3rem ">
                        <p class="font-large table-title">{{$item['productInfo']->name}}</p>


                    </div>
                </td>

                <td class="product-price">
                    <span class="amount">{{$item['productInfo']->promotion_price ? number_format($item['productInfo']->promotion_price) : number_format($item['productInfo']->unit_price)}}</span>
                </td>



                <td class="product-quantity">
                    <input type="number" id="quantity-item-{{$item['productInfo']->id}}" class="amount" style="text-align: center;" value="{{$item['quantity']}}"> </>
                </td>

                <td class="product-subtotal">
                    <span class="amount">{{number_format($item['price'])}}</span>
                </td>

                <td class="product-remove">
                   <i class="fa fa-trash-o" style="width:3rem; cursor:pointer"  onclick="deleteItem({{$item['productInfo']->id}})"></i>
                </td>

                <td class="product-edit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" cursor="pointer" height="16" onclick="editItem({{$item['productInfo']->id}})" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" >
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg>
                </td>
            </tr>
            @endforeach
            @endif


        </tbody>


    </table>
    <!-- End of Shop Table Products -->
</div>


<!-- Cart Collaterals -->
<div class="cart-collaterals">


    </form>
    <div class="cart-totals pull-right" style="margin-bottom:50px">
        @if (Session::has('Cartshopping') !=null)
        <div class="cart-totals-row"><h5 class="cart-total-title">Cart Totals</h5></div>
        <div class="cart-totals-row"><span>Cart Subtotal:</span> <span style="color:yellow; font-weight:bold">{{number_format(Session::get('Cartshopping')->totalPrice)}}</span></div>
        <div class="cart-totals-row"><span>Shipping:</span> <span style="color:yellow; font-weight:bold">Free Shipping</span></div>
        <div class="cart-totals-row"><span>Order Total:</span> <span style="color:yellow; font-weight:bold">{{number_format(Session::get('Cartshopping')->totalPrice)}}</span></div>
        <div class="cart-totals-row" style="text-align:center"><a href="{{route('checkout')}}" style="text-align:center; color:red">Đặt hàng</a></div>

        @endif
    </div>
    <div class="clearfix"></div>
</div>
<!-- End of Cart Collaterals -->
<div class="clearfix"></div>
