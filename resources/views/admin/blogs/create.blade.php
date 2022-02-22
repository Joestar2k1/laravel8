@extends('admin.app')
@section('title') Tạo bài viết @endsection
@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<form class="form-horizontal" action="{{route('admin.blog.create.post')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <fieldset>

    <!-- Form Name -->
    <legend style="text-align: center;font-style: oblique;font-size: 50;">Bài viết</legend>
    <div style="height:20%"></div>

        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="title">Tiêu dề</label>  
        <div class="col-md-4">
        <input id="title" name="title" placeholder="Tiêu dề" class="form-control input-md" required="" type="text">
            
        </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="content">Nội dung</label>  
        <div class="col-md-4">
        <textarea class="form-control" id="content" name="content" rows="5"></textarea>
            
        </div>
        </div>

    <!-- Text input-->


    <!-- File Button --> 
    <div class="form-group">
    <label class="col-md-4 control-label" for="image">Chọn ảnh cho Bài Viết</label>
    <div class="col-md-4">
        <input id="filebutton" name="image" class="input-file" type="file">
    </div>
    </div>

    <!-- Button -->
    <div class="form-group">
    <label class="col-md-4 control-label" for="singlebutton">Nút gửi</label>
    <div class="col-md-4">
        <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Tạo Bài Viết</button>
    </div>
    </div>

    </fieldset>
</form>

@endsection