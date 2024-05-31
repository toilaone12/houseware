<!-- Bootstrap core JavaScript-->
<script src="{{asset('be/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('be/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('be/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

{{-- Swal Alert 2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('be/sb-admin-2.min.js')}}"></script>
<script src="{{asset('be/function.js')}}"></script>
<script src="{{asset('be/main.js')}}"></script>
{{-- Datatable --}}
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<!-- AutoNumeric -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.1.0/autoNumeric.min.js"></script>
<!-- Page level plugins -->
<!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

<!-- Page level custom scripts -->
<!-- <script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script> -->
@if(request()->is('admin/fee/update') || request()->is('admin/fee/insert'))
    <script>
        $(function(){
            //dinh dang so
            new AutoNumeric('.price-autonumberic', {
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalPlaces: 0, // Điều chỉnh số lượng chữ số thập phân theo nhu cầu
                minimumValue: '0',
            });
        })
    </script>
@endif
<script>
    $(function(){
        //xoa danh muc
        $('#myTable').on('click','.delete-category',function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            let name = $(this).attr('data-name');
            let url = "{{route('category.delete')}}";
            let data = {id: id};
            swalInfo('Xóa danh mục!', `Bạn có muốn xóa danh mục ${name.toLocaleLowerCase()} này không?`, function(alert){
                if(alert){
                    getAjax(url, data,
                        function(data){
                            swalNoti(data.title,data.text,data.icon,'Tải lại trang',function(noti){ if(noti) location.reload()})
                        },
                        function(err){

                        }
                    )
                }
            })
        })
        //xoa mau sac
        $('#myTable').on('click','.delete-color',function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            let name = $(this).attr('data-name');
            let url = "{{route('color.delete')}}";
            let data = {id: id};
            swalInfo('Xóa màu!', `Bạn có muốn xóa màu ${name.toLocaleLowerCase()} này không?`, function(alert){
                if(alert){
                    getAjax(url, data,
                        function(data){
                            swalNoti(data.title,data.text,data.icon,'Tải lại trang',function(noti){ if(noti) location.reload()})
                        },
                        function(err){

                        }
                    )
                }
            })
        })
        //xoa chuc vu
        $('#myTable').on('click','.delete-role',function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            let name = $(this).attr('data-name');
            let url = "{{route('role.delete')}}";
            let data = {id: id};
            swalInfo('Xóa chức vụ!', `Bạn có muốn xóa chức vụ ${name.toLocaleLowerCase()} này không?`, function(alert){
                if(alert){
                    getAjax(url, data,
                        function(data){
                            swalNoti(data.title,data.text,data.icon,'Tải lại trang',function(noti){ if(noti) location.reload()})
                        },
                        function(err){

                        }
                    )
                }
            })
        })
        //cap mat khau
        $('#myTable').on('click','.assign-password',function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            let name = $(this).attr('data-name');
            let url = "{{route('account.assign')}}";
            let data = {id: id};
            swalInfo('Xóa chức vụ!', `Bạn có muốn cấp mật khẩu cho tài khoản ${name.toLocaleLowerCase()} này không?`, function(alert){
                if(alert){
                    getAjax(url, data,
                        function(data){
                            swalNoti(data.title,data.text,data.icon,'Tải lại trang',function(noti){ if(noti) location.reload()})
                        },
                        function(err){

                        }
                    )
                }
            })
        })
        //xoa phi van chuyen
        $('#myTable').on('click','.delete-fee',function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            let name = $(this).attr('data-name');
            let url = "{{route('fee.delete')}}";
            let data = {id: id};
            swalInfo('Xóa phí vận chuyển!', `Bạn có muốn xóa phí vận chuyển trong khoảng cách ${name.toLocaleLowerCase()} km này không?`, function(alert){
                if(alert){
                    getAjax(url, data,
                        function(data){
                            swalNoti(data.title,data.text,data.icon,'Tải lại trang',function(noti){ if(noti) location.reload()})
                        },
                        function(err){

                        }
                    )
                }
            })
        })
        //xoa quang cao
        $('#myTable').on('click','.delete-banner',function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            let url = "{{route('banner.delete')}}";
            let data = {id: id};
            swalInfo('Xóa phí vận chuyển!', `Bạn có muốn xóa quảng cáo này không?`, function(alert){
                if(alert){
                    getAjax(url, data,
                        function(data){
                            swalNoti(data.title,data.text,data.icon,'Tải lại trang',function(noti){ if(noti) location.reload()})
                        },
                        function(err){

                        }
                    )
                }
            })
        })
    })
</script>
