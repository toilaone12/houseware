@extends('dashboard')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content" class="mx-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách đơn hàng</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Tên người mua</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Email</th>
                                    <th>Ghi chú</th>
                                    <th>Thành tiền</th>
                                    <th>Phí ship</th>
                                    <th>Phí mã giảm giá</th>
                                    <th>Tổng tiền</th>
                                    <th>Phương thức thanh toán</th>
                                    <th>Tình trạng đơn hàng</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $key => $one)
                                @php
                                    $discount = $one->price * $one->discount / 100;
                                @endphp
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$one->code}}</td>
                                    <td>{{$one->fullname}}</td>
                                    <td>{{$one->phone}}</td>
                                    <td width="500">{{$one->address}}</td>
                                    <td>{{$one->email}}</td>
                                    <td>{{$one->note}}</td>
                                    <td>{{number_format($one->subtotal,0,',','.')}}đ</td>
                                    <td>{{number_format($one->feeship,0,',','.')}}đ</td>
                                    <td>{{number_format($one->discount,0,',','.')}}đ</td>
                                    <td>{{number_format($one->total,0,',','.')}}đ</td>
                                    <td width="300">{{$one->payment}}</td>
                                    <td width="300" class="text-white {{$one->status == 1 || $one->status == 2 ? 'bg-warning' : ($one->status == 3 ? 'bg-success' : ($one->status == 4 ? 'bg-danger' : 'bg-warning'))}}">{{$one->status == 1 ? 'Đã nhận đơn hàng' : ($one->status == 2 ? 'Đang đưa cho bên vận chuyển' : ($one->status == 3 ? 'Giao hàng thành công' : ($one->status == 4 ? ($one->is_cancel ? 'Cửa hàng đã hủy đơn của bạn' : 'Khách đã hủy đơn') : 'Đang chờ nhận đơn')))}}</td>
                                    <td align="center" width="130">
                                        <a href="{{route('order.detail',['id' => $one->id_order])}}" class="btn btn-primary d-md-block d-lg-inline-block d-xl-inline-block"><i class="fa-solid fa-file-invoice"></i></a>
                                    </td>
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
@endsection
