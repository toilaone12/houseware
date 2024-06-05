<!-- Notyf JS -->
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="{{asset('be/function.js')}}"></script>
<script src="{{asset('fe/js/jquery.min.js')}}"></script>
<script src="{{asset('fe/js/bootstrap.min.js')}}"></script>
<script src="{{asset('fe/js/slick.min.js')}}"></script>
<script src="{{asset('fe/js/nouislider.min.js')}}"></script>
<script src="{{asset('fe/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('fe/js/main.js')}}"></script>
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
        //chon mau
        $(document).on('change','.choose-color', function(e){
            e.preventDefault();
            let color = $(this).val();
            $('.add-cart').attr('data-color',color);
        })
        //them vao gio hang
        $(document).on('click', '.add-cart', function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            let url = "{{route('cart.add')}}";
            let color = $(this).attr('data-color');
            if(color){
                postAjax(url,{id: id, color: color},
                    function(data){
                        if(data.res == 'success'){
                            let html = ``;
                            let total = 0;
                            data.carts.forEach(function(cart){
                                let subtotal = cart.price * cart.quantity;
                                total += subtotal;
                                html +=
                                `<div class="product-widget">
                                    <div class="product-img">
                                        <img src="http://127.0.0.1:8000/${cart.image}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name"><a href="#">${cart.name}</a></h3>
                                        <h4 class="product-price"><span class="qty">${cart.quantity}x</span><span class="qty fw-bolder">${cart.color}</span>${formatCurrency(subtotal)}</h4>
                                    </div>
                                    <button class="delete delete-cart" data-id="${cart.id_cart}"><i class="fa fa-close"></i></button>
                                </div>`;
                            })
                            notyf.success({message: data.text});
                            $('.cart-list').html(html);
                            $('#modal_all_box').modal('hide');
                            if(data.count == 1){
                                if(!data.isUpdate) {
                                    $('.dropdown-cart').append(`<div class="qty qty-cart">${data.count}</div>`)
                                    $('.cart-dropdown').append(`<div class="cart-summary">
                                        <small class="count-cart">Đã có ${data.count} sản phẩm</small>
                                        <h5 class="total-cart">Tổng tiền: ${formatCurrency(total)}</h5>
                                    </div>
                                    <div class="cart-btns font-lalezar">
                                        <a href="#">Xem giỏ hàng</a>
                                        <a href="#">Mua hàng <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>`)
                                }else{
                                    $('.qty-cart').text(data.count);
                                    $('.count-cart').text(`Đã có ${data.count} sản phẩm`)
                                    $('.total-cart').text(`Tổng tiền: ${formatCurrency(total)}`)
                                }
                            }else{
                                $('.qty-cart').text(data.count);
                                $('.count-cart').text(`Đã có ${data.count} sản phẩm`)
                                $('.total-cart').text(`Tổng tiền: ${formatCurrency(total)}`)
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
                notyf.error({message: 'Yêu cầu chọn màu sắc cho sản phẩm'});
            }
        })
        //xem chi tiet san pham
        $('.quick-view').on('click', function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            location.href = "{{route('product.detail')}}?product="+id;
        })
    })
</script>
