@extends('admin.app')
@section('title') Admin-Account @endsection
@section('content')
<div class="page-wrapper" >

<<<<<<< HEAD
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <span class="page-title">Tài khoản<a href="{{route('accountCreate.create')}} class="btn btn-success">Create new</a></span> 
        </div>
=======
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="row">
<div class="col-sm-4  text-white">
        <a href="" class="btn btn-success">Tạo nhân viên</a>
>>>>>>> e0b6588f1c82003be5eda2c1fd2cd9cf038b75aa
    </div>
    <div class="col-sm-4 text-white"> 
        <form class="d-flex" method="GET" action= "{{route('admin.account.search')}}" >     
            <input class="form-control me-2"  name="keyWord" type="text" placeholder="Search">
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </form>
    </div>
    <div class="col-sm-4 text-white"> 
        <div class="dropdown dropend">
            <button type="button" class="btn btn-primary dropdown-toggle"   data-bs-toggle="dropdown">
                Lựa chọn
            </button>
            <ul class="dropdown-menu">             
                <li><a class="dropdown-item" href="">Tất cả</a></li>          
                <li><a class="dropdown-item" href="">Nhân viên mới vào</a></li> 
                <li><a class="dropdown-item" href="">Nhân viên đang hoạt động</a></li>                       
            </ul>
        </div>
        
    </div>
  </div>
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
                   <td> <img style="background:white" src="{{asset('backend/assets/img/avaters/'.$item->avatar)}}" class="rounded" alt="Ảnh" width="70" height="70"> </td>  
                   <td> {{$item->status}}</td>
                   <td>
                        <a class="btn btn-success" >Edit</a>
                    </td>
                    <td>
                        <a href="{{route('admin.account.delete',$item->id)}}" class="btn btn-danger">Delete</a>
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