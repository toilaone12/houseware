@extends('dashboard')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Sửa màu</h1>
        </div>
        @php
            $mess = Session::get('message');
            if(isset($mess) && $mess){
                echo $mess;
            }
        @endphp
        <form action="{{route('color.edit')}}" method="post">
            @csrf
            <div class="card w-100 bg-card">
                <div class="d-flex align-items-center mx-2">
                    <input type="hidden" name="id" value="{{$one->id_color}}">
                    <div class="col-lg-5 mt-3">
                        <div class="form-group">
                            <label for="name">Tên màu (<span class="text-danger">*</span>)</label>
                            <input type="text" required name="name" value="{{$one->name}}" id="" class="form-control border-0">
                        </div>
                    </div>
                </div>
                <div class="mx-20 d-flex align-items-center mt-2 mb-3">
                    <button class="btn btn-outline-primary rounded mr-3">Xác nhận</button>
                    <a href="{{route('color.list')}}" class="btn btn-outline-secondary rounded">Hủy bỏ</a>
                </div>
            </div>
        </form>

    </div>
@endsection
