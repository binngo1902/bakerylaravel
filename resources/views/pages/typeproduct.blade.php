@extends('layout.index')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm : {{$typename->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trangchu')}}">Home</a> / <span>Sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach ($types as $type )

                        <li><a href="{{route('typeproduct',['id'=>$type->id])}}">{{$type->name}}</a></li>
                        @endforeach

                    </ul>
                </div>
                <div class="col-sm-9">
                    @if ($type1->products->where('new',1)->count() > 0)
                    <div class="beta-products-list">
                        <h4>Sản phẩm mới</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($type1->products->where('new',1))}} sản phẩm </p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">

                            @foreach ($type1->products->where('new',1) as $tt )


                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if ($tt->promotion_price > 0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif

                                    <div class="single-item-header">
                                        <a href="product.html"><img src="image/product/{{$tt->image}}" style="height:20rem; "  alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$tt->name}}</p>
                                        <p class="single-item-price">
                                            @if ($tt->promotion_price != 0)
                                            <span class="flash-del">{{number_format($tt->unit_price)}}VNĐ</span>
                                            <span class="flash-sale">{{number_format($tt->promotion_price)}}VNĐ</span>
                                            @else
                                            <span class="flash-sale">{{number_format($tt->unit_price)}}VNĐ</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('product',['id'=>$tt->id])}}">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </div>

                    </div> <!-- .beta-products-list -->
                    <div class="space50">&nbsp;</div>
                    @endif
                    <div class="beta-products-list">
                        <h4>Sản phẩm</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($type1->products)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach ($type1->products as $tt )

                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if ($tt->promotion_price > 0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="product.html"><img src="image/product/{{$tt->image}}" style=" height:20rem;" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$tt->name}}</p>
                                        <p class="single-item-price">
                                            @if ($tt->promotion_price != 0)
                                            <span class="flash-del">{{number_format($tt->unit_price)}}VNĐ</span>
                                            <span class="flash-sale">{{number_format($tt->promotion_price)}}VNĐ</span>
                                            @else
                                            <span class="flash-sale">{{number_format($tt->unit_price)}}VNĐ</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('product',['id'=>$tt->id])}}">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="space40">&nbsp;</div>

                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div>
@endsection
