@extends('dashboard')
@section('content')
    {{-- form sua --}}
    @if ($type == 'update')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Sửa màu cho {{$one->name}}</h1>
        </div>
        @php
            $mess = Session::get('message');
            if(isset($mess) && $mess){
                echo $mess;
            }
        @endphp
        <form action="{{route('product.updateColor')}}" method="post">
            @csrf
            <div class="card w-100 bg-card">
                <div class="d-flex flex-wrap align-items-center mx-2">
                    <input type="hidden" name="id" value="{{$one->id_product}}">
                    <div class="col-lg-12 mt-3">
                        <div class="row">
                            @foreach ($colorPath as $path)
                            @foreach ($listColor as $color)
                            @if ($path['id_color'] == $color->id_color)
                            @if ($path['id_color'] == $idColor)
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="quantity">Số lượng màu {{$color->name}}</label>
                                    <input type="hidden" name="id_color" value="{{$path['id_color']}}">
                                    <input type="number" name="quantity" value="{{$path['quantity']}}" placeholder="Số lượng" id="quantity" class="form-control"></div>
                            </div>
                            @endif
                            @endif
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mx-20 d-flex align-items-center mt-4 mb-3">
                    <button class="btn btn-outline-primary rounded mr-3">Xác nhận</button>
                    <a href="{{route('product.formColor',['id' => $one->id_product])}}" class="btn btn-outline-secondary rounded">Hủy bỏ</a>
                </div>
            </div>
        </form>
    </div>
    {{-- form them voi danh sach --}}
    @else
    @if (count($colorPath) != count($listColor))
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Thêm màu cho {{$one->name}}</h1>
        </div>
        @php
            $mess = Session::get('message');
            if(isset($mess) && $mess){
                echo $mess;
            }
        @endphp
        <form action="{{route('product.insertColor')}}" method="post">
            @csrf
            <div class="card w-100 bg-card">
                <div class="d-flex flex-wrap align-items-center mx-2">
                    <input type="hidden" name="id" value="{{$one->id_product}}">
                    <div class="col-lg-12 mt-3">
                        <div class="row">
                            @php
                                // tra ve mang moi voi value cua id_color
                                $colorPathIds = array_column($colorPath, 'id_color');
                            @endphp

                            @foreach ($listColor as $color)
                                @if(!in_array($color->id_color, $colorPathIds))
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="quantity">Số lượng màu {{$color->name}}</label>
                                            <input type="number" name="quantity[{{$color->id_color}}]" min="0" placeholder="Số lượng" id="quantity" class="form-control">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mx-20 d-flex align-items-center mt-4 mb-3">
                    <button class="btn btn-outline-primary rounded mr-3">Xác nhận</button>
                    <a href="{{route('product.list')}}" class="btn btn-outline-secondary rounded">Hủy bỏ</a>
                </div>
            </div>
        </form>
    </div>
    @endif
    <div class="d-flex flex-column container-fluid {{count($colorPath) != count($listColor) ? 'mt-5 pt-5' : ''}}">
        <!-- Main Content -->
        <div id="content">
            <div class="row">
                <div class="col-9">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách màu của sản phẩm {{$one->name}}</h3>
                            <p>Số lượng còn trong kho: {{$one->quantity}} sản phẩm</p>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="myTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Màu</th>
                                        <th>Số lượng</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($colorPath as $key => $path)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>
                                            @php
                                                $nameColor = '';
                                            @endphp
                                            @foreach ($listColor as $color)
                                            @if ($color->id_color == $path['id_color'])
                                            @php
                                                $nameColor = $color->name;
                                            @endphp
                                            {{$nameColor}}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>{{$path['quantity']}}</td>
                                        <td align="center">
                                            <a href="{{route('product.formColor',['id' => $one->id_product, 'type' => 'update', 'id_color' => $path['id_color']])}}" class="btn btn-primary d-md-block d-lg-inline-block d-xl-inline-block mb-md-2 mb-lg-0 mb-xl-0"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a class="btn btn-danger delete-product-color" data-id="{{$one->id_product}}" data-name="{{$nameColor}}" data-color="{{$path['id_color']}}"><i class="fa-solid fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-3">
                    <div class="card bg-light p-3">
                        <h5>Chức năng thêm</h5>
                        <a href="{{route('product.formInsert')}}" class="btn btn-primary my-3">Thêm sản phẩm</a>
                        <a href="{{route('product.formThumbnails',['id' => $one->id_product])}}" class="btn btn-info">Thêm ảnh sản phẩm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
