@extends('dashboard')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Thêm sản phẩm</h1>
        </div>
        @php
            $mess = Session::get('message');
            if(isset($mess) && $mess){
                echo $mess;
            }
        @endphp
        <div class="row">
            <div class="{{ isset($_GET['id']) && $_GET['id'] ? 'col-9' : 'col-12'}}">
                <form action="{{route('product.add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card w-100 bg-card">
                        <div class="d-flex flex-wrap align-items-center mx-2">
                            <div class="{{ isset($_GET['id']) && $_GET['id'] ? 'col-lg-7' : 'col-lg-5'}} mt-3">
                                <div class="h-225px">
                                    <label for="image">Hình ảnh (<span class="text-danger">*</span>) <span class="file-intro text-info"></span></label>
                                    <div class="input-group">
                                        <input type="file" class="form-control choose-image" required id="inputGroupFile04" accept="image/*" aria-describedby="inputGroupFileAddon04" name="image" aria-label="Upload">
                                        <button class="btn btn-outline-secondary push-image" type="button" id="image">Tải lên</button>
                                    </div>
                                    @error('image')
                                    <span class="text-danger small mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-7 mt-3">
                                <img src="" height="225" class="mw-100 image-intro d-none" alt="">
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-5 mt-3">
                                        <div class="h-100px">
                                            <label for="name">Tên sản phẩm (<span class="text-danger">*</span>)</label>
                                            <input type="text" required name="name" id="name" class="form-control border-0">
                                            @error('name')
                                            <span class="text-danger small mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3 mt-3">
                                        <div class="h-100px">
                                            <label for="id_category">Thuộc danh mục</label>
                                            <select name="id_category" required id="id_category" class="form-control">
                                                @foreach ($listCateParent as $parent)
                                                <option value="{{$parent->id_category}}">{{$parent->name}}</option>
                                                @foreach ($listCateChild as $child)
                                                @if ($child->id_parent == $parent->id_category)
                                                <option value="{{$child->id_category}}">|-----{{$child->name}}</option>
                                                @endif
                                                @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 mt-3">
                                <div class="h-100px">
                                    <label for="quantity">Số lượng (<span class="text-danger">*</span>)</label>
                                    <input type="number" required min="0" name="quantity" id="quantity" class="form-control border-0">
                                    @error('quantity')
                                    <span class="text-danger small mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="{{ isset($_GET['id']) && $_GET['id'] ? 'col-lg-5' : 'col-lg-3'}} mt-3">
                                <div class="h-100px">
                                    <label for="price">Giá gốc (<span class="text-danger">*</span>)</label>
                                    <input type="text" required name="price" min="0" id="price" class="form-control border-0 price-autonumberic">
                                    @error('price')
                                    <span class="text-danger small mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 mt-3">
                                <div class="h-100px">
                                    <label for="discount">Giảm giá (<span class="text-danger">*</span>)</label>
                                    <input type="number" required name="discount" min="0" max="100" id="discount" class="form-control border-0 limit-discount">
                                    @error('discount')
                                    <span class="text-danger small mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div>
                                    <label for="ckeditor">Mô tả (<span class="text-danger">*</span>)</label>
                                    <textarea class="form-control" id="ckeditor" name="description" rows="3" placeholder="Nhập mô tả">
                                    </textarea>
                                    @error('description')
                                    <span class="text-danger small mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div>
                                    <label for="ckeditor1">Thông số kỹ thuật (<span class="text-danger">*</span>)</label>
                                    <textarea class="form-control" id="ckeditor1" name="technical" rows="3" placeholder="Nhập thông số">
                                    </textarea>
                                    @error('description')
                                    <span class="text-danger small mt-1">{{$message}}</span>
                                    @enderror
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
            @if (isset($_GET['id']) && $_GET['id'])
            <div class="col-3">
                <div class="card bg-light p-3">
                    <h5>Chức năng thêm</h5>
                    <a href="{{route('product.formColor',['id' => $_GET['id']])}}" class="btn btn-primary my-3">Thêm màu sản phẩm</a>
                    <a href="{{route('product.formThumbnails',['id' => $_GET['id']])}}" class="btn btn-success">Thêm ảnh sản phẩm</a>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
