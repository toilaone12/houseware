@extends('dashboard')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content" class="mx-5">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-sm-3">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-sm-12">
                        <div class="card">
                            <h5 class="card-header">Cài đặt</h5>
                            <div class="card-body">
                                <a href="#" data-toggle="modal" data-target="#invoice" class="btn btn-primary w-100 invoice mt-3 {{$order->status == 0 || $order->status == 4 ? 'disabled' : ''}}">In hóa đơn</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-sm-12 mt-3">
                        <div class="card">
                            <h5 class="card-header">Thay đổi trạng thái đơn hàng</h5>
                            <div class="card-body status-order">
                                <!-- <button data-id="{{$order->id_order}}" class="w-100 btn btn-primary d-block check-order {{$order->status == 1 ? 'disabled' : ''}}">Kiểm tra đơn hàng</button> -->
                                @foreach($listStatus as $key => $status)
                                <a href="{{route('order.change',['id' => $order->id_order,'status' => $key])}}" class="w-100 btn btn-primary d-block {{$key > 1 ? 'mt-3': ''}} {{$key == $order->status || $key != intval($order->status) + 1 ? 'disabled' : ''}}">{{$status}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-6 col-sm-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Chi tiết đơn hàng của khách hàng {{$order->fullname}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="">
                            <div class="fs-15 text-dark mb-2">
                                Họ tên người đặt: {{ucwords($order->fullname)}}
                            </div>
                            <div class="fs-15 text-dark d-flex mb-2 align-items-center">
                                Số điện thoại: <span class="phone-customer ml-1">{{$order->phone}}</span>
                                <div class="ml-3">
                                    <button class="btn btn-primary call-customer">
                                        <i class="fa-solid fa-phone"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="fs-15 text-dark mb-2">
                                Địa chỉ giao hàng: {{ucwords($order->address)}}
                            </div>
                        </div>
                        <hr class="mb-4">
                        <table id="myTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Màu</th>
                                    <th>Số lượng</th>
                                    <th>Giá thành</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($details as $key => $one)
                                @php
                                    $discount = $one->price * $one->discount / 100;
                                @endphp
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$one->code}}</td>
                                    <td><img src="{{ asset($one->image) }}" alt="" width="150" height="100"></td>
                                    <td>{{$one->name}}</td>
                                    <td>
                                        @foreach ($colors as $color)
                                            @if ($color->id_color == $one->id_color)
                                            {{$color->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$one->quantity}}</td>
                                    <td>{{number_format($one->price,0,',','.')}}đ</td>
                                    <td>{{number_format($one->price * $one->quantity,0,',','.')}}đ</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="invoice" tabindex="-1" role="dialog" aria-labelledby="invoiceLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 700px; !important">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="invoiceLabel">Hóa đơn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body form-invoice">

                        <div class="row">
                            <div class="col-xl-12 fs-30">
                                Harper 7 Coffee
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-7">
                                <ul class="list-unstyled float-start">
                                    <li style="font-size: 25px;">Khách hàng</li>
                                    <li>Người nhận: {{$order->fullname}}</li>
                                    <li>Số điện thoại: {{$order->phone}}</li>
                                    <li>Địa chỉ: {{$order->address}}</li>
                                </ul>
                            </div>
                            <div class="col-xl-5">
                                <ul class="list-unstyled float-end">
                                    <li style="font-size: 25px; color: red;">Cửa hàng</li>
                                    <li>Thành phố Thái Nguyên</li>
                                    <li>(+84) 985 104 987</li>
                                    <li>quan@gmail.com</li>
                                </ul>
                            </div>
                        </div>
                        <p class="text-center mt-3 fs-28">Hóa đơn #{{$order->code}}</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tên mặt hàng</th>
                                    <th scope="col" class="text-center">Màu sắc</th>
                                    <th scope="col" class="text-center">Số lượng</th>
                                    <th scope="col" class="text-center">Đơn giá</th>
                                    <th scope="col" class="text-center">Giá thành</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($details as $one)
                                <tr>
                                    <td>{{$one->name}}</td>
                                    <td class="text-center">
                                        @foreach ($colors as $color)
                                            @if ($color->id_color == $one->id_color)
                                            {{$color->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center">x{{$one->quantity}}</td>
                                    <td class="text-center">{{number_format($one->price,0,',','.')}} đ</td>
                                    <td class="text-center">{{number_format($one->price * $one->quantity,0,',','.')}} đ</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-xl-12">
                                <ul class="list-unstyled float-start ms-2">
                                    <li><span class="mr-1 float-start">Thành tiền:</span>{{number_format($order->subtotal,0,',','.')}} đ</li>
                                    <li> <span class="mr-1">Tổng tiền được giảm:</span>{{number_format($order->discount,0,',','.')}} đ</li>
                                    <li><span class="float-start mr-1">Phí vận chuyển: </span>{{number_format($order->feeship,0,',','.')}} đ</li>
                                    <li><span class="float-start mr-1">Tổng tiền phải thanh toán: </span>{{number_format($order->total,0,',','.')}} đ</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary print-invoice">Xác nhận</button>
            </div>
        </div>
    </div>
</div>
@endsection
