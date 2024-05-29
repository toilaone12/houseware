@extends('dashboard')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Sửa danh mục</h1>
        </div>
        @php
            $mess = Session::get('message');
            if(isset($mess) && $mess){
                echo $mess;
            }
        @endphp
        <form action="{{route('category.edit')}}" method="post">
            @csrf
            <div class="card w-100 bg-card">
                <div class="d-flex align-items-center mx-2">
                    <input type="hidden" name="id" value="{{$one->id_category}}">
                    <div class="col-5 mt-3">
                        <div class="form-group">
                            <label for="name">Tên danh mục (<span class="text-danger">*</span>)</label>
                            <input type="text" required name="name" value="{{$one->name}}" id="" class="form-control border-0">
                        </div>
                    </div>
                    <div class="col-5 mt-3">
                        <div class="form-group">
                            <label for="name">Thuộc danh mục</label>
                            <select name="id_parent" required id="" class="form-control">
                                <option {{$one->id_parent == 0 ? 'selected' : '' }} value="0">Danh mục gốc</option>
                                @if (!empty($listParent))
                                @foreach ($listParent as $parent)
                                <option value="{{$parent->id_category}}" {{$one->id_parent == $parent->id_category ? 'selected' : '' }}>{{$parent->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mx-20 d-flex align-items-center mt-2 mb-3">
                    <button class="btn btn-outline-primary rounded mr-3">Xác nhận</button>
                    <a href="{{route('category.list')}}" class="btn btn-outline-secondary rounded">Hủy bỏ</a>
                </div>
            </div>
        </form>

    </div>
@endsection
