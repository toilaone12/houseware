@extends('home')
@section('content')
    <div id="breadcrumb" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">
                        {{ $type == 'info' ? 'Thông tin cá nhân' : ($type == 'password' ? 'Đổi mật khẩu' : ($type == 'coupon' ? 'Mã giảm giá của tôi' : 'Đơn hàng của tôi')) }}
                    </h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="{{ route('home.dashboard') }}">Trang chủ</a></li>
                        <li class="active">
                            {{ $type == 'info' ? 'Thông tin cá nhân' : ($type == 'password' ? 'Đổi mật khẩu' : ($type == 'coupon' ? 'Mã giảm giá của tôi' : 'Đơn hàng của tôi')) }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-12">
                    <div class="card">
                        <a href="{{ route('account.home', ['type' => 'info']) }}">
                            <div class="card-body-account {{ $type == 'info' ? 'active' : '' }}">
                                Thông tin cá nhân
                            </div>
                        </a>
                    </div>
                    <div class="card">
                        <a href="{{ route('account.home', ['type' => 'password']) }}">
                            <div class="card-body-account {{ $type == 'password' ? 'active' : '' }}">
                                Đổi mật khẩu
                            </div>
                        </a>
                    </div>
                    <div class="card">
                        <a href="{{ route('account.home', ['type' => 'coupon']) }}">
                            <div class="card-body-account {{ $type == 'coupon' ? 'active' : '' }}">
                                Mã giảm giá
                            </div>
                        </a>
                    </div>
                    <div class="card">
                        <a href="{{ route('account.home', ['type' => 'order']) }}">
                            <div class="card-body-account {{ $type == 'order' ? 'active' : '' }}">
                                Đơn hàng của tôi
                            </div>
                        </a>
                    </div>
                </div>
                @if ($type == 'info')
                    <div class="col-md-9 col-xs-12">
                        <div class="billing-details">
                            <form action="{{route('account.updateProfile')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="input" type="text" required name="fullname" value="{{$account->fullname}}" placeholder="Họ tên">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="input" type="number" min="0" required name="phone" value="{{$account->phone}}"
                                                placeholder="Số điện thoại">
                                            @error('phone')
                                                <p class="text-danger small mt-5">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="input" type="email" required name="email" value="{{$account->email}}" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="input" type="text" required name="address" value="{{$account->address}}" placeholder="Địa chỉ">
                                        </div>
                                    </div>
                                    <button type="submit" class="primary-btn order-submit ml-15">Lưu thông tin</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @elseif ($type == 'password')
                    <div class="col-md-9 col-xs-12">
                        <div class="billing-details">
                            <form action="{{route('account.updatePassword')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="input" type="password" required name="password" placeholder="Mật khẩu">
                                            @error('password')
                                                <p class="text-danger small mt-5">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="input" type="password" required name="repassword" placeholder="Nhập lại mật khẩu">
                                            @error('repassword')
                                                <p class="text-danger small mt-5">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="primary-btn ml-15">Lưu mật khẩu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @elseif ($type == 'coupon')
                <div class="col-md-9 col-xs-12">
                    <div class="row">
                        @if (empty($couponUser))
                            <div>Bạn chưa có mã khuyến mãi nào</div>
                        @else
                            @foreach ($couponUser as $one)
                                @foreach($coupons as $coupon)
                                @if($coupon->id_coupon == $one->id_coupon && $coupon->expiration >= date('Y-m-d') && $coupon->quantity > 0)
                                <div class="col-md-8">
                                    <div class="coupon bg-white rounded mb-3 d-flex justify-content-between mb-10">
                                        <div class="kiri p-3">
                                            <div class="icon-container">
                                                <div class="icon-container_box">
                                                    <img src="data:image/png;base64,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" width="85" alt="totoprayogo.com" class="" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tengah py-3 d-flex w-100 justify-content-start">
                                            <div>
                                                <span class="badge badge-success" style="padding: 5px 15px !important;">Còn mã</span>
                                                <h3 class="lead" style="margin-bottom: 10px !important; margin-top: 5px;">{{$coupon->name}}</h3>
                                                <p class="text-muted mb-0 code-coupon">{{$coupon->code}}</p>
                                            </div>
                                        </div>
                                        <div class="kanan">
                                            <div class="info m-3 d-flex align-items-center">
                                                <div class="w-100">
                                                    <div class="block">
                                                        <span class="time font-weight-light">
                                                            <span>Hạn: {{date('d-m-Y',strtotime($coupon->expiration ))}}</span>
                                                        </span>
                                                    </div>
                                                    <div class="primary-btn mt-15 cursor-pointer copy-coupon">
                                                        Lưu mã
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            @endforeach
                        @endif
                    </div>
                </div>
                @elseif ($type == 'order')
                <div class="col-md-9 col-xs-12" style="height: 800px; overflow:auto">
                    <div class="row">
                        @foreach ($orders as $order)
                        <div class="col-md-12 mb-15">
                            <div class="coupon">
                                <div class="d-flex align-items-baseline justify-content-between">
                                    <h3>Đơn hàng #{{$order->code}}</h3>
                                    @if ($order->status == 0 || $order->status == 1 || $order->status == 2)
                                        <div class="badge fs-17 badge-warning">{{$order->status == 0 ? 'Đang chờ nhận đơn' : ($order->status == 1 ? 'Đã nhận đơn' : 'Đang giao đơn')}}</div>
                                    @elseif ($order->status == 3)
                                        <div class="badge fs-17 badge-success">Giao thành công</div>
                                    @else
                                        <div class="badge fs-17 badge-danger">Đã hủy đơn</div>
                                    @endif
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p>Người đặt: {{$order->fullname}}</p>
                                    <p>Tổng tiền: {{number_format($order->total,0,',','.')}} đ (Đã bao gồm phụ phí)</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p>Ngày mua: {{date('d/m/Y',strtotime($order->created_at))}}</p>
                                    <p>Phương thức thanh toán: {{$order->payment}}</p>
                                </div>
                                <a href="{{route('order.orderDetail',['id' => $order->id_order])}}" class="order-btn">Xem chi tiết</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
