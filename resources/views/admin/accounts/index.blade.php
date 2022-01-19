@extends('admin.app')
@section('title') Admin-Account @endsection
@section('content')
<div class="page-wrapper" >

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <span class="page-title">Tài khoản<a class="btn btn-success">Create new</a></span> 
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
                        Mã nhân viên
                    </th> 
                    <th>
                       Tên hiển thị
                    </th>   
                    <th>
                      Email
                    </th>   
                    <th>
                       Họ tên
                    </th>       
                    <th>
                       Địa chỉ
                    </th>     
                    <th>
                      Số điện thoại
                    </th>   
                    <th>
                       Ảnh
                    </th> 
                    <th>
                       Trạng thái
                    </th>  
                    <th>
                       Sửa
                    </th>     
                    <th>
                       Xóa
                    </th>             
                </tr>
            </thead>
            <tbody>   
                @foreach($data as $item)
                <tr>                        
                   <td> {{$item->id}}</td>
                   <td> {{$item->username}}</td>
                   <td> {{$item->email}}</td>
                   <td> {{$item->fullName}}</td>
                   <td> {{$item->address}}</td>
                   <td> {{$item->phone}}</td>
                   <td> {{$item->avatar}}</td>
                   <td> {{$item->status}}</td>
                   <td>
                        <a class="btn btn-success" >Edit</a>
                    </td>
                    <td>
                        <a class="btn btn-danger">Delete</a>
                    </td>
                </tr>    
                @endforeach           
            </tbody>
        </table>
        {{$data->links()}}
    </div>
</div>
</div>

@endsection