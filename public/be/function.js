function getAjax(url, data, success, error, dataType = 'json') {
    $.ajax({
        method: "GET",
        url: url,
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: dataType,
        success: success,
        error: error
    });
}

function postAjax(url, data, success, error, dataType = 'json', isFormData = 0) {
    $.ajax({
        method: "POST",
        url: url,
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: isFormData ? false : true,
        contentType: isFormData ? false : 'application/x-www-form-urlencoded',
        dataType: dataType,
        success: success,
        error: error
    });
}

function swalInfo(title,text,callback){
    Swal.fire({
        title: title,
        text: text,
        icon: 'info',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Có",
        cancelButtonText: "Không",
    }).then((res) => {
        if(res.isConfirmed){
            callback(true);
        }
    });
}

function swalNoti(title,text,icon,textConfirm,callback){
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        showCloseButton: true,
        confirmButtonText: textConfirm,
    }).then((res) => {
        if(res.isConfirmed){
            callback(true);
        }
    });
}

function formatCurrency(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + " đ";
}

function formatCurrency2(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function formCart(data){
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
                <h3 class="product-name"><a href="http://127.0.0.1:8000/home/product/detail?product=${cart.id_product}">${cart.name}</a></h3>
                <h4 class="product-price"><span class="qty">${cart.quantity}x</span><span class="qty fw-bolder">${cart.color}</span>${formatCurrency(subtotal)}</h4>
            </div>
            <button class="delete delete-cart" data-id="${cart.id_cart}"><i class="fa fa-close"></i></button>
        </div>`;
    })
    $('.cart-list').html(html);
    $('#modal_all_box').modal('hide');
    if(data.count == 1){
        if(!data.isUpdate) { // them lan dau
            $('.dropdown-cart').append(`<div class="qty qty-cart">${data.count}</div>`)
            $('.cart-dropdown').append(`<div class="cart-summary">
                <small class="count-cart">Đã có ${data.count} sản phẩm</small>
                <h4 class="total-cart">Tổng tiền: ${formatCurrency(total)}</h4>
            </div>
            <div class="cart-btns font-lalezar">
                <a href="#">Xem giỏ hàng</a>
            </div>`)
        }else{ //cap nhat so luong
            $('.qty-cart').text(data.count);
            $('.count-cart').text(`Đã có ${data.count} sản phẩm`)
            $('.total-cart').text(`Tổng tiền: ${formatCurrency(total)}`)
        }
    }else{ //cap nhat so luong
        $('.qty-cart').text(data.count);
        $('.count-cart').text(`Đã có ${data.count} sản phẩm`)
        $('.total-cart').text(`Tổng tiền: ${formatCurrency(total)}`)
    }
}


