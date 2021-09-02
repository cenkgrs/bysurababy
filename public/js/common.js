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
        })
    }

}

Common();
