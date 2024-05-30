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


