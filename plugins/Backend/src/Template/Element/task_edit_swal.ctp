<script>
    $(document).ready(function () {

        $('#<?=$select_id?>').on('click', function () {
            swal({
                title: 'Submit email to run ajax request',
                input: 'email',
                showCancelButton: true,
                confirmButtonText: 'Submit',
                showLoaderOnConfirm: true,
                preConfirm: function () {
                    return new Promise(function (resolve) {
                        setTimeout(function () {
                            resolve();
                        }, 2000);
                    });
                },
                allowOutsideClick: false
            }).then(function (email) {
                if (email) {
                    swal({
                        type: 'success',
                        title: 'Ajax request finished!',
                        html: 'Submitted email: ' + email
                    });
                }
            })
        });


    });

</script>
