<!DOCTYPE html>
<html lang="en">

@include('admin.head')

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="text-center mb-3">
                                        <h1 class="h4 text-gray-900">Đăng nhập với <span class="text-warning">Home</span> & <span class="text-secondary">Ease</span>!</h1>
                                        <span class="text-danger small">
                                            @php
                                                use Illuminate\Support\Facades\Cookie;
                                                $mess = Session::get('message');
                                                if(isset($mess) && $mess){
                                                    echo $mess;
                                                }
                                                // $jsonRemember =
                                                $arrRemember = json_decode(Cookie::get('json_remember'),true);
                                            @endphp
                                        </span>
                                    </div>
                                    <form class="user" action="{{route('admin.signIn')}}">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" required name="username" value="{{isset($arrRemember) && $arrRemember['username'] ? $arrRemember['username'] : ''}}" value aria-describedby="emailHelp"
                                                placeholder="Nhập tài khoản">
                                        </div>
                                        <div class="form-group position-relative">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" required name="password" value="{{isset($arrRemember) && $arrRemember['password'] ? $arrRemember['password'] : ''}}" placeholder="Nhập mật khẩu">
                                                <div class="show-password show-password-login">
                                                    <i class="fa-solid fa-eye"></i>
                                                </div>
                                            @error('password')
                                                <span class="text-danger small mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" {{isset($arrRemember) && $arrRemember['remember'] ? 'checked' : ''}} name="is_remember" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Nhớ mật khẩu</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Đăng nhập
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small cursor-pointer text-decoration-none">Quên mật khẩu?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small cursor-pointer text-decoration-none">Tạo tài khoản mới?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    @include('admin.script')

</body>

</html>
