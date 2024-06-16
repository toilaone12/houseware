@extends('home')
@section('content')
<div class="section">
    <!-- container -->
    <div class="container cart-container">
        <h2 class="text-center">Giỏ hàng của tôi</h2>
        <div class="row mt-50">
            <div class="col-md-12">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Màu</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($carts as $cart)
                            @php
                                $subtotal = $cart['price'] * $cart['quantity'];
                                $total += $subtotal;
                            @endphp
                            <tr class="text-center cart-items" data-id="{{$cart['id_cart']}}">
                                <td class="product-remove" data-id="{{$cart['id_cart']}}">
                                    <a href="#" class="btn btn-danger" style="margin-top: 20px;">
                                        <i class="fa-solid fa-xmark" style="padding-top: 4px;"></i>
                                    </a>
                                </td>

                                <td width="200">
                                    <img src="{{asset($cart['image'])}}" alt="" width="100" height="80" class="img-fluid object-fit-cover">
                                </td>

                                <td>
                                    <h4 class="mt-30">{{$cart['name']}}</h4>
                                </td>

                                <td><div style="margin-top: 29px">{{$cart['color']}}</div></td>

                                <td class="quantity" width="125">
                                    <div class="input-number mt-20">
                                        <input type="number" name="quantity" value="{{$cart['quantity']}}" min="1" max="{{$cart['limit']}}" data-id="{{$cart['id_cart']}}" class="text-center qty-input-cart">
                                        <span class="qty-detail-up qty-click-cart" data-id="{{$cart['id_cart']}}" data-type="up">+</span>
                                        <span class="qty-detail-down qty-click-cart" data-id="{{$cart['id_cart']}}" data-type="down">-</span>
                                    </div>
                                </td>

                                <td><div style="margin-top: 29px"><span class="price-cart">{{number_format($cart['price'],0,',','.')}}</span> đ</div></td>

                                <td><div style="margin-top: 29px"><span class="total-cart">{{number_format($subtotal,0,',','.')}}</span> đ</div></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mt-50 mb-100">
            <div class="col-md-4">
                <div class="card-discount">
                    <h4>Áp mã khuyến mãi</h4>
                    <div class="d-flex">
                        <input type="text" name="discount" required id="" class="form-control-cart">
                        <a class="btn-discount-cart use-discount">  <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="cart-total mt-20 mt-xs-20">
                    <h3>Tổng tiền giỏ hàng</h3>
                    <p class="d-flex">
                        <span>Thành tiền</span>
                        <span class="subtotal-cart">{{number_format($total,0,',','.')}}</span>đ
                    </p>
                    <p class="d-flex">
                        <span>Phí vận chuyển</span>
                        <span class="feeship-cart">0</span>đ
                    </p>
                    <p class="d-flex">
                        <span>Mã giảm giá</span>
                        <span class="discount-cart">0</span>đ
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Tổng tiền</span>
                        <span class="total-all-cart">{{number_format($total,0,',','.')}}</span>đ
                    </p>
                </div>
                <div class="cart-btns">
                    <a class="btn-checkout checkout cursor-pointer"><span class="mr-5">Mua hàng</span>  <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
