@extends('admin.app')
@section('title') Theo dõi hóa đơn @endsection
@section('content')
<link  href="{{asset('backend/assets/css/order_tracking.css')}}" rel="stylesheet">
<div class="container">
<div style="color:green;text-align:center">
        <h3>Danh sách hóa đơn đang theo dõi</h3>
</div>
<div style="height:50px"></div>
<!-- <div class="container-fluid">
    <div class="container mt-3">
        <table class="table table-bordered">
            <thead>
                <tr class="success">
                    <th>
                       Mã hóa đơn
                    </th>
                    <th>
                       Nhân viên
                    </th>
                    <th>
                      Khách hàng
                    </th> 
                    <th>
                        Ngày tạo
                    </th>                                                        
                    <th>
                        Tổng
                    </th>   
                    <th>
                       Thanh toán
                    </th> 
                    <th>
                        Xem chi tiết
                    </th>
                    <th>
                       Trạng thái
                    </th>       
                </tr>
            </thead>
            <tbody>   
                @foreach($invoices as $item)
                <tr>                        
                    <td>{{$item->id}}</td>
                    <td>{{$item->employeeID}}</td>
                    <td>{{$item->fullName}}</td>
                     <td> {{$item->dateCreated}}</td>                           
                     <td> {{$item->total}}</td>
                     <td>   
                         @if($item->isPaid ==0)
                         <span>   <i class="fa fa-close" style="color:red"></i>Chưa</span>
                         @endif                    
                        </td>
                        <th> <a href="{{route('admin.invoice.details_order',$item->id)}}"> <i class="fa fa-eye"></i></a></th>
                    <td>
                       @if($item->status==1)
                        <a href="{{route('admin.invoice.confirmStatus',$item->id)}}" class="btn btn-success">Xác nhận?</a>
                       @endif
                       @if($item->status==2)
                       <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                              Đã xác nhận
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('admin.invoice.confirmStatus',$item->id)}}">Đang lấy hàng</a></li>
                            </ul>
                        </div>
                       @endif
                       @if($item->status==3)
                       <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                              Đang lấy hàng
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('admin.invoice.confirmStatus',$item->id)}}">Đang vận chuyển</a></li>
                            </ul>
                        </div>
                       @endif
                       @if($item->status==4)
                       <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                             Đang vận chuyển
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('admin.invoice.confirmStatus',$item->id)}}">Thành công</a></li>
                            </ul>
                        </div>
                       @endif
                       @if($item->status==5)
                        <a href="" class="btn btn-success">Thành công</a>
                       @endif
                    </td>
                </tr>    
                @endforeach           
            </tbody>
        </table>
     
    </div>
</div> -->

<div class="col-lg-9 my-lg-0 my-1">
            <div id="main-content" class="bg-white border">
                <div class="d-flex my-4 flex-wrap">
                    <div class="box me-4 my-1 bg-light"> <img src="https://www.freepnglogos.com/uploads/box-png/cardboard-box-brown-vector-graphic-pixabay-2.png" alt="">
                        <div class="d-flex align-items-center mt-2">
                            <div class="tag">Mới</div>
                            <div class="ms-auto number">10</div>
                        </div>
                    </div>
                    <div class="box me-4 my-1 bg-light"> 
                        <img src="https://www.freepnglogos.com/uploads/tick-png/check-mark-tick-vector-graphic-21.png" alt="">
                        <div class="d-flex align-items-center mt-2">
                            <div class="tag">Đã xác nhận</div>
                            <div class="ms-auto number">10</div>
                        </div>
                    </div>
                    <div class="box me-4 my-1 bg-light"> <img src="https://www.freepnglogos.com/uploads/logo-ifood-png/happy-ifood-logo-delivery-ifood-transparent-21.png" alt="">
                        <div class="d-flex align-items-center mt-2">
                            <div class="tag">Đang vận chuyển</div>
                            <div class="ms-auto number">10</div>
                        </div>
                    </div>
                    <div class="box me-4 my-1 bg-light"> <img src="https://www.freepnglogos.com/uploads/thank-you-png/thank-you-png-testimonials-calm-order-professional-home-organizing-29.png" alt="">
                        <div class="d-flex align-items-center mt-2">
                            <div class="tag">Thành công</div>
                            <div class="ms-auto number">10</div>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection