@extends('home')
@section('content')
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="{{route('home.dashboard')}}">Trang chủ</a></li>
                    <li class="active">{{$one->name}} ({{count($countProduct)}} kết quả)</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

<div class="section">
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Các danh mục khác</h3>
                    <div class="checkbox-filter">
                        @foreach ($arrChild as $key => $child)
                        <div class="input-checkbox">
                            <input type="checkbox" class="choose-category" data-id="{{$child['id']}}" id="category-{{$child['id']}}">
                            <label for="category-{{$child['id']}}">
                                <span></span>
                                {{$child['name']}}
                                <small>({{$child['count']}})</small>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <form action="" method="get">
                        <input type="hidden" name="id" value="{{$one->id_category}}">
                        <h3 class="aside-title">Giá</h3>
                        <div class="price-filter mb-3">
                            <div id="price-slider"></div>
                            <div class="input-number price-min">
                                <input id="price-min" type="number" name="min">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                            <span>-</span>
                            <div class="input-number price-max">
                                <input id="price-max" type="number" name="max">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-filter-price w-100 text-white pt-3">Áp dụng</button>
                    </form>
                </div>
                <!-- /aside Widget -->

            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <label>
                            Sắp xếp theo:
                            <select class="input-select choose-filter" data-id="{{$one->id_category}}">
                                <option {{isset($_GET['asc']) && $_GET['asc'] ? 'selected' : ""}} value="asc">Giá tăng dần</option>
                                <option {{isset($_GET['desc']) && $_GET['desc'] ? 'selected' : ""}} value="desc">Giá giảm dần</option>
                            </select>
                        </label>
                    </div>
                </div>
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    @foreach ($listProduct as $product)
                    @php
                        $priceAfter = intval($product['price']) - (intval($product['price']) * intval($product['discount']) / 100);
                    @endphp
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="{{asset($product->image)}}" width="262" height="262" class="object-fit-cover" alt="">
                                <div class="product-label">
                                    @if ($product->discount)
                                    <span class="sale">-{{$product->discount}}%</span>
                                    @endif
                                    <span class="new">Mới</span>
                                </div>
                            </div>
                            <div class="product-body font-lalezar">
                                <h3 class="product-name h-50px"><a href="#">{{$product->name}}</a></h3>
                                <h4 class="product-price">{{number_format($priceAfter,0,',','.')}} đ
                                    @if ($product->discount)
                                    <del class="product-old-price">{{number_format($product->price,0,",",".")}} đ</del>
                                    @endif
                                </h4>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">yêu thích</span></button>
                                    <button class="quick-view" data-id="{{$product->id_product}}"><i class="fa fa-eye"></i><span class="tooltipp">Xem chi tiết</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn btn-open-modal" data-href="{{route('modal.color',['id' => $product->id_product])}}"
                                    data-bs-toggle="modal" data-bs-target="#modal_all_box"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                {!!$listProduct->links('pagination.paginate',['id' => $one->id_category])!!}
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection
