try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

let Booking = function ()
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

            $("#indiviual_checkbox").change(function() {
                console.log($(this).is(':checked'));
                if ($(this).is(':checked')) {
                    $(".firm-informations").addClass('d-none');

                    $("input[name='billing[firm_name]']").prop('required', false);
                    $("input[name='billing[tax_authority]']").prop('required', false);
                    $("input[name='billing[tax_no]']").prop('required', false);
                }
            })


            $("#firm_checkbox").change(function() {
                console.log($(this).is(':checked'));
                if ($(this).is(':checked')) {
                    $(".firm-informations").removeClass('d-none');

                    $("input[name='billing[firm_name]']").prop('required', true);
                    $("input[name='billing[tax_authority]']").prop('required', true);
                    $("input[name='billing[tax_no]']").prop('required', true);
                }
            })

            // Check scroll height
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();

                if(scroll > 50){
                    $(".nav-bar .nav").addClass("fixed-navigation");
                    $(".alert-bar").addClass("alert-bar-scrolled");
                }
                else if(scroll < 50){
                    $(".nav-bar .nav").removeClass("fixed-navigation");
                    $(".alert-bar").removeClass("alert-bar-scrolled");
                }
                else if(scroll > 100){
                    alert("a");
                }

            });
        })
    }

}

Booking();
