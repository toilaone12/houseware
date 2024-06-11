$(function(){
    $('#myTable').DataTable({
        "responsive": true,
        "pageLength": 5,
        "language": {
            "sProcessing":   "Đang xử lý...",
            "sLengthMenu":   "Xem _MENU_ mục",
            "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
            "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
            "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
            "sInfoFiltered": "(được lọc từ _MAX_ mục)",
            "sInfoPostFix":  "",
            "sSearch":       "Tìm:",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "Đầu",
                "sPrevious": "Trước",
                "sNext":     "Tiếp",
                "sLast":     "Cuối"
            }
        }
    });
    //hien va an password
    $('.show-password').on('click',function(e){
        e.preventDefault();
        let type = $('#password').attr('type')
        if(type == 'password'){
            $('#password').attr('type','text')
            $(this).html('<i class="fa-solid fa-eye-slash"></i>');
        }else{
            $('#password').attr('type','password')
            $(this).html('<i class="fa-solid fa-eye"></i>');
        }
    })
    //hien thi khoang cach phi van chuyen
    $('.range-radius').on('input',function(e){
        let value = $(this).val();
        $('.radius-fee').text(value);
    })
    //chon hinh anh
    let selectedFile;
    $('.choose-image').on('change', function(e){
        selectedFile = $(this)[0].files[0];
    })
    //day hinh anh
    $('.push-image').on('click', function(e){
        e.preventDefault();
        if (selectedFile) {
            // Only display a preview if the file is an image
            if (selectedFile.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('.file-intro').text(`(${selectedFile.name})`);
                    $('.image-intro').attr('src',`${e.target.result}`).removeClass('d-none');
                };
                reader.readAsDataURL(selectedFile);
            } else {
                swalNoti('Thông báo đẩy ảnh','Đấy không phải ảnh','warning','Đồng ý',function(alert){});
            }
        } else {
            swalNoti('Thông báo đẩy ảnh','Hiện k có ảnh để đẩy','warning','Đồng ý',function(alert){});
        }
    })
    //chon nhieu hinh anh
    let selectedMoreFiles = [];
    $('.choose-more-image').on('change', function(e){
        selectedMoreFiles = $(this)[0].files;
    });
    //day nhieu hinh anh
    $('.push-more-image').on('click', function(e){
        e.preventDefault();
        if (selectedMoreFiles.length > 0) {
            $('.image-container').empty(); // Clear existing images
            Array.from(selectedMoreFiles).forEach(file => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = $('<img>').attr('src', e.target.result).attr('height',150).attr('width',200).addClass('mb-2 mr-2 object-fit-cover');
                        $('.image-container').append(img);
                    };
                    reader.readAsDataURL(file);
                } else {
                    swalNoti('Thông báo đẩy ảnh', 'Đấy không phải ảnh', 'warning', 'Đồng ý', function(alert){});
                }
            });
        } else {
            swalNoti('Thông báo đẩy ảnh', 'Hiện k có ảnh để đẩy', 'warning', 'Đồng ý', function(alert){});
        }
    })
    // chon loai gia
    $('.choose-type').on('change', function(e){
        e.preventDefault();
        let type = $(this).val();
        priceAutoNumeric.clear();
        $('.price-coupon').val('');
        if (type === '1') {
            priceAutoNumeric.update({ maximumValue: '100' });
        } else {
            priceAutoNumeric.update({ maximumValue: '999999999999' });
        }
    });
    // dieu chinh gioi han phan tram
    $('.limit-discount').on('change',function(e){
        let val = $(this).val();
        if(val > 100){
            $(this).val(100);
        }
    })
    //goi dien cho khach hang
    $('.call-customer').on('click', function(){
        let phone = $('.phone-customer').text();
        location.href = 'tel:'+phone;
    })
    //in hoa don
    $('.print-invoice').on('click',function(){
        $('.form-invoice').print();
    })
})
