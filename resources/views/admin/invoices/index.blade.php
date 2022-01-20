@extends('admin.app')
@section('title') Admin-Account @endsection
@section('content')
<div class="page-wrapper" >
<div>
    <h4>Danh sách các hóa đơn</h4>
</div>
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <a class="btn btn-success">Create new</a>
        </div>
    </div>
    <!-- /.col-lg-12 -->
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
</div>

@endsection