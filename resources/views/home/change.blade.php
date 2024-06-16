<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đổi mật khẩu mới</title>
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
                                    <form action="{{route('home.updatePassword')}}" method="post">
                                        <div class="center-wrap">
                                            <div class="section text-center">
                                                <h4 class="mb-4 pb-3">Đổi mật khẩu mới</h4>
                                                @php
                                                    $mess = Session::get('message');
                                                    if(isset($mess) && $mess){
                                                        echo $mess;
                                                    }
                                                @endphp
                                                @csrf
                                                <input type="hidden" name="id" value="{{$id}}">
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-style"
                                                        placeholder="Mật khẩu" id="password" autocomplete="off">
                                                        <i class="input-icon uil uil-lock-alt"></i>
                                                    @error('password')
                                                        <p class="text-danger small">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="repassword" class="form-style"
                                                        placeholder="Nhập lại mật khẩu" id="repassword" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                    @error('repassword')
                                                        <p class="text-danger small">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn mt-4">Xác nhận</button>
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
