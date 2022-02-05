let Cart = function () {

    init();
    
    function init() {

        console.log("init cart")

        $(document).ready(function () {

            $(".cart-counter-button").on("click", function () {

                var type = $(this).data("type");
                var product_id = $(this).data("product-id");

                var counter = $(".product_count [data-product-id='"+ product_id +"']");

                if (type == "plus") {
                    counter.val(parseInt(counter.val() + 1))
                } else {
                    counter.val(parseInt(counter.val() - 1))
                }
            })

            $(".removeProduct").on("click", function () {

                var productId = $(this).data("product-id");

                $.ajax({
                    url: '/remove-from-cart',
                    type: "POST",
                    data: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'id': productId
                    },
                    success: function (response) {

                        $(".removeProduct[data-product-id='"+ productId +"']").parents(".cart-product").remove()

                        if (response["quantity"] == 0) {
                            $(".cart-products").remove();
                            $(".cart-payment").remove();
                            
                            var div = '<div class="col-lg-12 col-12"><h4 class="color-primary">'+ 'Sepetinizde herhangi bir ürün bulunmamaktadır' +'</h4></div>';

                            $("#cart-section").html(div);
                        }
                    }
                });
            })

        })

    }

    
}()