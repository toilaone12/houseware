@extends('dashboard')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Thêm tài khoản</h1>
    </div>
    @php
        $mess = Session::get('message');
        if(isset($mess) && $mess){
            echo $mess;
        }
    @endphp
    <form action="{{route('account.add')}}" method="post">
        @csrf
        <div class="card w-100 bg-card">
            <div class="d-flex flex-wrap align-items-center mx-2">
                <div class="col-lg-4 mt-3">
                    <div class="h-100px">
                        <label for="username">Tên tài khoản (<span class="text-danger">*</span>)</label>
                        <input type="text" required name="username" id="" class="form-control border-0">
                        @error('username')
                        <span class="text-danger small mt-1">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 mt-3">
                    <div class="h-100px">
                        <label for="fullname">Họ tên (<span class="text-danger">*</span>)</label>
                        <input type="text" required name="fullname" id="" class="form-control border-0">
                        @error('fullname')
                        <span class="text-danger small mt-1">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 mt-3">
                    <div class="h-100px">
                        <label for="name">Chức vụ</label>
                        <select name="id_role" required id="" class="form-control">
                            @if (!empty($listRole))
                            @foreach ($listRole as $role)
                            <option value="{{$role->id_role}}">{{$role->name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="h-100px">
                        <label for="email">Email (<span class="text-danger">*</span>)</label>
                        <input type="email" required name="email" id="" class="form-control border-0">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="h-100px">
                        <label for="password">Mật khẩu (<span class="text-danger">*</span>)</label>
                        <input type="password" required name="password" id="password" class="form-control border-0 position-relative">
                        <div class="show-password">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                        @error('password')
                        <span class="text-danger small mt-1">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mx-20 d-flex align-items-center mt-2 mb-3">
                <button class="btn btn-outline-primary rounded mr-3">Xác nhận</button>
                <a href="{{route('account.list')}}" class="btn btn-outline-secondary rounded">Hủy bỏ</a>
            </div>
        </div>
    </form>
</div>
@endsection
