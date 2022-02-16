@extends('admin.app')
@section('title') Đơn xác nhận @endsection
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
<div class="app-title">
    <div>
      <h1>Hóa đơn / Theo dõi đơn hàng / Đơn thành công</h1>  
        <p>Xin chào  {{Session::get('emp')->fullName}} </p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
     
      <li class="breadcrumb-item"><i class="fa fa-home" aria-hidden="true"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.invoice.orderTracking') }}">Theo dõi đơn hàng</a></li>
      <li class="breadcrumb-item"><a href="#">Đơn thành công</a></li>
    </ul>
</div>
<div class="container-fluid">
    <div class="container mt-3">
            <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Mã hóa đơn</th>
                <th scope="col">Nhân viên</th>
                <th scope="col">Khách hàng</th>
                <th scope="col">Ngày tạo hóa đơn</th>
                <th scope="col">Tổng</th>
                <th scope="col">Thanh toán</th>
                </tr>
            </thead>
            <tbody>
                @foreach($load as $item)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$item->id}}</td>
                    <td>{{$item->NV}}</td>
                    <td>{{$item->fullName}}</td>
                    <td>{{$item->dateCreated}}</td>
                    <td>{{number_format($item->total)}}VNĐ</td>
                    <td>
                    <span>   <i class="fa fa-check" style="color:green" ></i>Ok</span>
                    </td>
                  
                </tr>
                @endforeach
            </tbody>
            </table>
    </div>
</div>
@endsection