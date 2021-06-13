<div class="row">
@foreach ($likeproducts as $like )

                        <div class="col-sm-4">
                            <div class="single-item">
                                @if ($like->promotion_price !=0)
                                <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                @endif
                                <div class="single-item-header">
                                    <a href="#"><img src="image/product/{{$like->image}}" style="height:20rem;"alt=""></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$like->name}}</p>
                                    <p class="single-item-price">
                                        @if ($like->promotion_price !=0)
                                        <span class="flash-del">{{number_format($like->unit_price)}}VNĐ</span>
                                        <span class="flash-sale">{{number_format($like->promotion_price)}}VNĐ</span>
                                        @else
                                        <span class="flash-sale">{{number_format($like->unit_price)}}VNĐ</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="{{route('product',['id'=>$like->id])}}"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{{route('product',['id'=>$like->id])}}">Details <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                        <center>{!!$likeproducts->links()!!}</center>
