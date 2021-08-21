try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

let Product = function ()
{
    init();

    function init() {
        $(document).ready(function () {

            window.$(".category-checkbox").change(function() {
                if(this.checked) {
                } else {
                }
            });

            $('.category-checkbox').on('change', function() {
                $('.category-checkbox').not(this).prop('checked', false);
            });

            $('.sub-category-checkbox').on('change', function() {
                $('.sub-category-checkbox').not(this).prop('checked', false);
            });

            $(".product").on("click", function () {
                
            })
        })
    }

}



Product();
