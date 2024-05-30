@extends('dashboard')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Thêm chức vụ</h1>
        </div>
        @php
            $mess = Session::get('message');
            if(isset($mess) && $mess){
                echo $mess;
            }
        @endphp
        <form action="{{route('role.add')}}" method="post">
            @csrf
            <div class="card w-100 bg-card">
                <div class="d-flex flex-wrap align-items-center mx-2">
                    <div class="col-lg-5 mt-3">
                        <div class="h-100px">
                            <label for="name">Tên chức vụ (<span class="text-danger">*</span>)</label>
                            <input type="text" required name="name" id="" class="form-control border-0">
                            @error('name')
                            <span class="text-danger small mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="is_admin">Thuộc quản trị (<span class="text-danger">*</span>)</label>
                            <div class="form-check form-switch ml-4">
                                <input class="form-check-input" name="is_admin" value="1" type="checkbox" id="is_admin">
                                <label class="form-check-label" for="is_admin">Có</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-20 d-flex align-items-center mt-2 mb-3">
                    <button class="btn btn-outline-primary rounded mr-3">Xác nhận</button>
                    <a href="{{route('role.list')}}" class="btn btn-outline-secondary rounded">Hủy bỏ</a>
                </div>
            </div>
        </form>

    </div>
@endsection
