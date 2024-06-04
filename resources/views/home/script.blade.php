<script src="{{asset('be/function.js')}}"></script>
<script src="{{asset('fe/js/jquery.min.js')}}"></script>
<script src="{{asset('fe/js/bootstrap.min.js')}}"></script>
<script src="{{asset('fe/js/slick.min.js')}}"></script>
<script src="{{asset('fe/js/nouislider.min.js')}}"></script>
<script src="{{asset('fe/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('fe/js/main.js')}}"></script>
<script>
    $(function(){
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
            let url = "{{route('category.home')}}";
            location.href = url+'?id='+id+'&'+filter+'=1';
        })
    })
</script>
