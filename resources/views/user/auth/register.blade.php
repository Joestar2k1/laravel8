<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{asset('frontend/assets_login/css/register.css')}}" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>

<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Xin chào bạn</h3>
                        <p>Hãy nhấn đăng nhập để vào page login</p>
                        <form action="{{route('user.login')}}" method="GET">
                            <input type="submit" name="" value="Login"/><br/>
                        </form>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Đăng ký tài khoản</h3>
                                <form action="{{route('user.register.post')}}" method="POST" role="form" enctype="multipart/form-data">
                                @csrf
                                    <div class="row register-form">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="username"class="form-control" placeholder="Tên hiển thị" value="" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="fullName" placeholder="Họ tên" value="" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="address" placeholder="Địa chỉ hiện tại" value="" />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control"name="password" placeholder="Mật khẩu" value="" />
                                               @if(!empty(Session::get('error-password')))
                                                <span style="color:red">Mật khẩu không trùng khớp</span>
                                               @endif
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="passwordConfirm" placeholder="Nhập lại mật khẩu" value="" />
                                                @if(!empty(Session::get('error-password')))
                                                <span style="color:red">Mật khẩu không trùng khớp</span>
                                               @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" name="email"class="form-control" placeholder="Email" value="" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" minlength="10" maxlength="10" name="phone" class="form-control" placeholder="Số điện thoại" value="" />
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control">
                                                    <option class="hidden"  selected disabled>Chọn câu hỏi</option>
                                                    <option>Bạn thích nhất trái cây nào?</option>
                                                    <option>Bạn ghét loại trái cây nào?</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control"name="answer" placeholder="Nhập câu trả lời" value="" />
                                            </div>
                                            <input type="submit" class="btnRegister"  value="Register"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                           
                        </div>
                    </div>
                </div>

            </div>
</body>
</html>