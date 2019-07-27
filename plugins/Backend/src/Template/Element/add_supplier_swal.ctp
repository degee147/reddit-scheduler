<script>
    function addsupplier(data) {


        if (!$.isEmptyObject(data)) {
            showLoading();

            $.post(
                "<?=$this->Url->build(['prefix' => false, 'controller' => 'GeneralActions', 'action' => 'addSupplier']);?>", {
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
                        showaddsupplier(response);
                    });

                } else {

                    swal("Good job!", "You added a new supplier!", "success");
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

    function showaddsupplier(response) {


        var jc = $.confirm({
            //lazyOpen: true,
            type: "dark",
            animation: "scale",
            //icon: '<i class="material-icons">info</i>',
            theme: "modern",
            closeAnimation: "left",
            animateFromElement: false,
            title: 'New Supplier',
            content: `<form action="" class="formName"><?php echo $this->element('supplier_form') ?></form>`,
            columnClass: 'col-md-8', //offset-md-4
            // content: '' +
            //     '<form action="" class="formName">' +
            //     '<div class="form-group">' +
            //     '<label>Email</label>' +
            //     '<input type="email" name="email" class="email form-control" required />' +
            //     '</div>' +
            //     '<div class="form-group">' +
            //     '<label>First Name</label>' +
            //     '<input type="text" name="firstname" class="firstname form-control" maxlength="10"  required />' +
            //     '</div>' +
            //     '<div class="form-group">' +
            //     '<label>Last Name</label>' +
            //     '<input type="text" name="lastname" class="lastname form-control" maxlength="10"  required />' +
            //     '</div>' +
            //     '</form>',
            buttons: {
                formSubmit: {
                    text: 'Save',
                    btnClass: 'btn-primary',
                    action: function () {
                        var name = this.$content.find('.name').val();
                        var address = this.$content.find('.address').val();
                        var phone = this.$content.find('.phone').val();
                        if (!name) {
                            $.alert('Please enter a name');
                            return false;
                        }
                        if (!address) {
                            $.alert('Please enter the supplier\'s address');
                            return false;
                        }
                        if (!phone) {
                            $.alert('Please enter a phone number');
                            return false;
                        }
                        var data = {
                            name: name,
                            address: address,
                            phone: phone,
                        }
                        addsupplier(data);

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
                        this.$content.find('.description').val(response.data.description);
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
            if (type === 'add-supplier') {
                showaddsupplier();
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
