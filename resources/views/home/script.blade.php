<!-- Notyf JS -->
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="{{asset('be/function.js')}}"></script>
<script src="{{asset('fe/js/jquery.min.js')}}"></script>
<script src="{{asset('fe/js/bootstrap.min.js')}}"></script>
<script src="{{asset('fe/js/slick.min.js')}}"></script>
<script src="{{asset('fe/js/nouislider.min.js')}}"></script>
<script src="{{asset('fe/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('fe/js/main.js')}}"></script>
<script src="{{asset('fe/js/update.js')}}"></script>
<script>
    $(function(){
        const notyf = new Notyf({
            duration: 5000,
            ripple: true,
            position: {
                x: 'right',
                y: 'top',
            },
            dismissible: true,
        });
        @if(session('errorOrder'))
            notyf.error({message: '{{session("errorOrder")}}'})
        @elseif(session('successOrder'))
            notyf.success({message: '{{session("successOrder")}}'});
        @endif
        //mo modal
        let modalAllBox = $('#modal_all_box');;
		$('.btn-open-modal').click(function () {
			var href = $(this).attr('data-href');
			modalAllBox.load(href, '', function () {
				modalAllBox.modal().on("hidden.bs.modal", function () {
					$('#modal_all_box').children().remove();
				});
			});
			return false;
		});
        //chon danh muc trong danh sach danh muc
        $('.choose-category').on('change', function (e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            location.href="{{route('category.home')}}?id="+id;
        })
        //chon loc san pham trong danh muc
        $('.choose-filter').on('change', function (e){
            e.preventDefault();
            let filter = $(this).val();
            let id = $(this).attr('data-id');
            let min = "{{isset($_GET['min']) && $_GET['min'] ? intval($_GET['min']) : ''}}";
            let max = "{{isset($_GET['max']) && $_GET['max'] ? intval($_GET['max']) : ''}}";
            let url = "{{route('category.home')}}"+'?id='+id+'&'+filter+'=1';
            if(min) url += '&min='+min;
            if(max) url += '&max='+max;
            location.href = url;
        })
        //chon loc san pham trong tim kiem
        $('.choose-filter-search').on('change', function (e){
            e.preventDefault();
            let filter = $(this).val();
            let keyword = $(this).attr('data-keyword');
            let url = "{{route('home.search')}}"+'?keyword='+keyword+'&'+filter+'=1';
            location.href = url;
        })
        //them nhanh gio hang
        $(document).on('click', '.add-cart', function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            let url = "{{route('cart.add')}}";
            let color = $(this).attr('data-color');
            let idCustomer = $('.fullname-login').attr('data-id');
            if(color){
                if(idCustomer){
                    postAjax(url,{id: id, color: color},
                        function(data){
                            if(data.res == 'success'){
                                formCart(data)
                                notyf.success({message: data.text});
                            }else{
                                notyf.error({message: data.text});
                            }
                        },
                        function(err){
                            notyf.error({message: err});
                        }
                    )
                }else{
                    $('#modal_all_box').modal('hide');
                    location.href = "{{route('home.login')}}"
                }
            }else{
                notyf.error({message: 'Yêu cầu chọn màu sắc cho sản phẩm'});
            }
        })
        //them gio hang trong chi tiet
        $('.add-cart-detail').on('submit', function(e){
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            let url = "{{route('cart.add')}}";
            let idCustomer = $('.fullname-login').attr('data-id');
            if(idCustomer){
                postAjax(url, formData,
                    function(data){
                        if(data.res == 'success'){
                            formCart(data)
                            notyf.success({message: data.text});
                        }else{
                            notyf.error({message: data.text});
                        }
                    },
                    function(err){
                        notyf.error({message: err});
                    }
                ,'json',1)
            }else{
                location.href = "{{route('home.login')}}"
            }
        })
        //yeu thich san pham
        $('.add-favourite').on('click', function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            let idCustomer = $('.fullname-login').attr('data-id');
            let url = "{{route('favourite.add')}}";
            if(idCustomer){
                postAjax(url, {id: id, id_customer: idCustomer},
                    function(data){
                        if(data.res == 'success'){
                            if(!data.isUpdate) { // them lan dau
                                notyf.success({message: data.text});
                                $('.dropdown-favourite').append(`<div class="qty qty-whitelist">${data.count}</div>`)
                            }else{ //cap nhat them san pham yeu thich
                                notyf.success({message: data.text});
                                $('.qty-whitelist').text(data.count);
                            }
                        }else{
                            notyf.error({message: data.text});
                        }
                    },
                    function(err){
                        notyf.error({message: err});
                    }
                )
            }else{
                location.href = "{{route('home.login')}}"
            }
        })
        //xem chi tiet san pham
        $('.quick-view').on('click', function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            location.href = "{{route('product.detail')}}?product="+id;
        })
        //danh gia san pham
        $('.review-form').on('submit', function(e){
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            let url = "{{route('review.add')}}";
            let rating = $('.input-rating').attr('data-rating');
            if(rating){
                postAjax(url, formData,
                    function(data){
                        if(data.res == 'success'){
                            notyf.success({message: data.text});
                            $('.input-rating').attr('data-rating','');
                            $('.review-form').find('input[type="text"][name="fullname"]').val('');
                            $('.review-form').find('textarea[name="review"]').val('');
                        }else{
                            notyf.error({message: data.text});
                        }
                    },
                    function(err){
                        notyf.error({message: err});
                    }
                ,'json',1)
            }else{
                notyf.error({message: "Bạn chưa đánh giá số sao"});
            }
        })
        //them so luong sp trong gio hang
        $('.qty-click-cart').on('click', function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            let idCustomer = $('.fullname-login').attr('data-id');
            let cartItems = $(`.cart-items[data-id="${id}"]`);
            let type = $(this).attr('data-type');
            let qty = parseInt(cartItems.find('.qty-input-cart').val());
            let max = parseInt(cartItems.find('.qty-input-cart').attr('max'));
            let price = cartItems.find('.price-cart').text().replace(/\./g, '');
            let discount = parseInt($('.discount-cart').text().replace(/\./g, ''));
            let qtyUpdate = 0;
            let url = "{{route('cart.update')}}";
            if(type == 'up'){
                if(qty >= max){
                    qtyUpdate = max;
                    notyf.error({message: 'Đã quá số lượng sản phẩm trong kho'});
                    return false;
                }else{
                    qtyUpdate = qty + 1;
                }
            }else if(type == 'down'){
                if(qty <= 1){
                    qtyUpdate = 1;
                }else{
                    qtyUpdate = qty - 1;
                }
            }
            postAjax(url, {id: id, id_customer: idCustomer, quantity: qtyUpdate, type: type, price: price},
                function(data){
                    if(data.res == 'success'){
                        let totalUpdate = parseInt(price) * qtyUpdate;
                        cartItems.find('.qty-input-cart').val(qtyUpdate);
                        cartItems.find('.total-cart').text(formatCurrency2(totalUpdate));
                        $('.subtotal-cart').text(formatCurrency2(data.subtotal));
                        $('.total-all-cart').text(formatCurrency2(data.subtotal - discount));
                        notyf.success({message: data.text});
                    }else{
                        notyf.error({message: data.text});
                    }
                },
                function(err){
                    notyf.error({message: err});
                }
            )
        })
        //dien so luong san pham trong gio hang
        $('.qty-input-cart').on('change', function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            let idCustomer = $('.fullname-login').attr('data-id');
            let qty = $(this).val();
            let cartItems = $(`.cart-items[data-id="${id}"]`);
            let max = parseInt($(this).attr('max'));
            let price = cartItems.find('.price-cart').text().replace(/\./g, '');
            let discount = parseInt($('.discount-cart').text().replace(/\./g, ''));
            let qtyUpdate = 0;
            let url = "{{route('cart.update')}}";
            if(qty > max){
                qtyUpdate = max;
            }else if(qty < 1){
                qtyUpdate = 1;
            }else{
                qtyUpdate = qty;
            }
            postAjax(url, {id: id, id_customer: idCustomer, quantity: qty, price: price},
                function(data){
                    if(data.res == 'success'){
                        notyf.success({message: data.text});

                    }else{
                        notyf.error({message: data.text});
                    }
                    let totalUpdate = parseInt(price) * qtyUpdate;
                    cartItems.find('.total-cart').text(formatCurrency2(totalUpdate));
                    cartItems.find('.qty-input-cart').val(qtyUpdate);
                    $('.subtotal-cart').text(formatCurrency2(data.subtotal));
                    $('.total-all-cart').text(formatCurrency2(data.subtotal - discount));
                },
                function(err){
                    notyf.error({message: err});
                }
            )
        })
        //xoa don hang
        $('.product-remove').on('click', function(e){
            let id = $(this).attr('data-id');
            let url = "{{route('cart.remove')}}";
            postAjax(url, {id: id},
                function(data){
                    if(data.res == 'success'){
                        notyf.success({message: data.text});
                        $(`.cart-items[data-id="${id}"]`).remove();
                        if(!$(`.cart-items`).length) location.href = "{{route('home.dashboard')}}"
                    }else{
                        notyf.error({message: data.text});
                    }
                },
                function(err){
                    console.log(err);
                }
            )
        })
        //ap ma giam gia
        $('.use-discount').on('click', function(e){
            e.preventDefault();
            let code = $('.form-control-cart[name="discount"]').val();
            let idCustomer = $('.fullname-login').attr('data-id');
            let subtotal = parseInt($('.subtotal-cart').text().replace(/\./g, ''));
            let url = "{{route('coupon.apply')}}";
            getAjax(url,{id_account: idCustomer, code: code},
                function(data){
                    if(data.res == 'success'){
                        notyf.success({message: data.text});
                        let discount = data.type ? subtotal * data.fee / 100 : data.fee;
                        let totalAll = subtotal - discount;
                        $('.discount-cart').text('-'+formatCurrency2(discount)).attr('data-code',data.id);
                        $('.total-all-cart').text(formatCurrency2(totalAll));
                    }else{
                        notyf.error({message: data.text});
                    }
                    $('.form-control-cart[name="discount"]').val('');
                },
                function(err){
                    notyf.error({message: err});
                }
            );
        })
        //mua hang
        $('.checkout').on('click', function(e){
            e.preventDefault();
            let code = $('.discount-cart').attr('data-code');
            let discount = parseInt($('.discount-cart').text().replace(/\./g, ''));
            let idCustomer = $('.fullname-login').attr('data-id');
            let url = "{{route('order.apply')}}";
            postAjax(url,{code: code, discount: discount},
                function(data){
                    if(data.res == 'success') location.href = "{{route('order.checkout')}}";
                },
                function(err){
                    notyf.error({message: err});
                }
            )
        })
        //xac nhan dia chi dat hang
        $(document).on('click','.apply-address', function(e){
            e.preventDefault();
            let keyword = $('.find-address').val();
            let lat = $('.find-address').attr('lat');
            let lng = $('.find-address').attr('lng');
            let discount = parseInt($('.order-coupon').text().replace(/\./g, ''));
            let subtotal = parseInt($('.order-subtotal').text().replace(/\./g, ''));
            if(keyword && lat && lng){
                let url = "{{route('fee.apply')}}";
                postAjax(url,{lat: lat, lng: lng, keyword: keyword},
                    function(data){
                        if(data.res == 'success'){
                            $('.order-address').val(keyword.replace(', Việt Nam',''));
                            $('.order-feeship').text(formatCurrency2(data.fee));
                            $('.order-total').text(formatCurrency(data.fee + subtotal - discount));
                            notyf.success({message: data.text});
                            $('#modal_all_box').modal('hide');
                        }else{
                            notyf.error({message: data.text});
                        }
                    },
                    function(err){
                        notyf.error({message: err});
                    }
                )
            }else{
                notyf.error({message: 'Bạn chưa chọn địa chỉ đặt hàng vui lòng đặt lại'});
            }
        })
        //dat hang
        $('#order').on('submit', function(e){
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            let terms = $('.order-terms').is(':checked');
            let checkPayment = $('input[name="payment"]').is(':checked');
            let typePayment = parseInt($('.choose-payment:checked').attr('data-type'));
            let paymentOnline = $('.choose-payment[data-type="2"]').is(':checked');
            let chooseCard = $('.choose-card-payment').attr('data-type');
            let errors = {};
            let addressOrder = $('.order-address').val();
            if(!checkPayment){ //check chua chon phuong thuc giao hang
                notyf.error({message: 'Bạn chưa chọn phương thức giao hàng'});
                errors = {'payment': 1};
            }
            if(typePayment == 2 || typePayment == 3){ //chua co dia chi nhan hang
                if(!addressOrder){
                    notyf.error({message: 'Bạn chưa chọn địa chỉ nhận hàng'});
                    errors = {'address': 1};
                }
            }
            if(!terms) {  //chua co dieu khoan
                notyf.error({message: 'Bạn chưa đồng ý với điều khoản mua hàng'});
                errors = {'terms': 1};
            }
            if(paymentOnline){ //check vi dien tu
                if(!chooseCard){
                    notyf.error({message: 'Bạn chưa chọn ví điện tử'});
                    errors = {'card': 1};
                }
            }
            if ($.isEmptyObject(errors)){ //khi khong con loi
                let url = "{{route('order.order')}}";
                formData.append('choose-payment',typePayment);
                if(paymentOnline) formData.append('card',chooseCard);
                if(typePayment == 2 || typePayment == 3) formData.append('address',addressOrder);
                formData.append('feeship',$('.order-feeship').text());
                formData.append('feecoupon',$('.order-coupon').text());
                postAjax(url,formData,
                    function(data){
                        if(data.res == 'warning'){
                            notyf.error({message: data.text.phone});
                        }else if(data.res == 'success'){
                            location.href = data.url;
                        }else{
                            notyf.error({message: data.text});
                        }
                    },
                    function(err){
                        console.log(err);
                    }
                ,'json',1);
            }
        })
    })
</script>
{{-- xu ly script cua trang san pham --}}
@if(request()->is('home/product/detail'))
    <script>
        $(function(){
            //phan trang
            let pagination = parseInt($('.reviews-pagination').attr('data-page'));
            $('.pagination').each(function(){
                if($(this).attr('data-page') == pagination){
                    $(this).addClass('active');
                }
            })
            $(document).on('click','.pagination', function(){
                let html = '';
                let isThis = $(this);
                let page = $(this).attr('data-page');
                let id = "{{$_GET['product']}}";
                let url = "{{route('review.pagination')}}";
                let now = parseInt($('.reviews-pagination').attr('data-page'));
                if($(this).attr('data-page') != now){
                    getAjax(url, {page: page, id: id},
                        function(data){
                            if(data.res == 'success'){
                                data.reviews.forEach(function(review){
                                    html += `
                                    <li class="review-items">
                                        <div class="review-heading">
                                            <h4 class="name">${review.fullname}</h4>
                                            <p class="date">${review.date}</p>
                                            <div class="review-rating">`
                                    for ($i = 0; $i < review.rating; $i++){
                                        html += `<i class="fa fa-star"></i>`
                                    }
                                    for ($i = review.rating; $i < 5; $i++){
                                        html += `<i class="fa fa-star-o empty"></i>`
                                    }
                                    html += `</div>
                                        </div>
                                        <div class="review-body">
                                            <p>${review.review}</p>
                                        </div>
                                    </li>`;
                                })
                                $('.reviews-pagination').attr('data-page',page);
                                $('.pagination').removeClass('active');
                                isThis.addClass('active');
                                $('.reviews').html(html);
                            }
                        },
                        function(err){
                            notyf.error({message: err});
                        }
                    )
                }
            })
        })
    </script>
@endif

