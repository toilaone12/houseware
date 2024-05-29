<!-- Bootstrap core JavaScript-->
<script src="{{asset('be/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('be/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('be/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

{{-- Datatable --}}
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
{{-- Swal Alert 2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('be/sb-admin-2.min.js')}}"></script>
<script src="{{asset('be/main.js')}}"></script>
{{-- <!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script> --}}
<script>
    $(function(){
        //xoa danh muc
        $('.delete-category').click(function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            Swal.fire({
                title: 'Xóa danh mục!',
                text: 'Bạn có muốn xóa danh mục này không?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Có",
                cancelButtonText: "Không",
            }).then((res) => {
                if(res.isConfirmed){
                    $.ajax({
                        method: "GET",
                        url: "{{route('category.delete')}}",
                        data: {
                            id: id,
                        },
                        success: function(data){
                            if(data.res == 'success'){
                                Swal.fire({title: data.title,text: data.text,icon: data.icon,confirmButtonText: 'Tải lại trang'}).then((res) => {if(res.isConfirmed) location.reload()});
                            }
                        },
                        error: function(err){
                            console.log(err);
                        }
                    })
                }
            })
        })
    })
</script>
