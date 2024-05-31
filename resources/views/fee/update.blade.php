@extends('dashboard')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Sửa phí vận chuyển</h1>
        </div>
        @php
            $mess = Session::get('message');
            if(isset($mess) && $mess){
                echo $mess;
            }
        @endphp
        <form action="{{route('fee.edit')}}" method="post">
            @csrf
            <div class="card w-100 bg-card">
                <div class="d-flex flex-wrap align-items-center mx-2">
                    <input type="hidden" name="id" value="{{$one->id_fee}}">
                    <div class="col-5 mt-3">
                        <div class="h-100px">
                            <label for="radius" class="form-label">Khoảng cách (<span class="text-danger">*</span>) (<span class="radius-fee mr-1">{{$one->radius}}</span>km)</label>
                            <input type="range" class="form-range text-light range-radius" value="{{$one->radius}}" min="1" value="1" step="1" max="20" name="radius" id="radius">
                        </div>
                    </div>
                    <div class="col-3 mt-3">
                        <div class="h-100px">
                            <label for="weather">Thời tiết</label>
                            <select name="weather" required id="weather" class="form-control">
                                <option {{$one->weather == 'Nắng' ? "selected" : ""}} value="Nắng">Nắng</option>
                                <option {{$one->weather == 'Mưa' ? "selected" : ""}} value="Mưa">Mưa</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-5 mt-3">
                        <div class="h-100px">
                            <label for="fee">Giá phí (<span class="text-danger">*</span>)</label>
                            <input type="phone" value="{{$one->fee}}" required name="fee" id="fee" class="form-control price-autonumberic">
                        </div>
                    </div>
                </div>
                <div class="mx-20 d-flex align-items-center mt-2 mb-3">
                    <button class="btn btn-outline-primary rounded mr-3">Xác nhận</button>
                    <a href="{{route('fee.list')}}" class="btn btn-outline-secondary rounded">Hủy bỏ</a>
                </div>
            </div>
        </form>
    </div>
@endsection
