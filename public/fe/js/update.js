$(function(){
    //chon mau
    $(document).on('change','.choose-color', function(e){
        e.preventDefault();
        let color = $(this).val();
        $('.add-cart').attr('data-color',color);
    })
    //xem so luong san pham theo mau
    $('.choose-detail-color').on('change', function(e){
        e.preventDefault();
        let quantity = $(this).find('option:selected').attr('data-quantity');
        $('.quantity-product-color').text(`(Còn ${quantity} sản phẩm)`)
        $('.qty-input').attr('max',quantity);
    })
    //cong tru so luong
    $('.qty-detail').on('click', function(e){
        e.preventDefault();
        let type = $(this).attr('data-type');
        let qty = parseInt($('.qty-input').val());
        let max = parseInt($('.qty-input').attr('max'));
        if(type == 'up'){
            if(qty >= max){
                $('.qty-input').val(max);
            }else{
                $('.qty-input').val(qty + 1);
            }
        }else if(type == 'down'){
            if(qty <= 1){
                $('.qty-input').val(1);
            }else{
                $('.qty-input').val(qty - 1);
            }
        }
    })
    //dien so luong san pham
    $('.qty-input').on('change', function(e){
        e.preventDefault();
        let qty = $(this).val();
        let max = parseInt($(this).attr('max'));
        if(qty > max){
            $('.qty-input').val(max);
        }else if(qty < 1){
            $('.qty-input').val(1);
        }
    })
    //chon so sao
    $('.choose-rating').on('change', function(){
        let star = $(this).val();
        $('.input-rating').attr('data-rating',star);
    })
    //tim kiem vi tri
    $(document).on('change','.find-address', function(){
        let keyword = $(this).val();
        if (keyword.length > 0) {
            $('.icon-address[data-type="search"]').addClass('d-none');
            $('.icon-address[data-type="loading"]').removeClass('d-none');
            setTimeout(function(){
                let apiKey = 'M--tqWacqVfZvRoIjEeEN9Pn_nPJV6IHlRPHaQBUN3M';
                let url = `https://discover.search.hereapi.com/v1/discover`;
                let data = {
                    q: keyword,
                    at: '20.994081780314524,105.79288106771862',
                    apiKey: apiKey,
                    xnlp: 'CL_JSMv3.1.38.0'
                };
                $.ajax({
                    url: url,
                    data: data,
                    type: 'GET',
                    success: function(data) {
                        if(data.items){
                            formListSearchAddress(data.items);
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
                $('.icon-address[data-type="loading"]').addClass('d-none');
                $('.icon-address[data-type="delete"]').removeClass('d-none');
            },2000);
        } else {
            $('.list-search-address').addClass('d-none');
        }
    })
    //xoa dia chi da chon
    $(document).on('click','.icon-address[data-type="delete"]', function(e){
        e.preventDefault();
        $('.find-address').val('');
        $(this).addClass('d-none');
        $('.list-search-address').addClass('d-none');
        if($('.find-address').attr('lat')) $('.find-address').attr('lat','');
        if($('.find-address').attr('lng')) $('.find-address').attr('lng','');
        $('.icon-address[data-type="search"]').removeClass('d-none');
    })
    //chon dia chi
    $(document).on('click','.address-items', function(e){
        e.preventDefault();
        let keyword = $(this).find('span').text();
        let lat = $(this).attr('data-lat');
        let lng = $(this).attr('data-lng');
        $('.find-address').attr('lat',lat).attr('lng',lng).val(keyword);
        $('.list-search-address').addClass('d-none');
    })
    //chon phuong thuc thanh toan de hien thi dia chi van chuyen
    $('.choose-payment').on('change',function(e){
        e.preventDefault();
        $(this).prop('checked');
        let type = $(this).attr('data-type');
        $('.shiping-details').addClass('d-none');
        if(type == 2 || type == 3){
            $('.shiping-details').removeClass('d-none');
        }
        if(type == 1 || type == 3){
            $('.card-payment').removeClass('border-choose-card');
            $('.choose-card-payment').attr('data-type','');
        }
        if(type == 1){
            $('.order-address').val('');
        }
    })
    //chon the thanh toan truc tuyen
    $('.card-payment').on('click', function(e){
        e.preventDefault();
        let type = $(this).attr('data-type');
        $('.card-payment').removeClass('border-choose-card');
        $(this).addClass('border-choose-card');
        $('.choose-card-payment').attr('data-type',type);
    })
    //luu ma khuyen mai
    $('.copy-coupon').on('click', function(){
        let code = $(this).parents('.coupon').find('.code-coupon').text(); // siblings: chon phan tu ngang hang voi phan tu chon ban dau
        var blob = new Blob([code], { type: "text/plain" });

        // Tạo một thực thể ClipboardItem từ blob
        var clipboardItem = new ClipboardItem({ "text/plain": blob });

        // Sao chép clipboardItem vào clipboard
        navigator.clipboard.write([clipboardItem])
            .then(function() {
                alert("Đã sao chép vào clipboard");
            })
            .catch(function(error) {
                console.error("Lỗi khi sao chép vào clipboard: " + error);
            });
    })
})
