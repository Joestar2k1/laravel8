@extends('user.layout')
@section('title')Thanh toán @endsection
@section('content')

<!-- search area -->
<div class="search-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="close-btn"><i class="fas fa-window-close"></i></span>
                <div class="search-bar">
                    <div class="search-bar-tablecell">
                        <h3>Search For:</h3>
                        <input type="text" placeholder="Keywords">
                        <button type="submit">Search <i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end search arewa -->

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Check Out Product</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-accordion-wrap">
                    <div class="accordion" id="accordionExample">
                      <div class="card single-accordion">
                        <div class="card-header" id="headingOne">
                          <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Địa chỉ thanh toán
                            </button>
                          </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                          <div class="card-body">
                            <div class="billing-address-form">
                                <form action="{{route('user.create-invoice.post')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label for="shippingName">Tên người đặt</label>
                                    <p><input type="text" name="shippingName" placeholder="Tên người đặt" value="{{Session::get('customers')->fullName}}"></p>
                                    <label for="shippingAddress">Địa chỉ giao hàng</label>
                                    <p>
                                        <input type="text" name="shippingAddress" placeholder="Địa chỉ giao hàng" value="{{Session::get('customers')->address}}">
                                    </p>
                                    <label for="shippingPhone">Số điện thoại</label>
                                    <p><input type="tel" name="shippingPhone" placeholder="Số điện thoại" value="{{Session::get('customers')->phone}}"></p>
                
                                    <button class="boxed-btn">Xác nhận thanh toán</button>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="order-details-wrap">
                    <table class="order-details">
                        <thead>
                            <tr>
                                <th>Chi tiết đơn hàng</th>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody class="order-details-body">
                            <tr>
                                <td>Sản phẩm</td>
                                <td>Tổng</td>
                            </tr>
                            @foreach(Session::get('carts') as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{number_format($item->subTotal)}}VNĐ</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tbody class="checkout-details">
                            <tr>
                                <td>Subtotal</td>
                                <td>{{number_format(Session::get('carts_total')[0])}}VNĐ</td>
                            </tr>
                            <tr>
                                <td>Tiền ship</td>
                                <td>0VNĐ</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>{{number_format(Session::get('carts_total')[0])}}VNĐ</td>
                            </tr>
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end check out section -->

<!-- logo carousel -->
<div class="logo-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    <div class="single-logo-item">
                        <img src="{{ asset('frontend/assets/img/company-logos/1.png') }}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{ asset('frontend/assets/img/company-logos/2.png') }}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{ asset('frontend/assets/img/company-logos/3.png') }}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{ asset('frontend/assets/img/company-logos/4.png') }}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{ asset('frontend/assets/img/company-logos/5.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end logo carousel -->

@endsection