try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

let Common = function ()
{
    init();

    function init() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {

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

            if (window.location.pathname.split('/')[1] == "categories") {
                $(".footer-clean").addClass("footer-fixed");
            }

            // Go to product page when clicked on it
            $(".product").on("click", function() {
                window.location.href = $(this).data("href");
            })

            if (typeof $("#success-modal") !== "undefined") {
                //$("#success-modal").modal();
            }

            if (typeof $("#error-modal") !== "undefined") {
                //$("#error-modal").modal();
            }

            // Review star
            $(".review-star").on("click", function () {
                var rating = $(this).data("rating");

                if (typeof $("input[name='rating']") !== 'undefined') {
                    $("input[name='rating']").val(rating);
                }
            });
           
        })
    }

}

Common();
