@extends('dashboard')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content" class="mx-5">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách mã giảm giá</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên mã</th>
                                    <th>Code</th>
                                    <th>Số lượng</th>
                                    <th>Loại mã</th>
                                    <th>Số tiền giảm</th>
                                    <th>Ngày hết hạn</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $key => $one)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$one->name}}</td>
                                    <td>{{$one->code}}</td>
                                    <td>{{$one->quantity}}</td>
                                    <td>{{$one->type == 0 ? 'Theo số tiền' : 'Theo phần trăm'}}</td>
                                    <td>{{number_format($one->discount,0,',','.')}} {{$one->type == 0 ? 'đ' : '%'}}</td>
                                    <td>{{date('d/m/Y',strtotime($one->expiration))}}</td>
                                    <td align="center">
                                        <a href="{{route('coupon.formUpdate',['id' => $one->id_coupon])}}" data-id="{{$one->id_coupon}}" class="btn btn-primary d-md-block d-lg-inline-block d-xl-inline-block mb-md-2 mb-lg-0 mb-xl-0"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger delete-coupon" data-id="{{$one->id_coupon}}" data-name="{{$one->name}}"><i class="fa-solid fa-trash-can"></i></a>
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
