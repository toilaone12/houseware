@extends('dashboard')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content" class="mx-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách sản phẩm đồ gia dụng</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Thuộc danh mục</th>
                                    <th>Số lượng</th>
                                    <th>Giá gốc</th>
                                    <th>Giảm giá</th>
                                    <th>Giá sau khi giảm</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $key => $one)
                                @php
                                    $discount = $one->price * $one->discount / 100;
                                @endphp
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$one->name}}</td>
                                    <td>{{$one->name}}</td>
                                    <td>
                                        @foreach ($listCate as $cate)
                                        @if ($cate->id_category == $one->id_category)
                                            {{$cate->name}}
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>{{$one->quantity}}</td>
                                    <td>{{number_format($one->price,0,',','.')}}đ</td>
                                    <td>{{$one->discount}}%</td>
                                    <td>{{number_format(intval($one->price) - $discount,0,',','.')}}đ</td>
                                    <td align="center">
                                        <a href="{{route('product.formUpdate',['id' => $one->id_product])}}" class="btn btn-primary d-md-block d-lg-inline-block d-xl-inline-block mb-md-2 mb-lg-2 mb-xl-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger delete-product" data-id="{{$one->id_product}}" data-name="{{$one->name}}"><i class="fa-solid fa-trash-can"></i></a>
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
