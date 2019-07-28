<script>
    function addSubReddit(data) {


        if (!$.isEmptyObject(data)) {
            // $('.page-loader-wrapper').fadeIn();
            $.post(
                "<?=$this->Url->build(['prefix' => false, 'controller' => 'Posts', 'action' => 'addSubReddit']);?>", {
                    "data": data,
                    "_csrfToken": "<?=$this->request->getParam('_csrfToken')?>"
                }).done(function (response) {
                if (response.success) {
                    swal("Success", "Done!", "success");
                    var newOption = new Option(response.subreddit.name, response.subreddit.id, true, true);
                    $('#<?=$select_id?>').append(newOption).trigger('change');
                    console.log(response);
                } else {
                    swal({
                        title: "Oops!",
                        text: response.message,
                        type: "error",
                        confirmButtonText: "Ok",
                    }, function () {
                        showAddSubreddit(data);
                    });

                }

            }).fail(function (e) {
                console.log(e);
                // $('.page-loader-wrapper').fadeOut();
            });
        }
    }

    function showAddSubreddit(data = {}) { //data is key and model
        swal({
            title: "Subreddit Title",
            // text: "<textarea id='reasontext'></textarea>",
            // html: true,
            text: "Keep it short and simple",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            animation: "slide-from-top",
            inputPlaceholder: "Write something"
        }, function (inputValue) {
            if (inputValue === false) return false;
            if (inputValue === "") {
                swal.showInputError("You need to write something!");
                return false
            }
            data.name = inputValue;
            addSubReddit(data);
        });


    }

    jQuery(document).ready(function () {

        $('.add_subreddit').on('click', function () {
            showAddSubreddit();
        });


        // $('.deptselect2').select2({
        //     placeholder: 'Select an option',
        //     theme: "classic",
        //     // theme: "bootstrap4"
        //     language: {
        //         noResults: function (params) {
        //             return "No departments found";
        //         }
        //     }
        // });




    });

</script>
