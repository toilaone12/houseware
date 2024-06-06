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
})
