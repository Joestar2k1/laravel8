@extends('user.layout')
@section('title') Cart @endsection
@section('content')

<body>
	
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Ảnh sản phẩm</th>
									<th class="product-name">Tên sản phẩm</th>
									<th class="product-price">Giá bán</th>
									<th class="product-quantity">Số lượng</th>
									<th class="product-total">Thành tiền</th>
								</tr>
							</thead>
							<tbody>
								@if(Session::get('carts') == null)
									<h5>Bạn chưa có sản phẩm trên giỏ hàng</h5>
								@endif
								@if(Session::get('carts') != null)
									@foreach(Session::get('carts') as $item)
										<tr class="table-body-row">
											<td class="product-remove"><a href="{{route('user.delete-cart',$item->id)}}"><i class="far fa-window-close"></i></a></td>
											<td class="product-image">
											<img src="{{asset('frontend/assets/img/products/'.$item->image)}}"alt="">
											</td>
											<td class="product-name">{{$item->name}}</td>
											<td class="product-price">{{number_format($item->price)}}VND/{{$item->unit}}</td>
											<td class="product-quantity">
												<input type="number" placeholder="0" value="{{$item->quantity}}">
											</td>
											<td class="product-total">{{number_format($item->subTotal)}}VNĐ</td>
										</tr>
									
									@endforeach
								@endif
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Tổng</th>
									<th>Giá tiền</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>itemSubTotal:</strong></td>
									<td>{{number_format(Session::get('carts_total')[0])}}VNĐ</td>
								</tr>
								<tr class="total-data">
									<td><strong>Tiền ship: </strong></td>
									<td>0 VNĐ</td>
								</tr>
								<tr class="total-data">
									<td><strong>Tổng: </strong></td>
									<td>{{number_format(Session::get('carts_total')[0])}}VNĐ</td>
								</tr>
							</tbody>
						</table>
						@if(isset($error))
							<div class="cart-buttons">
								<a href="cart.html" class="boxed-btn">Cập nhật</a>
								<a href="{{route('user.checkout')}}" class="boxed-btn black">Thanh toán</a>
							</div>
							<p><span style="color:red">Giỏ hàng bạn chưa có không thể thanh toán</span></p>
						@endif
						@if(!isset($error))
							<div class="cart-buttons">
								<a href="cart.html" class="boxed-btn">Cập nhật</a>
								<a href="{{route('user.checkout')}}" class="boxed-btn black">Thanh toán</a>
							</div>
							
						@endif
					</div>

					<div class="coupon-section">
						<h3>Nhập mã khuyến mãi</h3>
						<div class="coupon-form-wrap">
							<form action="index.html">
								<p><input type="text" placeholder="Coupon"></p>
								<p><input type="submit" value="Apply"></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="{{ asset('frontend/assets/img/products/product-img-1.jpg') }}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{ asset('frontend/assets/img/products/product-img-2.jpg') }}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{ asset('frontend/assets/img/products/product-img-3.jpg') }}"" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{ asset('frontend/assets/img/products/product-img-4.jpg') }}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{ asset('frontend/assets/img/products/product-img-5.jpg') }}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->
@endsection