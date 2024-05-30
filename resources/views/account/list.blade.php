@extends('dashboard')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content" class="mx-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách tài khoản (Với tài khoản quản trị)</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên tài khoản</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Chức vụ</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listAdmin as $key => $oneAdmin)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$oneAdmin->username}}</td>
                                    <td>{{$oneAdmin->fullname}}</td>
                                    <td>{{$oneAdmin->email}}</td>
                                    <td>
                                        @foreach($listRole as $role)
                                        @if($role->id_role == $oneAdmin->id_role)
                                        {{$role->name}}
                                        @endif
                                        @endforeach
                                    </td>
                                    <td align="center">
                                        <a title="Cấp lại mật khẩu" data-id="{{$oneAdmin->id_account}}" data-name="{{$oneAdmin->username}}" class="assign-password btn btn-primary d-md-block d-lg-inline-block d-xl-inline-block mb-md-2 mb-lg-0 mb-xl-0"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger delete-account" data-id="{{$oneAdmin->id_account}}" data-name="{{$oneAdmin->username}}"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách tài khoản (Với tài khoản khách hàng)</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên tài khoản</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listUser as $key => $oneUser)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$oneUser->username}}</td>
                                    <td>{{$oneUser->fullname}}</td>
                                    <td>{{$oneUser->email}}</td>
                                    <td align="center">
                                        <a title="Cấp lại mật khẩu" data-id="{{$oneUser->id_account}}" data-name="{{$oneUser->username}}" class="assign-password btn btn-primary d-md-block d-lg-inline-block d-xl-inline-block mb-md-2 mb-lg-0 mb-xl-0"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger delete-category" data-id="{{$oneUser->id_account}}" data-name="{{$oneUser->username}}"><i class="fa-solid fa-trash-can"></i></a>
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
