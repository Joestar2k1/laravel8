@extends('admin.app')
@section('title') Admin-Account @endsection
@section('content')
<div class="container">
<div class="row">
  <div class="col">
        <label for="dateCreated" class="form-label">Tìm hóa đơn theo mốc thời gian</label>
        <input type="date" id="date-picker" class="form-control"  name="dateCreated" value="">
        
  </div>
  <div class="col">.col</div>
  <div class="col">.col</div>
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
                        Người đặt
                    </th> 
                    <th>
                        Ngày tạo
                    </th>   
                    <th>
                        Người nhận
                    </th>   
                    <th>
                        Số điện thoại
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
                      Thao tác
                    </th>                                   
                </tr>
            </thead>
            <tbody>   
                @foreach($data as $item)
                <tr>                        
                   <td> {{$item->id}}</td>
                   <td> {{$item->fullName}}</td>
                   <td> {{$item->dateCreated}}</td>
                   <td> {{$item->shippingName}}</td>
                   <td> {{$item->shippingPhone}}</td>
                   <td> {{$item->shippingAddress}}</td>
                   <td> {{$item->total}}</td>
                   <td> {{$item->status}}</td>
                   <td>
                        <a class="btn btn-success" >Edit</a>
                        <a class="btn btn-danger">Delete</a>
                    </td>
                
                </tr>    
                @endforeach           
            </tbody>
            {{$data->links()}}
        </table>
    </div>
</div>
@endsection