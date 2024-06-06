@extends('home')
@section('content')
    <div class="section">
        <!-- container -->
        <div class="container">
            <h2 class="text-center">Giỏ hàng của tôi</h2>
            <div class="row mt-50">
                <div class="col-md-10">
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
                                @foreach ($carts as $cart)
                                <tr class="text-center cart-items" data-id="{{$cart['id_cart']}}">
                                    <td class="product-remove">
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
                                            <span class="qty-detail-up qty-cart" data-id="{{$cart['id_cart']}}" data-type="up">+</span>
                                            <span class="qty-detail-down qty-cart" data-id="{{$cart['id_cart']}}" data-type="down">-</span>
                                        </div>
                                    </td>

                                    <td><div style="margin-top: 29px"><span class="price-cart">{{number_format($cart['price'],0,',','.')}}</span> đ</div></td>

                                    <td><div style="margin-top: 29px"><span class="total-cart">{{number_format($cart['price'] * $cart['quantity'],0,',','.')}}</span> đ</div></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-2">

                </div>
            </div>
        </div>
        </section>
    @endsection
