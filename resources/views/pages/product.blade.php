@extends('layout.index');
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">{{$product->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trangchu')}}">Home</a> / <span>Product</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                        @if ($product->promotion_price > 0)
                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                        @endif
                        <img src="image/product/{{$product->image}}" style='height:20rem' alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">

                            <p class="single-item-title">{{$product->name}}</p>
                            <p class="single-item-price">
                                @if ($product->promotion_price != 0)
												<span class="flash-del">{{number_format($product->unit_price)}}VNĐ</span>
												<span class="flash-sale">{{number_format($product->promotion_price)}}VNĐ</span>
                                                @else
                                                <span class="flash-sale">{{number_format($product->unit_price)}}VNĐ</span>
                                                @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>


                        <div class="space20">&nbsp;</div>

                        <p>Số lượng</p>
                        <form action="{{route('addcart')}}" method="POST">
                            @csrf
                        <div class="form-group"  >
                          <input type="number" name="quantity" min="0" value="1" style="max-width:40px" id="">
                            <input type="hidden" name="idproduct" value={{$product->id}}>
                            <button type="submit" id='btn-add' class="btn btn-fefault cart" style="background-color:cornflowerblue;min-width:100px; margin-left:20px"href="#"><i class="fa fa-shopping-cart"></i></button>
                            <div class="clearfix"></div>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Mô tả</a></li>

                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{{$product->description}}</p>
                    </div>

                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Sản phẩm tương tự </h4>

                    <div class="row " id='paginate'>
                        <input type="hidden" id="paging" value="{{$product->id_type}}">
                        @include('pages.pagination_likeproduct')
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Best Sellers</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach ($bestsellers as $bb)

                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('product',['id'=>$bb->id])}}"><img src="image/product/{{$bb->image}}" alt=""></a>
                                <div class="media-body">
                                    {{$bb->name}}
                                    @if ($bb->promotion_price!=0)
                                    <span class="beta-sales-price">{{number_format($bb->promotion_price)}} VNĐ</span>

                                    @else
                                    <span class="beta-sales-price">{{number_format($bb->unit_price)}} VNĐ</span>

                                    @endif

                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div> <!-- best sellers widget -->

            </div>
        </div>
    </div> <!-- #content -->
</div>
@endsection

@section('script')
<script>
    var x = $('#paging').val();
    $(document).ready(function () {
            $(document).on('click','.pagination a',function (e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });


        function fetch_data(page){


            $.get("paginatelikeproduct/"+x+"/?page="+page,
                function (data) {
                    $('#paginate').html(data);
                }
            );
        }

        $(document).on('click','#btn-add',function(e){
            var data1 = {
                quantity: $("input[name='quantity']").val(),
                  idproduct:  $("input[name='idproduct']").val(),
                 _token: '{{csrf_token()}}',
                }
            $.ajax({
                type: "post",
                url: "addcart",
                data: data1,
                dataType: "json",
                success: function (response) {
                    // alertify.success('Đã thêm vào giỏ hàng');

                }
            });
            e.preventDefault();

            $.ajax({
                    type: "get",
                    url: "cartheader",

                    success: function (response) {
                        $("#cart-item").empty();
                        $("#cart-item").html(response);
                        // $("#cart-item-ajax").html(response);

                        $('#cart-item-show').html('Giỏ hàng ('+$('#cart-quantity').val()+' món)');
                        // $('#cart-total-show').html(formatCash($('#cart-total').val())+' VNĐ');

                    }
            });

            function formatCash(str){
                return str.split('').reverse().reduce((prev,next,index)=>{
                    return ((index%3) ? next : (next+',')) + prev
                })
            }


        });


    });



	</script>
@endsection
