@extends('dashboard')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Sửa danh mục</h1>
        </div>
        @php
            $mess = Session::get('message');
            if (isset($mess) && $mess) {
                echo $mess;
            }
        @endphp
        <form action="{{ route('coupon.edit') }}" method="post">
            @csrf
            <div class="card w-100 bg-card">
                <div class="d-flex flex-wrap align-items-center mx-2">
                    <input type="hidden" name="id" value="{{$one->id_coupon}}">
                    <div class="col-lg-4 mt-3">
                        <div class="h-100px">
                            <label for="name">Tên mã (<span class="text-danger">*</span>)</label>
                            <input type="text" required name="name" id="name" value="{{$one->name}}" class="form-control border-0">
                            @error('name')
                                <span class="text-danger small mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="h-100px">
                            <label for="code">Mã code (<span class="text-danger">*</span>)</label>
                            <input type="text" required name="code" id="code" value="{{$one->code}}" class="form-control border-0">
                            @error('code')
                                <span class="text-danger small mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-2 mt-3">
                        <div class="h-100px">
                            <label for="quantity">Số lượng (<span class="text-danger">*</span>)</label>
                            <input type="number" min="0" required name="quantity" id="quantity" value="{{$one->quantity}}"
                                class="form-control border-0">
                            @error('quantity')
                                <span class="text-danger small mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="h-100px">
                            <label for="type">Loại mã (<span class="text-danger">*</span>)</label>
                            <select name="type" id="type" class="form-control choose-type">
                                <option {{$one->type == 0 ? 'selected' : ''}} value="0">Theo số tiền</option>
                                <option {{$one->type == 1 ? 'selected' : ''}} value="1">Theo phần trăm</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="h-100px">
                            <label for="discount">Số tiền được giảm (<span class="text-danger">*</span>)</label>
                            <input type="text" required name="discount" id="discount" value="{{$one->discount}}"
                                class="form-control border-0 price-coupon price-autonumberic">
                            @error('discount')
                                <span class="text-danger small mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="h-100px">
                            <label for="expiration">Ngày hết hạn (<span class="text-danger">*</span>)</label>
                            <input type="date" required name="expiration" value="{{$one->expiration}}" min="{{ date('Y-m-d') }}" id="expiration"
                                class="form-control border-0 date-moment">
                            @error('expiration')
                                <span class="text-danger small mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mx-20 d-flex align-items-center mt-2 mb-3">
                    <button class="btn btn-outline-primary rounded mr-3">Xác nhận</button>
                    <a href="{{ route('coupon.list') }}" class="btn btn-outline-secondary rounded">Hủy bỏ</a>
                </div>
            </div>
        </form>
    </div>
@endsection
