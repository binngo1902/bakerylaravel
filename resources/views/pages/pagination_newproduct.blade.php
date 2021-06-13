<div class="row" >
                                @foreach ($newProducts as $np )
								<div class="col-sm-3">
                                    <div class="single-item">
                                        @if ($np->promotion_price > 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif

										<div class="single-item-header">
                                            <a href="product.html"><img src="image/product/{{$np->image}}" style="width:80rem; height:20rem"   alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{($np->name)}}</p>
											<p class="single-item-price">
                                                @if ($np->promotion_price != 0)
												<span class="flash-del">{{number_format($np->unit_price)}}VNĐ</span>
												<span class="flash-sale">{{number_format($np->promotion_price)}}VNĐ</span>
                                                @else
                                                <span class="flash-sale">{{number_format($np->unit_price)}}VNĐ</span>
                                                @endif
											</p>
										</div>
										<div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="{{route('product',['id'=>$np->id])}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('product',['id'=>$np->id])}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>

                                @endforeach
                            </div>
                            <center>{!!$newProducts->links()!!}
                            </center>

