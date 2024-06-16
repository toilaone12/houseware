<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
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
                        <h6 class="mb-0 pb-3"><span>Đăng nhập </span><span>Đăng ký</span></h6>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                        <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <form action="{{route('home.signIn')}}" method="post">
                                        <div class="center-wrap">
                                            <div class="section text-center">
                                                <h4 class="mb-4 pb-3">Đăng nhập</h4>
                                                @php
                                                    $mess = Session::get('message');
                                                    if(isset($mess) && $mess){
                                                        echo $mess;
                                                    }
                                                @endphp
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" name="username" class="form-style"
                                                        placeholder="Tài khoản" id="username" autocomplete="off">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password" class="form-style"
                                                        placeholder="Mật khẩu" id="password" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <button type="submit" class="btn mt-4">Đăng nhập</button>
                                                <p class="mb-0 mt-4 text-center"><a href="{{route('home.forgot')}}" class="link">Quên mật khẩu?</a></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-back">
                                    <div class="center-wrap">
                                        <form action="{{route('home.signUp')}}" method="POST">
                                            <div class="section text-center">
                                                <h4 class="mb-4 pb-3">Đăng ký</h4>
                                                @php
                                                    $mess = Session::get('signUp');
                                                    if(isset($mess) && $mess){
                                                        echo $mess;
                                                    }
                                                @endphp
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" required name="fullname" class="form-style"
                                                        placeholder="Họ tên" autocomplete="off">
                                                    <i class="input-icon uil uil-user"></i>
                                                    @error('fullname')
                                                        <p class="text-danger text-left my-1 small">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="text" required name="username" class="form-style"
                                                        placeholder="Tên đăng nhập" autocomplete="off">
                                                    <i class="input-icon uil uil-unamused"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="email" required name="email" class="form-style"
                                                        placeholder="Email" autocomplete="off">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" required name="password" class="form-style"
                                                        placeholder="Mật khẩu" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                    @error('password')
                                                        <p class="text-danger text-left my-1 small">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn mt-4">Đăng ký</button>
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
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@iconscout/unicons@4.0.8/script/monochrome/bundle.min.js"></script>
</html>
