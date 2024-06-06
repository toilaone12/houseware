@extends('home')
@section('content')
<div class="section font-lalezar">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    @php
                        $thumbnails = explode('|',trim($product->thumbnail_path,'|'));
                        $thumbnails = array_reverse($thumbnails);
                    @endphp
                    @foreach ($thumbnails as $thumbnail)
                    <div class="product-preview">
                        <img loading="lazy" src="{{asset('be/img/thumbnails/'.$thumbnail)}}" height="500" class="img-fluid object-fit-cover" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    @php
                        $thumbnails = explode('|',trim($product->thumbnail_path,'|'));
                        $thumbnails = array_reverse($thumbnails);
                    @endphp
                    @foreach ($thumbnails as $thumbnail)
                    <div class="product-preview">
                        <img loading="lazy" src="{{asset('be/img/thumbnails/'.$thumbnail)}}" height="153" class="img-fluid object-fit-cover" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name">{{$product->name}}</h2>
                    <div>
                        <div class="product-rating">
                            @for ($i = 0; $i < $avg; $i++)
                            <i class="fa fa-star"></i>
                            @endfor
                            @for ($i = $avg; $i < 5; $i++)
                            <i class="fa fa-star-o"></i>
                            @endfor
                        </div>
                        <a class="review-link">{{$countRating}} đánh giá</a>
                    </div>
                    <div>
                        @php
                            $priceAfter = intval($product->price) - (intval($product->price) * intval($product->discount) / 100);
                        @endphp
                        <h3 class="product-price">{{number_format($priceAfter,0,',','.')}} đ
                            @if ($product->discount)
                            <del class="product-old-price">{{number_format($product->price,0,",",".")}} đ</del>
                            @endif
                        </h3>
                        @if ($product->discount)
                        <span class="product-available">{{$product->discount}}%</span>
                        @endif
                    </div>
                    <div class="fw-bolder">{!!$product->description!!}</div>
                    <form class="add-cart-detail">
                        <input type="hidden" name="id" value="{{$product->id_product}}">
                        <div class="product-options">
                            <label>
                                Màu sắc
                                <select class="input-select choose-detail-color" name="color">
                                    @foreach ($arrColor as $color)
                                    <option value="{{$color['id']}}" data-quantity="{{$color['quantity']}}">{{$color['name']}}</option>
                                    @endforeach
                                </select>
                            </label>
                            <span class="quantity-product-color">(Còn {{$arrColor[0]['quantity']}} sản phẩm)</span>
                        </div>

                        <div class="add-to-cart">
                            <div class="qty-label">
                                Số lượng đặt
                                <div class="input-number ml-5">
                                    <input type="number" name="quantity" value="1" min="1" max="{{$arrColor[0]['quantity']}}" class="text-center qty-input">
                                    <span class="qty-detail-up qty-detail" data-type="up">+</span>
                                    <span class="qty-detail-down qty-detail" data-type="down">-</span>
                                </div>
                            </div>
                            <div class="d-flex mt-15">
                                <button type="submit" class="add-to-cart-btn mr-10"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                                <button class="add-to-cart-btn mt-xs-10 add-favourite" data-id="{{$product->id_product}}"><i class="fa fa-heart-o"></i>Yêu thích</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Thông số kỹ thuật</a></li>
                        <li><a data-toggle="tab" href="#tab3">Đánh giá ({{$countRating}})</a></li>
                    </ul>

                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    {!!$product->technical!!}
                                </div>
                            </div>
                        </div>
                        <div id="tab3" class="tab-pane fade in">
                            <div class="row">
                                <!-- Rating -->
                                <div class="col-md-3">
                                    <div id="rating">
                                        <div class="rating-avg">
                                            <span>{{$avg}}</span>
                                            <div class="rating-stars">
                                                @for ($i = 0; $i < $avg; $i++)
                                                <i class="fa fa-star"></i>
                                                @endfor
                                                @for ($i = $avg; $i < 5; $i++)
                                                <i class="fa fa-star-o"></i>
                                                @endfor
                                            </div>
                                        </div>
                                        <ul class="rating">
                                            @foreach($arrRating as $key => $rating)
                                            <li>
                                                <div class="rating-stars">
                                                    @for ($i = 0; $i < $key; $i++)
                                                    <i class="fa fa-star"></i>
                                                    @endfor
                                                    @for ($i = $key; $i < 5; $i++)
                                                    <i class="fa fa-star-o"></i>
                                                    @endfor
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: {{$countRating ? round($rating / $countRating * 100) : 0}}%;"></div>
                                                </div>
                                                <span class="sum"></span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div id="reviews">
                                        <ul class="reviews">
                                            @foreach ($reviews as $key => $review)
                                            <li class="review-items" data-id="{{$review->id_review}}">
                                                <div class="review-heading">
                                                    <h4 class="name">{{$review->fullname}}</h4>
                                                    <p class="date">{{date('d m Y g:i A',strtotime($review->updated_at))}}</p>
                                                    <div class="review-rating">
                                                        @for ($i = 0; $i < $review->rating; $i++)
                                                        <i class="fa fa-star"></i>
                                                        @endfor
                                                        @for ($i = $review->rating; $i < 5; $i++)
                                                        <i class="fa fa-star-o empty"></i>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>{{$review->review}}</p>
                                                </div>
                                            </li>
                                            @php
                                                if($key == 2) break;
                                            @endphp
                                            @endforeach
                                        </ul>
                                        <ul class="reviews-pagination cursor-pointer" data-page="1" data-max="{{ceil($countRating / 3)}}">
                                            @for ($i = 1; $i <= ceil($countRating / 3); $i++)
                                                <li class="pagination" data-page="{{$i}}">{{$i}}</li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <h3 class="text-center">Đánh giá</h3>
                                    @php
                                        use App\Models\Account;
                                        $cookie = Cookie::get('id_customer');
                                    @endphp
                                    @if(isset($cookie) && $cookie)
                                    @php
                                        $account = Account::find($cookie);
                                    @endphp
                                    <div id="review-form">
                                        <form class="review-form">
                                            <input type="hidden" name="id_account" value="{{$account->id_account}}">
                                            <input type="hidden" name="id_product" value="{{$product->id_product}}">
                                            <input class="input" required type="text" name="fullname" value="{{$account->fullname}}" placeholder="Họ tên">
                                            <div class="input-rating" data-rating="">
                                                <div class="stars">
                                                    <input id="star5" name="rating" class="choose-rating" value="5" type="radio"><label for="star5"></label>
                                                    <input id="star4" name="rating" class="choose-rating" value="4" type="radio"><label for="star4"></label>
                                                    <input id="star3" name="rating" class="choose-rating" value="3" type="radio"><label for="star3"></label>
                                                    <input id="star2" name="rating" class="choose-rating" value="2" type="radio"><label for="star2"></label>
                                                    <input id="star1" name="rating" class="choose-rating" value="1" type="radio"><label for="star1"></label>
                                                </div>
                                            </div>
                                            <textarea class="input" required name="review" placeholder="Đánh giá"></textarea>
                                            <button class="primary-btn">Gửi</button>
                                        </form>
                                    </div>
                                    @else
                                    <a href="{{route('home.login')}}" class="ml-20 primary-btn">Yêu cầu cần đăng nhập</a>
                                    @endif
                                </div>
                                <!-- /Review Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center font-lalezar">
                    <h2 class="title">Sản phẩm liên quan</h2>
                </div>
            </div>
            @foreach ($productRelated as $product)
            @php
                $priceAfter = intval($product['price']) - (intval($product['price']) * intval($product['discount']) / 100);
            @endphp
            <div class="col-md-3 col-xs-6">
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
                        <h3 class="product-name h-50px"><a href="{{route('product.detail',['product' => $product->id_product])}}">{{$product->name}}</a></h3>
                        <h4 class="product-price">{{number_format($priceAfter,0,',','.')}} đ
                            @if ($product->discount)
                            <del class="product-old-price">{{number_format($product->price,0,",",".")}} đ</del>
                            @endif
                        </h4>
                        <div class="product-btns">
                            <button class="add-to-wishlist add-favourite" data-id="{{$product->id_product}}"><i class="fa fa-heart-o"></i><span class="tooltipp">yêu thích</span></button>
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
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection
