@extends('admin.layout')
@section('title') Admin @endsection
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-home"></i> Dashboard</h1>
      <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
     
      <li class="breadcrumb-item"><i class="fas fa-laptop-house"></i></li>
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon">
        <i class="icon far fa-user fa-3x"></i>
        <div class="info">
          <h4>Users</h4>
          <p><b>5</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon">
        <i class="icon fas fa-thumbs-up fa-3x"></i>
        <div class="info">
          <h4>Likes</h4>
          <p><b>25</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon">
        <i class="icon fas fa-folder-open fa-3x"></i>
        <div class="info">
          <h4>Uploades</h4>
          <p><b>10</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon">
        <i class="icon fas fa-star fa-3x"></i>
        <div class="info">
          <h4>Stars</h4>
          <p><b>500</b></p>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection