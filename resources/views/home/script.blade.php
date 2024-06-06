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
                            console.log(err);
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
                        console.log(err);
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
                        console.log(err);
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
                        console.log(err);
                    }
                ,'json',1)
            }else{
                notyf.error({message: "Bạn chưa đánh giá số sao"});
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
                            console.log(err);
                        }
                    )
                }
            })
        })
    </script>
@endif
