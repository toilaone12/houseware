<!-- Bootstrap core JavaScript-->
<script src="{{asset('be/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('be/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('be/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

{{-- Swal Alert 2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
<!-- AutoNumeric -->
<script src="//cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
<!-- CKEditor -->
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.5.1"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(request()->is('admin/fee/update') || request()->is('admin/fee/insert') || request()->is('admin/coupon/insert') || request()->is('admin/coupon/update') || request()->is('admin/product/insert') || request()->is('admin/product/update'))
    <script>
        //dinh dang so
        var priceAutoNumeric = new AutoNumeric('.price-autonumberic', {
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalPlaces: 0, // Adjust the number of decimal places as needed
            minimumValue: '0',
            maximumValue: '999999999999' // Set a very large number as the initial max value
        });
    </script>
@endif
@if (request()->is('admin/product/insert') || request()->is('admin/product/update'))
<script>
    CKEDITOR.replace('ckeditor');
    CKEDITOR.replace('ckeditor1');
    CKEDITOR.config.pasteFormWordPromptCleanup = true;
    CKEDITOR.config.pasteFormWordRemoveFontStyles = false;
    CKEDITOR.config.pasteFormWordRemoveStyles = false;
    CKEDITOR.config.language = 'vi';
    CKEDITOR.config.htmlEncodeOutput = false;
    CKEDITOR.config.ProcessHTMLEntities = false;
    CKEDITOR.config.entities = false;
    CKEDITOR.config.entities_latin = false;
    CKEDITOR.config.ForceSimpleAmpersand = true;
</script>
@endif
{{-- Datatable --}}
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('be/sb-admin-2.min.js')}}"></script>
<script src="{{asset('be/function.js')}}"></script>
<script src="{{asset('be/main.js')}}"></script>
<!-- Page level plugins -->
<!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

<!-- Page level custom scripts -->
<!-- <script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script> -->
<script>
    $(function(){
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
            swalInfo('Xóa quảng cáo!', `Bạn có muốn xóa quảng cáo này không?`, function(alert){
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
        //xoa ma giam gia
        $('#myTable').on('click','.delete-coupon',function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            let url = "{{route('coupon.delete')}}";
            let data = {id: id};
            swalInfo('Xóa mã giảm giá!', `Bạn có muốn xóa mã giảm giá này không?`, function(alert){
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
        //xoa san pham
        $('#myTable').on('click','.delete-product',function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            let name = $(this).attr('data-name');
            let url = "{{route('product.delete')}}";
            let data = {id: id};
            swalInfo('Xóa màu!', `Bạn có muốn xóa màu ${name} cho sản phẩm này không?`, function(alert){
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
        //xoa mau cua san pham
        $('#myTable').on('click','.delete-product-color',function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            let name = $(this).attr('data-name');
            let color = $(this).attr('data-color');
            let url = "{{route('product.deleteColor')}}";
            let data = {id: id, id_color: color};
            swalInfo('Xóa sản phẩm!', `Bạn có muốn xóa sản phẩm ${name} này không?`, function(alert){
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
        //sua anh
        $('#myTable').on('click','.choose-update-thumbnails',function(e){
            e.preventDefault();
            $(this).siblings('.update-thumbnails').click();
        })
        $('#myTable').off('change', '.update-thumbnails').on('change','.update-thumbnails',function(e){
            e.preventDefault();
            let formData = new FormData();
            let file = $(this)[0].files[0];
            let thumbnails = $(this).attr('data-thumbnails');
            let id = $(this).attr('data-id');
            let url = "{{route('product.updateThumbnails')}}";
            formData.append('id',id);
            formData.append('image-old',thumbnails);
            formData.append('image',file);
            postAjax(url, formData,
                function(data){
                    swalNoti(data.title,data.text,data.icon,'Tải lại trang',function(noti){ if(noti) location.reload()})
                },
                function(err){

                }
            ,'json',1)
        })
        //xoa anh cua san pham
        $('#myTable').on('click','.delete-thumbnails',function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            let thumbnails = $(this).attr('data-thumbnails');
            let url = "{{route('product.deleteThumbnails')}}";
            let data = {id: id, thumbnails: thumbnails};
            swalInfo('Xóa ảnh sản phẩm!', `Bạn có muốn xóa ảnh sản phẩm này không?`, function(alert){
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
        $(document).on('submit','.add-coupon-user',function(e){
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            let url = "{{route('coupon.addCouponUser')}}";
            postAjax(url, formData,
                function(data){
                    swalNoti(data.title,data.text,data.icon,'Tải lại trang',function(noti){ if(noti) location.reload()})
                },
                function(err){

                }
            ,'json',1)
        })
    })
</script>
