<script>
    function addAccount(data) {


        if (!$.isEmptyObject(data)) {
            showLoading();

            $.post(
                "<?=$this->Url->build(['prefix' => false, 'controller' => 'Posts', 'action' => 'addAccount']);?>", {
                    "data": data,
                    "_csrfToken": "<?=$this->request->getParam('_csrfToken')?>"
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
                    var newOption = new Option(response.account.name, response.account.id, true, true);
                    $('#<?=$select_id?>').append(newOption).trigger('change');
                    console.log(response);
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
                        var name = this.$content.find('.name').val();
                        var password = this.$content.find('.password').val();
                        var clientid = this.$content.find('.clientid').val();
                        var client_secret = this.$content.find('.client_secret').val();
                        if (!name) {
                            $.alert('Please enter a name for this account');
                            return false;
                        }
                        if (!password) {
                            $.alert('Please enter the password for this account');
                            return false;
                        }
                        if (!clientid) {
                            $.alert('Please enter the client id');
                            return false;
                        }
                        if (!client_secret) {
                            $.alert('Please enter the client secret');
                            return false;
                        }
                        var data = {
                            name: name,
                            password: password,
                            clientid: clientid,
                            client_secret: client_secret,
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
                        this.$content.find('.name').val(response.data.name);
                        this.$content.find('.password').val(response.data.password);
                        this.$content.find('.clientid').val(response.data.clientid);
                        this.$content.find('.client_secret').val(response.data.client_secret);
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
