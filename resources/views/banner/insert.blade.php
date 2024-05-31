@extends('dashboard')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Thêm quảng cáo</h1>
        </div>
        @php
            $mess = Session::get('message');
            if(isset($mess) && $mess){
                echo $mess;
            }
        @endphp
        <form action="{{route('banner.add')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card w-100 bg-card">
                <div class="d-flex flex-wrap align-items-center mx-2">
                    <div class="col-lg-5 mt-3">
                        <div class="h-100px">
                            <label for="image">Hình ảnh (<span class="text-danger">*</span>) <span class="file-intro text-info"></span></label>
                            <div class="input-group">
                                <input type="file" class="form-control choose-image" id="inputGroupFile04" accept="image/*" aria-describedby="inputGroupFileAddon04" name="image" aria-label="Upload">
                                <button class="btn btn-outline-secondary push-image" type="button" id="image">Tải lên</button>
                            </div>
                            @error('image')
                            <span class="text-danger small mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 mt-3">
                        <img src="" height="225" class="mw-100 image-intro d-none" alt="">
                    </div>
                </div>
                <div class="mx-20 d-flex align-items-center mt-2 mb-3">
                    <button class="btn btn-outline-primary rounded mr-3">Xác nhận</button>
                    <a href="{{route('banner.list')}}" class="btn btn-outline-secondary rounded">Hủy bỏ</a>
                </div>
            </div>
        </form>
    </div>
@endsection
