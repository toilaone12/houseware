@extends('home')
@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{asset('fe/img/oven.jpeg')}}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3 class="font-lalezar">Bộ sưu tập <br>Lò nướng</h3>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{asset('fe/img/stove.jpeg')}}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3 class="font-lalezar">Bộ sưu tập <br>Bếp điện</h3>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{asset('fe/img/sink.jpeg')}}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3 class="font-lalezar">Bộ sưu tập <br>Bồn rửa</h3>
                    </div>
                </div>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title font-lalezar">Mới nhất</h2>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            @php
                                $dem = 0;
                            @endphp
                            @foreach ($listParentCate as $parent1)
                            @php
                                $dem++;
                            @endphp
                                <li class="{{$dem == 1 ? 'active' : ''}}"><a data-toggle="tab" href="#tab{{$dem}}">{{$parent1->name}}</a></li>
                            @php
                                if($dem == 5) break;
                            @endphp
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        @foreach($listsHot as $key => $hot)
                        <div id="tab{{$key+1}}" class="tab-pane {{!$key ? 'active' : ''}}">
                            <div class="products-slick" data-nav="#slick-nav-{{$key+1}}">
                                @foreach ($hot['products'] as $product)
                                    @php
                                        $priceAfter = intval($product['price']) - (intval($product['price']) * intval($product['discount']) / 100);
                                    @endphp
                                    <div class="product" data-id="{{$product['id']}}">
                                        <div class="product-img">
                                            <img src="{{asset($product['image'])}}" loading="lazy" width="263" height="263" class="img-fluid object-fit-cover" alt="">
                                            <div class="product-label">
                                                @if ($product['discount'])
                                                <span class="sale">-{{$product['discount']}}%</span>
                                                @endif
                                                <span class="new">Mới</span>
                                            </div>
                                        </div>
                                        <div class="product-body font-lalezar">
                                            <h3 class="product-name h-50px"><a href="{{route('product.detail',['product' => $product['id']])}}">{{$product['name']}}</a></h3>
                                            <h4 class="product-price">{{number_format($priceAfter,0,',','.')}} đ
                                                @if ($product['discount'])
                                                <del class="product-old-price">{{number_format($product["price"],0,",",".")}} đ</del>
                                                @endif
                                            </h4>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist add-favourite" data-id="{{$product['id']}}"><i class="fa fa-heart-o"></i><span class="tooltipp">yêu thích</span></button>
                                                <button class="quick-view" data-id="{{$product['id']}}"><i class="fa fa-eye"></i><span class="tooltipp">Xem chi tiết</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn btn-open-modal" data-href="{{route('modal.color',['id' => $product['id']])}}"
                                                data-bs-toggle="modal" data-bs-target="#modal_all_box"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div id="slick-nav-{{$key+1}}" class="products-slick-nav"></div>
                        </div>
                        @endforeach
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown">
                        <li>
                            <div>
                                <h3 class="hours">10</h3>
                                <span>Giờ</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3 class="mins">34</h3>
                                <span>Phút</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3 class="seconds">60</h3>
                                <span>Giây</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Top selling</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
                            <li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
                            <li><a data-toggle="tab" href="#tab2">Cameras</a></li>
                            <li><a data-toggle="tab" href="#tab2">Accessories</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            {{-- <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab2" class="tab-pane fade in active">
                            <div class="products-slick" data-nav="#slick-nav-2">
                                <!-- product -->
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{asset('fe/img/product06.png')}}" alt="">
                                        <div class="product-label">
                                            <span class="sale">-30%</span>
                                            <span class="new">NEW</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </div>
                                </div>
                                <!-- /product -->

                                <!-- product -->
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{asset('fe/img/product07.png')}}" alt="">
                                        <div class="product-label">
                                            <span class="new">NEW</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </div>
                                </div>
                                <!-- /product -->

                                <!-- product -->
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{asset('fe/img/product08.png')}}" alt="">
                                        <div class="product-label">
                                            <span class="sale">-30%</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                        <div class="product-rating">
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </div>
                                </div>
                                <!-- /product -->

                                <!-- product -->
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{asset('fe/img/product09.png')}}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </div>
                                </div>
                                <!-- /product -->

                                <!-- product -->
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{asset('fe/img/product01.png')}}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </div>
                                </div>
                                <!-- /product -->
                            </div>
                            <div id="slick-nav-2" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div> --}}
            <!-- /Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            @foreach ($listsCategory as $key => $category)
            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">{{$category['name']}}</h4>
                    <div class="section-nav">
                        <div id="slick-nav-1{{$key}}" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-1{{$key}}">
                    @for($i = 0; $i <= 1 ; $i++)
                    <div>
                        @foreach ($category['products'] as $key => $product)
                        @php
                            unset($category['products'][$key]);
                            $priceAfter = intval($product['price']) - (intval($product['price']) * intval($product['discount']) / 100);
                        @endphp
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="{{asset($product['image'])}}" alt="">
                            </div>
                            <div class="product-body font-larezal">
                                <h3 class="product-name h-50"><a href="{{route('product.detail',['product' => $product['id']])}}">{{$product['name']}}</a></h3>
                                <h4 class="product-price">{{number_format($priceAfter,0,',','.')}} đ
                                    @if ($product['discount'])
                                    <del class="product-old-price">{{number_format($product["price"],0,",",".")}} đ</del>
                                    @endif
                                </h4>
                            </div>
                        </div>
                        @php
                            if($key == 2) break;
                        @endphp
                        @endforeach
                    </div>
                    @endfor
                </div>
            </div>
            @endforeach

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection