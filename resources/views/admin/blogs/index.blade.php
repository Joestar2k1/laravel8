@extends('admin.app')
@section('title') Blogs @endsection
@section('content')
<div class="container">
<div class="app-title">
    <div>
      <h1>Bài viết</h1>  
        <p>Xin chào  {{Session::get('emp')->fullName}} </p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
     
      <li class="breadcrumb-item"><i class="fa fa-home" aria-hidden="true"></i></li>
      <li class="breadcrumb-item"><a href="#">Bài viết</a></li>
    </ul>
  </div>
</div>
<a class="btn btn-primary" href=""><i class="fa fa-add">Tạo bài Viết</i> </a>
<div class="container-fluid">
        <div class="container mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            Mã bài viết
                        </th>
                        <th>
                            Tiêu đề
                        </th>
                        <th>
                            Nội dung
                        </th>

                        <th>
                           Ngày đăng
                        </th>
                        <th>
                            Ảnh minh họa
                        </th>
                        <th>
                            Trạng thái
                        </th>

                    </tr>
                </thead>
                <tbody>
                @foreach ($blogs as $item)
                        <tr>
                            <td> {{ $item->id }}</td>
                            <td> {{ $item->title }}</td>
                            <td> {{ $item->content }}</td>
                            <td> {{ $item->postDated }}</td>
                            <td> <img style="background:white"

                                    src="{{ asset('backend/assets/img/latest-news/' . $item->image) }}" class="rounded"
                                    alt="Ảnh" width="70" height="70"> </td>
                            <td> <div class="btn-group">
                                @if($item->status==-1)
                                    <a class="btn btn-primary" href="{{route('admin.blog.unLockBlog',$item->id)}}">
                                        <i class="fa fa-unlock"></i>
                                    </a>
                                @endif
                                @if($item->status!=-1)
                                    <a class="btn btn-primary" href="{{route('admin.blog.LockBlog',$item->id)}}">
                                        <i class="fa fa-lock"></i>
                                    </a>
                                @endif
                                <a class="btn btn-primary" href="">
                                    <i class="fa fa-lg fa-trash"></i>
                                </a>
                            </div></td>
                            </th>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $blogs->links() }}
          
        </div>
@endsection