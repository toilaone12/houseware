<div class="modal-dialog" role="document" style="width: 300px;">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Chọn màu</h5>
        </div>
        @php
            use App\Models\Color;
        @endphp
        <div class="modal-body">
            @foreach ($colorPath as $path)
                @php
                    $color = Color::find($path['id_color']);
                @endphp
                <div class="form-check">
                    <input class="form-check-input choose-color" value="{{$path['id_color']}}" type="radio" name="flexRadioDefault" id="flexRadioDefault{{$path['id_color']}}">
                    <label class="form-check-label" for="flexRadioDefault{{$path['id_color']}}">
                        {{$color->name}}
                    </label>
                </div>
            @endforeach
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button class="btn btn-primary add-cart" data-id="{{$id}}" data-color="">Thêm vào giỏ hàng</button>
        </div>
    </div>
</div>
