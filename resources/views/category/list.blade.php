@extends('dashboard')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content" class="mx-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách danh mục</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên danh mục</th>
                                    <th>Thuộc danh mục</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $key => $one)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$one->name}}</td>
                                    @php
                                        $foundParent = false;
                                    @endphp
                                    @foreach($listParent as $key => $parent)
                                        @if($parent->id_category == $one->id_parent)
                                            <td>{{$parent->name}}</td>
                                            @php
                                                $foundParent = true;
                                                break;
                                            @endphp
                                        @endif
                                    @endforeach
                                    @if(!($foundParent))
                                        <td>Không có</td>
                                    @endif
                                    <td align="center">
                                        <a href="{{route('category.formUpdate',['id' => $one->id_category])}}" class="btn btn-primary d-md-block d-lg-inline-block d-xl-inline-block mb-md-2 mb-lg-0 mb-xl-0"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger delete-category" data-id="{{$one->id_category}}" data-name="{{$one->name}}"><i class="fa-solid fa-trash-can"></i></a>
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
