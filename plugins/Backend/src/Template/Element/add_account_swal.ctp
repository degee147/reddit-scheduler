<script>
    function addAccount(data) {


        if (!$.isEmptyObject(data)) {
            showLoading();

            $.post(
                "<?=$this->Url->build(['prefix' => false, 'controller' => 'Posts', 'action' => 'addAccount']);?>", {
                    "data": data,
                }).done(function (response) {
                //console.log(response);
                if (response.error) {
                    swal({
                        title: "Oops!",
                        text: response.message,
                        type: "error",
                        confirmButtonText: "Ok",
                    }, function () {
                        showAddAccount(response);
                    });

                } else {

                    swal("Good job!", "You added a new reddit account!", "success");
                    console.log(response);
                    var newOption = new Option(response.supplier.name, response.supplier.id, true, true);
                    $('#<?=$select_id?>').append(newOption).trigger('change');
                }

                hideLoading();

                //$.unblockUI();
            }).fail(function (e) {
                console.log(e);
                hideLoading();
            });
        }
    }

    function showAddAccount(response = null) {


        var jc = $.confirm({
            //lazyOpen: true,
            type: "dark",
            animation: "scale",
            //icon: '<i class="material-icons">info</i>',
            theme: "modern",
            closeAnimation: "left",
            animateFromElement: false,
            title: 'New reddit account to post with',
            content: `<form action="" class="formName"><?php echo $this->element('account_form') ?></form>`,
            columnClass: 'col-md-8', //offset-md-4
            buttons: {
                formSubmit: {
                    text: 'Save',
                    btnClass: 'btn-primary',
                    action: function () {
                        var username = this.$content.find('.username').val();
                        var password = this.$content.find('.password').val();
                        if (!username) {
                            $.alert('Please enter a username');
                            return false;
                        }
                        if (!password) {
                            $.alert('Please enter a password for this account');
                            return false;
                        }
                        var data = {
                            username: username,
                            password: password,
                        }
                        addAccount(data);

                    }
                },
                cancel: function () {
                    //close
                },
            },
            onContentReady: function () {
                if (response !== undefined) {
                    if (response.data) {
                        this.$content.find('.username').val(response.data.username);
                        this.$content.find('.password').val(response.data.password);
                    }
                }

                // bind to events
                var jc = this;
                this.$content.find('form').on('submit', function (e) {
                    // if the user submits the form by pressing enter in the field.
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click'); // reference the button and click it
                });

                //  $(".selectpicker2").selectpicker();



            }
        });



    }

    jQuery(document).ready(function () {

        $('.swal').on('click', function () {
            var type = $(this).data('type');
            if (type === 'add-account') {
                showAddAccount();
            }

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
