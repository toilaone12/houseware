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
})
