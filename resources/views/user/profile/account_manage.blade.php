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
            <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="{{asset('frontend/assets/img/avaters/')}}./{{Session::get('customers')->avatar}}">
                <span class="font-weight-bold">{{Session::get('customers')->fullName}}</span>
                <span class="text-black-50">{{Session::get('customers')->email}}</span>
                <span> </span>
            </div>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Thiết lập hồ sơ</h4>
                </div>
                <form action="{{route('user.edit_account')}}" method="POST">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Họ tên</label>
                            <input type="text" class="form-control" name="fullName"value="{{Session::get('customers')->fullName}}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Tên hiển thị</label>
                            <input type="text" class="form-control" name="username" value="{{Session::get('customers')->username}}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Số điện thoại</label>
                            <input type="number" class="form-control"name="phone" value="{{Session::get('customers')->phone}}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Địa chỉ </label>
                            <input type="text" class="form-control"name="address"value="{{Session::get('customers')->address}}">
                        </div>
                    
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Ảnh</label>
                            <input type="text" class="form-control" value="{{Session::get('customers')->avatar}}">
                        </div>
                    
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="button">Save Profile</button>
                    </div>
                </form>
            </div>
        </div>
       
    </div>
</div>
            </div>
        </div>
    </div>
</div>

    </div>
</div>
<div style="height:5%"></div>
@endsection