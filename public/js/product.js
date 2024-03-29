try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

let Product = function ()
{
    init();

    function init() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {

            window.$(".category-checkbox").change(function() {
                if(this.checked) {
                } else {
                }
            });

            // Go to product page when clicked on it
            $(".product").on("click", function() {
                window.location.href = $(this).data("href");
            })

            $('.category-checkbox').on('change', function() {
                $('.category-checkbox').not(this).prop('checked', false);
            });

            $('.sub-category-checkbox').on('change', function() {
                $('.sub-category-checkbox').not(this).prop('checked', false);
            });

            // Counter
            $(".minus").click(function () {
                let input = $("#product_count");
                let count = parseInt(input.val()) - 1;

                count = count < 1 ? 1 : count;
                input.val(count);
                input.change();

                return false;
            });

            $(".plus").click(function () {
                let input = $("#product_count");
                
                input.val(parseInt(input.val()) + 1);
                input.change();

                return false;
            });

            // Sale Button
            $(".add-product-button").on("click", function () {

            });

        })
    }

}

let Cart = function ()
{
    initCart();

    function initCart() {

        $(document).ready(function () {

            // Sale Button
            $(".add-product-button").on("click", function () {

                $(".alert-bar").addClass("alert-bar-fade");
                $(".alert-bar span").html("Ürün Sepetinize Eklendi");

                setTimeout(function () {
                    $(".alert-bar").removeClass("alert-bar-fade");
                }, 3000);

                var id = $(this).data("id");

                let quantity = 1;

                if ($("#product_count")) {
                    quantity = $("#product_count").val();
                }

                $.ajax({
                    url: '/add-to-cart',
                    type: "POST",
                    data: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'id': id,
                        'quantity': quantity
                    },
                    success: function (response) {
                        //window.location.reload();
                    }
                });
            });

            $(".add-favorite").on("click", function () {

                var id = $(this).data("id");

                $.ajax({
                    url: '/favorilerim/favori-ekle',
                    type: "POST",
                    data: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'id': id,
                    },
                    success: function (response) {
                        $(".alert-bar").addClass("alert-bar-fade");
                        $(".alert-bar span").html("Ürün Favorilere Eklendi");
        
                        setTimeout(function () {
                            $(".alert-bar").removeClass("alert-bar-fade");
                        }, 3000);
                    },
                    error: function (response) {
                        $(".alert-bar").addClass("alert-bar-fade");
                        $(".alert-bar span").html("Ürün Favorilere Eklenemedi");
        
                        setTimeout(function () {
                            $(".alert-bar").removeClass("alert-bar-fade");
                        }, 3000);
                    }
                });
            })

            $(".remove-favorite").on("click", function () {

                var id = $(this).data("id");

                $.ajax({
                    url: '/favorilerim/favori-kaldır',
                    type: "POST",
                    data: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'id': id,
                    },
                    success: function (response) {
                        $(".alert-bar").addClass("alert-bar-fade");
                        $(".alert-bar span").html("Ürün Favorilerden Kaldırıldı");
        
                        setTimeout(function () {
                            $(".alert-bar").removeClass("alert-bar-fade");
                        }, 3000);
                    },
                    error: function (response) {
                    }
                });
            })

        });


    }
}

Product();
Cart();
