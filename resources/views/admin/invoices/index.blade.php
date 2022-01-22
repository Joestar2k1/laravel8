@extends('admin.app')
@section('title') Admin-Account @endsection
@section('content')
<div class="container">
<div style="color:green;text-align:center">
        <h3>Hóa đơn bán hàng</h3>
    </div>
<div class="row">
  <div class="col"> <label for="" class="form-label">Tìm theo ngày</label>
        <input type="date" id="date-picker" class="form-control"  name="" value=""></div>
  <div class="col">
  <label for="" class="form-label">Tìm theo tên, mã hóa đơn</label>
        <form class="d-flex" method="GET" action= "" >     
            <input class="form-control me-2"  name="keyWord" type="text" placeholder="Search">
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </form>
  </div>
</div>
</div>
<div class="container-fluid">
    <div class="container mt-3">
        <table class="table table-striped">
            <thead>

                <tr>
                    <th>
                       Mã hóa đơn
                    </th>
                    <th>
                      Khách hàng
                    </th> 
                    <th>
                        Ngày tạo
                    </th>                                             
                    <th>
                       Địa chỉ giao
                    </th>     
                    <th>
                        Tổng
                    </th>   
                    <th>
                       Trạng thái
                    </th> 
                    <th>
                        Xem
                    </th>
                                                   
                </tr>
            </thead>
            <tbody>   
                @foreach($invoices as $item)
                <tr>                        
                   <td> {{$item->id}}</td>
                   <td> {{$item->fullName}}</td>
                   <td> {{$item->dateCreated}}</td>              
                   <td> {{$item->shippingAddress}}</td>
                   <td> {{$item->total}}</td>
                   <td>   
                      @if($item->status ==1)
                         <span>   <i class="fa fa-check" style="color:green" ></i>Đã thanh toán</span>
                        @endif
                        @if($item->status ==0)
                         <span>   <i class="fa fa-check" style="color:red"></i>Chưa thanh toán</span>
                        @endif
                      
                    </td>
                    <td>
                        <a href="{{route('admin.invoice.details',$item->id)}}">  <i class="fa fa-eye"></i></a>
                    </td>
                   <td>
                        <a class="btn btn-success" style="color:white" >Edit</a>
                       
                    </td>
                    <td>
                    <a class="btn btn-danger" style="color:white">Delete</a>
                    </td>
                </tr>    
                @endforeach           
            </tbody>
            {{$invoices->links()}}
        </table>
    </div>
</div>
@endsection