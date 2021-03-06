@extends('layout.index')
@section('content')
<div class="rev-slider">
	<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
                                    @foreach ($slides as $slide )

									<!-- THE FIRST SLIDE -->
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                        <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                            <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined"
                                            src="image/slide/{{$slide->image}}"
                                            data-src="image/slide/{{$slide->image}}"
                                            style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('image/slide/{{$slide->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                        </div>
                                    </div>

                                </li>
                                @endforeach

							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>S???n ph???m m???i</h4>
							<div class="beta-products-details">
								<p class="pull-left">T??m th???y {{count($newProducts)}} s???n ph???m</p>
								<div class="clearfix"></div>
							</div>

							<div class="row" id='paginate'>

								@include('pages.pagination_newproduct')
                                </div


						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>S???n ph???m gi???m gi??</h4
                            <div class="beta-products-details">
                                    <p class="pull-left">T??m th???y {{count($saleProducts)}} s???n ph???m</p>
                                    <div class="clearfix">&nbsp;</div>
                             </div>

							<div class="row" id=paginate-sale>
                                @foreach ($saleProducts as $sale )



                                <div class="col-sm-3" style="margin-top:20px">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="product.html"><img src="image/product/{{$sale->image}}" style="width:80rem; height:20rem" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$sale->name}}</p>
                                            <p class="single-item-price">

                                                <span class="flash-del">{{number_format($sale->unit_price)}}VN??</span>
                                                <span class="flash-sale">{{number_format($sale->promotion_price)}}VN??</span>

                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="{{route('product',$sale->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{route('product',$sale->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach

							</div>
						</div>
					</div>
				</div> <!-- .beta-products-list -->
			</div>
		</div> <!-- end section with sidebar and main content -->


	</div> <!-- .main-content -->


@endsection
@section('script')

    <script>
     $(document).ready(function () {
            $(document).on('click','.pagination a',function (e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });


        function fetch_data(page){
            $.ajax({
                type: "get",
                url: "paginate/?page="+page,

                success: function (data) {
                    $('#paginate').html(data);
                }
            });
        }


    });




    </script>

@endsection
