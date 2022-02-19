@extends('user.layout')
@section('title')
    Thông tin của bạn
@endsection
@section('profile')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/profile_css.css') }}">
@endsection
@section('content')
<script>
    function showOrderInfo(str) {   
        var orderInfo = document.getElementById('show-orderInfo-'+str);
        if (orderInfo.style.display === "none") {
            orderInfo.style.display = "block";
        } else {
            orderInfo.style.display = "none";
        }
    }   
    
</script>
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Thông tin tài khoản</p>
						<h1>user</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-3 my-lg-0 my-md-1">
            <div id="sidebar" class="bg-purple">
                <div class="h4 text-white">Tài khoản</div>
                <ul>
                    <li >
                         <a href="{{route('user.account_management')}}" class="text-decoration-none d-flex align-items-start">
                            <div class="fas fa-box pt-2 me-3"></div>
                            <div class="d-flex flex-column">
                                <div class="link">Tài khoản của tôi</div>
                                <div class="link-desc">Xem và quản lí tài khoản</div>
                            </div>
                        </a>
                     </li>
                    <li> 
                        <a href="{{route('user.order_management')}}" class="text-decoration-none d-flex align-items-start">
                            <div class="fas fa-box-open pt-2 me-3"></div>
                            <div class="d-flex flex-column">
                                <div class="link">Đơn hàng của tôi</div>
                                <div class="link-desc">Xem và quản lí đơn hàng</div>
                            </div>
                        </a> 
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9 my-lg-0 my-1">
            <div id="main-content" class="bg-white border">
                <div class="d-flex flex-column">
                    <div class="h5">Xin chào {{Session::get('customers')->fullName}}</div>
                    <div>Email : {{Session::get('customers')->email}}</div>
                </div>
                <div class="d-flex my-4 flex-wrap">
                    <div class="box me-4 my-1 bg-light"> <img src="https://www.freepnglogos.com/uploads/box-png/cardboard-box-brown-vector-graphic-pixabay-2.png" alt="">
                        <div class="d-flex align-items-center mt-2">
                            <div class="tag">Tổng đơn hàng</div>
                            <div class="ms-auto number">2</div>
                        </div>
                    </div>
                    <div class="box me-4 my-1 bg-light"> <img src="https://www.freepnglogos.com/uploads/shopping-cart-png/shopping-cart-campus-recreation-university-nebraska-lincoln-30.png" alt="">
                        <div class="d-flex align-items-center mt-2">
                            <div class="tag">Giỏ hàng hiện tại</div>
                            <div class="ms-auto number"> {{$count}}</div>
                        </div>
                    </div>
                </div>
                <div class="text-uppercase">Danh sách đơn hàng</div>
                @if(empty($getInvoice))
                    @foreach($invoices as $item)
                    <div class="order my-3 bg-light">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="d-flex flex-column justify-content-between order-summary">
                                    <div class="d-flex align-items-center">
                                        <div class="text-uppercase">#{{$item->id}}</div>                                  
                                    </div>
                                    <div class="fs-8">Tổng đơn: {{number_format($item->total)}}VNĐ</div>
                                    <div class="fs-8">Ngày tạo: {{$item->dateCreated}}</div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                                    <div class="status">Trạng thái : 
                                        @if($item->status==0)
                                            Chờ xác nhận
                                        @endif
                                        @if($item->status==1)
                                            Đã xác nhận 
                                        @endif
                                        @if($item->status==2)
                                            Đang vận chuyển
                                        @endif
                                        @if($item->status==-1)
                                            Thành công
                                        @endif
                                    </div>
                                    <div onclick="showOrderInfo('{{$item->id}}')" class="btn btn-primary text-uppercase" >Xem thông tin</div>
                                </div>
                                <div class="progressbar-track">
                                    <ul class="progressbar">
                                    @if($item->status==0)
                                    <li id="step-1" class="text-muted green"> <span class="fas fa-gift"></span> </li>
                                        <li id="step-2" class="text-muted"> <span class="fas fa-check"></span> </li>
                                        <li id="step-3" class="text-muted"> <span class="fas fa-truck"></span> </li>
                                        <li id="step-4" class="text-muted"> <span class="fas fa-box-open"></span> </li>
                                    @endif
                                    @if($item->status==1)
                                    <li id="step-1" class="text-muted green"> <span class="fas fa-gift"></span> </li>
                                        <li id="step-2" class="text-muted green"> <span class="fas fa-check"></span> </li>
                                        <li id="step-3" class="text-muted"> <span class="fas fa-truck"></span> </li>
                                        <li id="step-4" class="text-muted"> <span class="fas fa-box-open"></span> </li>
                                    @endif
                                    @if($item->status==2)
                                    <li id="step-1" class="text-muted green"> <span class="fas fa-gift"></span> </li>
                                        <li id="step-2" class="text-muted green"> <span class="fas fa-check"></span> </li>
                                        <li id="step-3" class="text-muted green"> <span class="fas fa-truck"></span> </li>
                                        <li id="step-4" class="text-muted"> <span class="fas fa-box-open"></span> </li>
                                    @endif
                                    @if($item->status==-1)
                                    <li id="step-1" class="text-muted green"> <span class="fas fa-gift"></span> </li>
                                        <li id="step-2" class="text-muted green"> <span class="fas fa-check"></span> </li>
                                        <li id="step-3" class="text-muted green"> <span class="fas fa-truck"></span> </li>
                                        <li id="step-4" class="text-muted green"> <span class="fas fa-box-open"></span> </li>
                                    @endif
                                    </ul>
                                    <div id="tracker"></div>
                                </div>
                            </div>
                        </div>                  
                            <div id="show-orderInfo-{{$item->id}}" style="display:none">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="success">
                                            <th>
                                                Sản phẩm
                                            </th>
                                            <th>
                                                Hình ảnh
                                            </th> 
                                            <th>
                                                Số lượng
                                            </th>
                                            <th>
                                                Giá bán
                                            </th>                
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        @foreach($item->products as $product)
                                            <tr>
                                                <td>{{$product->name}}</td>
                                                <td> <img style="background:white" src="{{asset('backend/assets/img/products/'.$product->image)}}" class="rounded" alt="Ảnh" width="70" height="70"> </td>
                                                <td>{{$product->quantity}}</td>            
                                                <td>{{number_format($product->price)}}VNĐ</td>            
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    @endforeach
                @endif
                @if(!empty($getInvoice))
                    <h4>Bạn chưa có đơn hàng</h4>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection