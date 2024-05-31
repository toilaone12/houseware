@extends('dashboard')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content" class="mx-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách phí vận chuyển</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Khoảng cách</th>
                                    <th>Thời tiết</th>
                                    <th>Giá phí</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $key => $one)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$one->radius}}</td>
                                    <td>
                                        <img src="{{ $one->weather == 'Nắng' ? asset('be/img/icon-sun.png') : asset('be/img/icon-rain.png') }}" alt="" width="150" height="100">
                                    </td>
                                    <td>{{number_format($one->fee,0,',','.')}}đ</td>
                                    <td align="center">
                                        <a href="{{route('fee.formUpdate',['id' => $one->id_fee])}}" class="btn btn-primary d-md-block d-lg-inline-block d-xl-inline-block mb-md-2 mb-lg-0 mb-xl-0"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger delete-fee" data-id="{{$one->id_fee}}" data-name="{{$one->radius}}"><i class="fa-solid fa-trash-can"></i></a>
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
