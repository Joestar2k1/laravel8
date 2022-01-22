@extends('admin.app')
@section('title') Admin-Account @endsection
@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            @foreach($invoices as $item)
            <div class="p-3 bg-white rounded">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="text-uppercase">Chi tiết hóa đơn bán hàng</h5>
                        <div class="billed"><span class="font-weight-bold text-uppercase">Cửa hàng:</span><span class="ml-1">Trái cây</span></div>
                        <div class="billed"><span class="font-weight-bold text-uppercase">Ngày lập:</span><span class="ml-1">{{$item->dateCreated}}</span></div>
                        <div class="billed"><span class="font-weight-bold text-uppercase">Mã hóa đơn:</span><span class="ml-1">{{$item->id}}</span></div>
                    </div>
                    <div class="col-md-6 text-right mt-3">
                        <div class="billed">
                            <span class="font-weight-bold text-uppercase">Người đặt:</span>
                            <span class="ml-1">{{$item->fullName}}</span>
                        </div>
                        <div class="billed">
                            <span class="font-weight-bold text-uppercase">Số điên thoại:</span>
                            <span class="ml-1">{{$item->shippingPhone}}</span>
                        </div>
                        <div class="billed">
                            <span class="font-weight-bold text-uppercase">Người nhận:</span>
                            <span class="ml-1">{{$item->shippingName}}</span>
                        </div>
                        <div class="billed">
                            <span class="font-weight-bold text-uppercase">Địa chỉ:</span>
                            <span class="ml-1">{{$item->shippingAddress}}</span>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <td>Hình ảnh</td>
                                    <th>Giá bán / Kg</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>                               
                                @foreach($invoice_details as $dt)
                                <tr>
                                    <td>{{$dt->name}}</td>
                                    <td>
                                        <img src="{{asset('backend/assets/img/products/'.$dt->image)}}" alt=""
                                        width='50px' height='50px'>
                                    </td>
                                    <td>{{$dt->price}}</td>
                                    <td>{{$dt->quantity}}</td>
                                    <td>
                                        {{$dt->price * $dt->quantity}}
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td>940</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-right mb-3"><button class="btn btn-danger btn-sm mr-5" type="button">Quay lại</button></div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection