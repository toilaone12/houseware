@extends('home')
@section('content')
<div id="breadcrumb" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">
                    {{$title}}
                </h3>
                <ul class="breadcrumb-tree">
                    <li><a href="{{ route('home.dashboard') }}">Trang chủ</a></li>
                    <li class="active">
                        {{$title}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="row">
                    <div class="col-md-12 mb-15">
                        <div class="coupon">
                            <div class="d-flex align-items-baseline justify-content-between mb-15">
                                <h3>Đơn hàng #{{$order->code}}</h3>
                                @if ($order->status == 0 || $order->status == 1 || $order->status == 2)
                                    <div class="badge fs-17 badge-warning">{{$order->status == 0 ? 'Đang chờ nhận đơn' : ($order->status == 1 ? 'Đã nhận đơn' : 'Đang giao đơn')}}</div>
                                @elseif ($order->status == 3)
                                    <div class="badge fs-17 badge-success">Giao thành công</div>
                                @else
                                    <div class="badge fs-17 badge-danger">Đã hủy đơn</div>
                                @endif
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-5">
                                <p>Người đặt: {{$order->fullname}}</p>
                                <p>Thành tiền: {{number_format($order->subtotal,0,',','.')}} đ </p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-5">
                                <p>Số điện thoại: {{$order->phone}}</p>
                                <p>Phí giảm giá: {{number_format($order->fee_discount,0,',','.')}} đ </p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-5">
                                <p>Ngày mua: {{date('d/m/Y',strtotime($order->created_at))}}</p>
                                <p>Phí vận chuyển: {{number_format($order->feeship,0,',','.')}} đ </p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-5">
                                <p>Phương thức thanh toán: {{$order->payment}}</p>
                                <p>Tổng tiền: {{number_format($order->total,0,',','.')}} đ (Đã bao gồm phụ phí)</p>
                            </div>
                            <div class="mb-5">
                                <p>Địa chỉ nhận hàng: {{$order->address}}</p>
                                <p>Ghi chú: {{!$order->note ? 'Không có' : $order->note}}</p>
                            </div>
                            @php
                                $url = !in_array($order->status,[2,3,4]) ? route('order.change',['id' => $order->id_order,'status' => 4]) : '#';
                                $disabled = !in_array($order->status,[2,3,4]) ? '' : 'disabled';
                            @endphp
                            <a href="{{$url}}"  class="cancel-btn {{$disabled}}">Hủy đơn hàng</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="text-center mt-15 mb-30">
                            <h3>Các sản phẩm đã mua</h3>
                        </div>
                    </div>
                    @foreach ($details as $detail)
                    <div class="col-md-6 mb-15">
                        <div class="coupon">
                            <div class="order-detail-item">
                                <div class="order-detail-image">
                                    <img src="{{asset($detail->image)}}" alt="" width="150" height="100" class="">
                                </div>
                                <div class="order-detail-body ml-15">
                                    <h3>{{$detail->name}}</h3>
                                    <div class="order-detail-price">
                                        <span class="mr-5">x{{$detail->quantity}}</span>
                                        <span class="mr-5">
                                            @foreach ($colors as $color)
                                                @if ($color->id_color == $detail->id_color)
                                                {{$color->name}}
                                                @endif
                                            @endforeach
                                        </span>
                                        <span class="mr-5">{{number_format($detail->price,0,',','.')}}đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
