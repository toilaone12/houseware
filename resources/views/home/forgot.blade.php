<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('fe/css/login.css')}}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="icon" href="{{asset('favicon/favicon.ico')}}" type="image/x-icon">
</head>

<body>
    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <form action="{{route('home.checkEmail')}}" method="post">
                                        <div class="center-wrap">
                                            <div class="section text-center">
                                                <h4 class="mb-4 pb-3">Quên mật khẩu</h4>
                                                @php
                                                    $mess = Session::get('message');
                                                    if(isset($mess) && $mess){
                                                        echo $mess;
                                                    }
                                                @endphp
                                                @csrf
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-style"
                                                        placeholder="Nhập email kiểm tra" id="email" autocomplete="off">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="text" name="username" class="form-style"
                                                        placeholder="Nhập tài khoản" id="username" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <button type="submit" class="btn mt-4">Kiểm tra</button>
                                                <p class="mb-0 mt-4 text-center"><a href="{{route('home.login')}}" class="link">Quay lại đăng nhập</a></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@iconscout/unicons@4.0.8/script/monochrome/bundle.min.js"></script>
</html>
