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
        })
    }

}



Product();
