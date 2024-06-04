(function ($) {
    "use strict"

    // Mobile Nav toggle
    $('.menu-toggle > a').on('click', function (e) {
        e.preventDefault();
        $('#responsive-nav').toggleClass('active');
    })

    // Fix cart dropdown from closing
    $('.cart-dropdown').on('click', function (e) {
        e.stopPropagation();
    });

    /////////////////////////////////////////

    // Products Slick
    $('.products-slick').each(function () {
        var $this = $(this),
            $nav = $this.attr('data-nav');

        $this.slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            // autoplay: true,
            // infinite: true,
            // speed: 1000,
            dots: false,
            arrows: true,
            appendArrows: $nav ? $nav : false,
            responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            ]
        });
    });

    // Products Widget Slick
    $('.products-widget-slick').each(function () {
        var $this = $(this),
            $nav = $this.attr('data-nav');

        $this.slick({
            infinite: true,
            autoplay: true,
            speed: 300,
            dots: false,
            arrows: true,
            appendArrows: $nav ? $nav : false,
        });
    });

    /////////////////////////////////////////

    // Product Main img Slick
    $('#product-main-img').slick({
        infinite: true,
        speed: 300,
        dots: false,
        arrows: true,
        fade: true,
        asNavFor: '#product-imgs',
    });

    // Product imgs Slick
    $('#product-imgs').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        centerMode: true,
        focusOnSelect: true,
        centerPadding: 0,
        vertical: true,
        asNavFor: '#product-main-img',
        responsive: [{
            breakpoint: 991,
            settings: {
                vertical: false,
                arrows: false,
                dots: true,
            }
        },
        ]
    });

    // Product img zoom
    var zoomMainProduct = document.getElementById('product-main-img');
    if (zoomMainProduct) {
        $('#product-main-img .product-preview').zoom();
    }

    /////////////////////////////////////////

    // Input number
    $('.input-number').each(function () {
        var $this = $(this),
            $input = $this.find('input[type="number"]'),
            up = $this.find('.qty-up'),
            down = $this.find('.qty-down');

        down.on('click', function () {
            var value = parseInt($input.val()) - 100000;
            value = value < 1 ? 1 : value;
            $input.val(value);
            $input.change();
            updatePriceSlider($this, value)
        })

        up.on('click', function () {
            var value = parseInt($input.val()) + 100000;
            $input.val(value);
            $input.change();
            updatePriceSlider($this, value)
        })
    });

    var priceInputMax = document.getElementById('price-max'),
        priceInputMin = document.getElementById('price-min');
    var priceSlider = document.getElementById('price-slider');

    if(priceInputMax){
        priceInputMax.addEventListener('change', function () {
            updatePriceSlider($(this).parent(), this.value)
        });
    }

    if(priceInputMin){
        priceInputMin.addEventListener('change', function () {
            updatePriceSlider($(this).parent(), this.value)
        });
    }

    function updatePriceSlider(elem, value) {
        if (elem.hasClass('price-min')) {
            priceSlider.noUiSlider.set([value, null]);
        } else if (elem.hasClass('price-max')) {
            priceSlider.noUiSlider.set([null, value]);
        }
    }

    // Price Slider
    if (priceSlider) {
        noUiSlider.create(priceSlider, {
            start: [0, 100000000],
            connect: true,
            step: 100000,
            range: {
                'min': 0,
                'max': 100000000
            },

        });

        priceSlider.noUiSlider.on('update', function (values, handle) {
            var value = values[handle];
            handle ? priceInputMax.value = value : priceInputMin.value = value
        });
    }
    //tang ngay va gio
    function updateTime() {
        const now = new Date();

        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');

        $('.hours').text(hours);
        $('.mins').text(minutes);
        $('.seconds').text(seconds);
    }

    setInterval(updateTime, 1000);
    updateTime(); // Gọi ngay lập tức để hiển thị thời gian ngay khi tải trang

})(jQuery);
