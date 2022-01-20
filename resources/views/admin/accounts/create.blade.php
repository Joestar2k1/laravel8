<<<<<<< HEAD
<h1> Create accounts</h1>

<form action="{{ route('accountCreate.store') }}" method="POST">
    @csrf
    <div class="tile">
        <div class="">
            <label for="id"> id</label>
            <input @error('id') is-invalid @enderror" name="id" required type="text" name="id" id="id">

            @error('id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="">
            <label for="username"> Username</label>
            <input @error('username') is-invalid @enderror" name="username" required type="text" name="username"
                id="username">

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="">
            <label for="fullName"> fullName</label>
            <input @error('fullName') is-invalid @enderror" name="fullName" required type="text" name="fullName"
                id="fullName">

            @error('fullName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="">
            <label for="email"> email</label>
            <input @error('email') is-invalid @enderror" name="email" required type="email" name="email" id="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="">
            <label for="password"> password</label>
            <input @error('email') is-invalid @enderror" name="password" required type="password" name="password"
                id="password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="">
            <label for="address"> address</label>
            <input @error('address') is-invalid @enderror" name="address" required type="text" name="address"
                id="address">

            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="">
            <label for="phone"> phone</label>
            <input @error('phone') is-invalid @enderror" name="phone" required type="text" name="phone" id="phone">

            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="">
            <label for="isAdmin"> isAdmin</label>
            <input @error('isAdmin') is-invalid @enderror" name="isAdmin" required type="checkbox" name="isAdmin"
                id="isAdmin">

            @error('isAdmin')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="">
            <label for="avatar"> avatar</label>
            <input @error('avatar') is-invalid @enderror" name="avatar" required type="text" name="avatar" id="avatar">

            @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="">
            <label for="status"> status</label>
            <input @error('status') is-invalid @enderror" name="status" required type="checkbox" name="status"
                id="status">

            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="">
            <button type="submit">Create</button>
        </div>
</form>
=======
@extends('admin.app')
@section('title') Tạo sản phẩm @endsection
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="container">
  <form action="{{route('admin.product.create.index')}}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="mb-3 mt-3">
      <label for="name" class="form-label">Tên đăng nhập:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter tên sản phẩm" name="name" required>
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Giá bán :</label>
      <input type="number" class="form-control" id="price" placeholder="Enter price" name="price">
    </div>
    <div class="mb-3 mt-3">
      <label for="type" class="form-label">Chọn loại:</label>
        <select class="form-select" id="type" name="type">
          @foreach($data as $item)
            <option>{{$item->type}}</option>
          @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="stock" class="form-label">Nhập số lượng vào kho:</label>
      <input type="number" class="form-control" id="stock" placeholder="Enter stock" name="stock">
    </div>
    <div class="mb-3">
      <label for="unit" class="form-label">Đơn vị tính:</label>
      <input type="text" class="form-control" id="unit" placeholder="Enter unit" name="unit">
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Ảnh:</label>
      <input type="file" class="form-control" placeholder="Chọn ảnh" name="image">
    </div> 
    <div class="mb-3 mt-3">
        <label for="description">Mô tả:</label>
        <textarea class="form-control" rows="3" id="description" name="description"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection 
>>>>>>> e0b6588f1c82003be5eda2c1fd2cd9cf038b75aa
