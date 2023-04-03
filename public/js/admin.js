var Admin = (function () {

    var Pages = new Pages()

    var Server = new Server()

    var Helpers = new Helpers()

    init()

    function init() {

        $(document).ready(function () {

            switch (location.pathname) {
                case "/panel/categories":
                    Pages.initCategories()

                case "/panel/sub-categories":
                    Pages.initSubCategories()
            }


        });
    }

    function Pages() {
        var that = this;

        that.initCategories = function () {
            
            init()

            function init() {

                $(document).ready(function() {

                    $(document).on('click', '.edit-category', function() {

                        var data = $(this).data("category");

                        $("input[name='category_id']").val(data["id"]);
                        $("#name").val(data["name"]);
                        $("#rating").val(data["rating"]);
                    });

                })
            }

        }

        that.initSubCategories = function () {
            
            init()

            function init() {

                $(document).ready(function() {

                    $(document).on('click', '.edit-category', function() {

                        var data = $(this).data("category");

                        $("input[name='category_id']").val(data["id"]);
                        $("#name").val(data["name"]);
                        $("#rating").val(data["rating"]);
                    });

                })
            }

        }
        
    }

});