<script>
    toastr.options = {
        "closeButton": false,
        "escapeHtml": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "10000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    function showLoading() {
        $.blockUI({
            message: '<h5><img src="<?=$this->Url->build("/", true);?>busy.gif" /> Just a moment...</h5>',
            css: {
                'border-radius': '20px'
            }
        });
    }

    function hideLoading() {
        $.unblockUI();
    }





    function jsNumberFormat(n) {
        //var n = 100000;
        var value = n.toLocaleString(
            undefined, // leave undefined to use the browser's locale,
            // or use a string like 'en-US' to override it.
            {
                minimumFractionDigits: 0
            }
        );
        // console.log(value);
        return value
    }



    $(document).ready(function () {

        // $(".datepicker").datepicker({
        //     format: 'yyyy/mm/dd',
        // });


        $('.select2').select2({
            placeholder: 'Pick an option',
            theme: "classic"
        });
        
        $('.select2_all').select2({
            placeholder: 'All',
            theme: "classic"
        });

        $('.select2_multiple').select2({
            theme: "classic",
            placeholder: "select one or more options",
            allowClear: true,
            maximumSelectionLength: 7,
        });



        // $('.lazy').Lazy();

        jQuery(document).on('change', '#limitBox', function (e) {
            var parentForm = $(this).closest("form");
            parentForm.submit();

        });

        jQuery(document).on('change', '#activeCountrySelect', function (e) {

            var parentForm = $(this).closest("form");
            parentForm.submit();

        });




    });

</script>
