<div class="modal-dialog" role="document" style="width: 500px;">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Chọn mã giảm giá</h5>
        </div>
        <form class="add-coupon-user">
            @csrf
            <input type="hidden" name="id" value="{{$id}}">
            <div class="modal-body">
                <select class="form-select" name="coupon" aria-label="Default select example">
                    @foreach ($coupons as $coupon)
                        <option value="{{ $coupon->id_coupon }}">{{ $coupon->code }}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Thêm mã</button>
            </div>
        </form>
    </div>
</div>
