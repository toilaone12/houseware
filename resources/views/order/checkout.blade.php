@extends('home')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Thông tin đơn hàng</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="{{route('home.dashboard')}}">Trang chủ</a></li>
                    <li class="active">Thông tin đơn hàng</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <form action="">
            @csrf
            <!-- row -->
            <div class="row">

                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Thông tin đơn hàng</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" required name="fullname" placeholder="Họ tên">
                        </div>
                        <div class="form-group">
                            <input class="input" type="phone" min="0" required name="phone" placeholder="Số điện thoại">
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" required name="email" placeholder="Email">
                        </div>

                    </div>
                    <!-- /Billing Details -->

                    <!-- Shiping Details -->
                    <div class="shiping-details d-none">
                        <div class="section-title">
                            <h3 class="title">Địa chỉ nhận hàng</h3>
                            <h5 class="text-note">Lưu ý: Hãy sử dụng nút tìm địa chỉ để tìm ra địa điểm phù hợp</h5>
                        </div>
                        <div class="form-group d-flex">
                            <input class="input disabled order-address" type="text" disabled name="address" placeholder="Địa chỉ">
                            <button class="btn btn-open-modal" data-href="{{route('modal.address')}}" data-toggle="modal">Tìm địa chỉ</button>
                        </div>
                    </div>
                    <!-- /Shiping Details -->
                    <div class="shiping-details d-none">
                        <div class="section-title">
                            <h3 class="title">Lưu ý khi giao hàng</h3>
                        </div>
                        <div class="order-notes">
                            <textarea class="input" placeholder="Ghi chú"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Order Details -->
                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">Đơn hàng của bạn</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div class="text-uppercase"><strong>Sản phẩm</strong></div>
                            <div class="text-uppercase"><strong>Tổng tiền</strong></div>
                        </div>
                        <div class="order-products">
                            @php
                                $total = 0;
                                $subtotal = 0;
                                $discount = empty($coupon) ? 0 : $coupon['discount'];
                            @endphp
                            @foreach ($carts as $cart)
                            @php
                                $subtotal = $cart['quantity'] * $cart['price'];
                                $total += $subtotal;
                            @endphp
                            <div class="order-col">
                                <div>{{$cart['quantity']}}x {{$cart['name']}} <br>(Màu: {{$cart['color']}})</div>
                                <div>{{number_format($subtotal,0,',','.')}} đ</div>
                            </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="order-col">
                            <div>Thành tiền</div>
                            <div><strong class="order-subtotal">{{number_format($total,'0',',','.')}}</strong> đ</div>
                        </div>
                        <div class="order-col">
                            <div>Phí vận chuyển</div>
                            <div><strong class="order-feeship">0</strong> đ</div>
                        </div>
                        <div class="order-col">
                            <div>Mã giảm giá</div>
                            <div><strong class="order-coupon">{{$discount;}}</strong> đ</div>
                        </div>
                        <div class="order-col">
                            <div class="text-uppercase"><strong>Tổng tiền</strong></div>
                            <div><strong class="order-total">{{number_format($total + $discount,'0',',','.')}} đ</strong></div>
                        </div>
                    </div>
                    <div class="payment-method">
                        <div class="input-radio">
                            <input type="radio" class="choose-payment" data-type="1" name="payment" id="payment-1">
                            <label for="payment-1">
                                <span></span>
                                Nhận tại cửa hàng
                            </label>
                            <div class="caption">
                                <p class="fs-18">Địa chỉ: Thành phố Thái Nguyên</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" class="choose-payment" data-type="2" name="payment" id="payment-2">
                            <label for="payment-2">
                                <span></span>
                                Thanh toán bằng thẻ ngân hàng sau khi nhận hàng
                            </label>
                            <div class="caption">
                                <p class="fs-18">Thanh toán bằng Momo</p>
                                <p class="fs-18">Thanh toán bằng VNPAY</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" class="choose-payment" data-type="3" name="payment" id="payment-3">
                            <label for="payment-3">
                                <span></span>
                                Thanh toán bằng tiền mặt sau khi nhận hàng
                            </label>
                        </div>
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" class="order-terms" name="terms" id="terms">
                        <label for="terms">
                            <span></span>
                            Tôi đã đọc và chấp nhận các điều khoản & điều kiện
                        </label>
                    </div>
                    <button type="submit" class="primary-btn order-submit">Đặt hàng</button>
                </div>
                <!-- /Order Details -->
            </div>
            <!-- /row -->
        </form>
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection
