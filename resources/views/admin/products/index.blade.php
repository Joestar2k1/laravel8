@extends('admin.app')
@section('title') Admin-product @endsection
@section('content')
<div class="page-wrapper" >

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <span class="page-title">Sản phẩm<a href="{{route('admin.product.create.index')}}" class="btn btn-success">Create new</a></span> 
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
                        Mã sản phẩm
                    </th> 
                    <th>
                        Tên sản phẩm
                    </th>   
                    <th>
                        Số lượng TK
                    </th>   
                    <th>
                       Giá
                    </th>       
                    <th>
                       Mô tả
                    </th>     
                    <th>
                        Ảnh minh họa
                    </th>   
                    <th>
                       Loại
                    </th> 
                    <th>
                     Đơn vị tính
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
                   <td> {{$item->sku}}</td>
                   <td> {{$item->name}}</td>
                   <td> {{$item->stock}}</td>
                   <td> ${{$item->price}}</td>
                   <td> {{$item->description}}</td>
                  
                   <td> <img src="{{asset('backend/assets/img/products/'.$item->image)}}" class="rounded" alt="Ảnh" width="70" height="70"> </td>
                   <td> {{$item->type}}</td>
                   <td> {{$item->unit}}</td>
                   <td> {{$item->status}}</td>
                   <td>
                        <a class="btn btn-success" href="" >Edit</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{route('admin.product.delete',$item->id)}}">Delete</a>
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