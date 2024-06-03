@extends('dashboard')
@section('content')
    {{-- form them voi danh sach --}}
    <div class="container-fluid">
        <!-- Page Heading -->
        @if ($count < 5)
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Thêm ảnh cho {{$one->name}}</h1>
        </div>
        @php
            $mess = Session::get('message');
            if(isset($mess) && $mess){
                echo $mess;
            }
        @endphp
        <form action="{{route('product.insertThumbnails')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card w-100 bg-card">
                <div class="d-flex flex-wrap align-items-center mx-2">
                    <input type="hidden" name="id" value="{{$one->id_product}}">
                    <div class="col-lg-12 mt-3">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="h-225px">
                                    <label for="image">Hình ảnh (<span class="text-danger">*</span>) <span class="file-intro text-info"></span></label>
                                    <div class="input-group">
                                        <input type="file" class="form-control choose-more-image" multiple id="inputGroupFile04" accept="image/*" aria-describedby="inputGroupFileAddon04" name="image[]" aria-label="Upload">
                                        <button class="btn btn-outline-secondary push-more-image" type="button" id="image">Tải lên</button>
                                    </div>
                                    @error('image')
                                    <span class="text-danger small mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-7 mt-3 image-container">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-20 d-flex align-items-center mt-4 mb-3">
                    <button class="btn btn-outline-primary rounded mr-3">Xác nhận</button>
                    <a href="{{route('product.list')}}" class="btn btn-outline-secondary rounded">Hủy bỏ</a>
                </div>
            </div>
        </form>
        @endif
    </div>
    <div class="d-flex flex-column container-fluid {{$count < 5 ? 'mt-5 pt-5' : ''}}">
        <!-- Main Content -->
        <div id="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách ảnh của sản phẩm {{$one->name}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="myTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Hình ảnh</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($thumbnails))
                                    @foreach($thumbnails as $key => $thumbnail)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>
                                            <img src="{{ asset('be/img/thumbnails/'.$thumbnail) }}" class="object-fit-cover choose-update-thumbnails cursor-pointer" alt="" width="150" height="100">
                                            <input type="file" class="mt-3 d-none update-thumbnails" data-id="{{$one->id_product}}" data-thumbnails="{{$thumbnail}}">
                                        </td>
                                        <td align="center">
                                            <a class="btn btn-danger delete-thumbnails" data-id="{{$one->id_product}}" data-thumbnails="{{$thumbnail}}"><i class="fa-solid fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
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
