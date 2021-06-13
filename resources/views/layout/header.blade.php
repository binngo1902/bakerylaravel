<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i>TPHCM</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 09xxxxxxxx</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
                    @if (Auth::check())
                         <ul class="top-details menu-beta l-inline">
                        @if(Auth::user()->level == 1)
						<li><a href="{{route('index')}}">Admin</a></li>
                        @endif
						<li><a href="#"><i class="fa fa-user"></i>{{Auth::user()->name}}</a></li>
						<li><a href="{{route('logout')}}">Logout</a></li>

					    </ul>
                    @else
                    <ul class="top-details menu-beta l-inline">
						{{-- <li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li> --}}
						<li><a href="{{route('register')}}">Đăng kí</a></li>
						<li><a href="{{route('login')}}">Đăng nhập</a></li>
					</ul>
                    @endif

				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.html" id="logo"><img src="assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('search')}}">
					        <input type="text" value="" name="search" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
                            @if (Session::has('Cartshopping'))
							<div class="beta-select" ><i class="fa fa-shopping-cart"></i>
                                <span id="cart-item-show">Giỏ hàng ({{Session::get('Cartshopping')->totalQuantity}} món)</span>
                                 <i class="fa fa-chevron-down"></i></div>

                            @else
							<div class="beta-select" >
                                <i class="fa fa-shopping-cart"></i>
                                 <span id="cart-item-show">Giỏ hàng (0 món)</span>
                                <i class="fa fa-chevron-down"></i></div>
                            @endif
							<div class="beta-dropdown cart-body" id="cart-item">
                                <div   value="0">
								@include('layout.cart_header')

							</div>
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('trangchu')}}">Trang chủ</a></li>
						<li><a href="">Loại Sản phẩm</a>
							<ul class="sub-menu">
                                @foreach ($types as $type )

								<li><a href="{{route('typeproduct',['id'=>$type->id])}}">{{$type->name}}</a></li>
                                @endforeach

							</ul>
						</li>
						<li><a href="{{route('about')}}">Giới thiệu</a></li>
						<li><a href="{{route('contact')}}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div>


