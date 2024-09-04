@extends('dashboard')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Trang chủ</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Số sản phẩm gia dụng đang có</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($totalProduct)}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <a href="{{route('product.list')}}" class="btn btn-primary mt-2 small w-50 mx-3">Xem chi tiết</a>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-2">Số lượng đơn ngày hôm nay ({{date('d/m/Y')}})</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($totalOrder)}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <a href="{{route('order.list')}}" class="btn btn-success mt-2 small w-50 mx-3">Xem chi tiết</a>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-2">Số tiền đơn hàng</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($totalOrderComplete,0,',','.')}} đ</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Số đơn đang chờ</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($totalPending)}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-file-invoice fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <a href="{{route('order.list')}}" class="btn btn-warning mt-2 small w-50 mx-3">Xem chi tiết</a>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Số đơn đã hoàn thành</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($totalComplete)}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-file-invoice fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <a href="{{route('order.list')}}" class="btn btn-success mt-2 small w-50 mx-3">Xem chi tiết</a>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Số đơn đã bị hủy</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($totalCancel)}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-file-invoice fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <a href="{{route('order.list')}}" class="btn btn-danger mt-2 small w-50 mx-3">Xem chi tiết</a>
            </div>
        </div>
    </div>


</div>
@endsection
