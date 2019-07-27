<table class="table table-striped table-bordered server-side file-export" id="<?=$tableid?>">
    <thead>
        <tr>
            <th>S/N</th>
            <th>Image</th>
            <th width="30%">Item</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot>
        <tr>
            <th>S/N</th>
            <th>Image</th>
            <th width="30%">Item</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>

<?=$this->element('datatable_options', ["record_name" => 'items', "record_count" => count($cart->sales), 'specific_id' => $tableid, "ajax_table" => true, "ordering" => false, "paging" => false, "autoreload" => true, "searching" => false, "ajax_url" => $this->Url->build(['prefix' => false, 'controller' => 'GeneralActions', 'action' => 'getCartItemsAjaxDatatable', $cart->id])])?>
<script>
    function reloadCartTable() {
        $.post(
            '<?=$this->Url->build(["prefix" => false, "controller" => "GeneralActions", "action" => "getCartTotal", $cart->id]);?>'
        ).done(function (response) {
            // var response = JSON.parse(response);
            <?=$tableid."_table"?>.ajax.reload(null, false);
            // console.log(response);
            if (response.success) {
                $('#customer_cart_total').html("&#8358;" + jsNumberFormat(response.cart_total));

            }
        });
    }

    $(document).ready(function () {

        setInterval(function () {
            reloadCartTable();
        }, 30000);




        $(document).on("change", ".add_quantity", function () {
            // var quantity = $('select[name^="' + $(this).attr("name") + '"]').val();
            var quantity = $('input[name^="' + $(this).attr("name") + '"]').val();
            var itemid = $(this).attr("itemid");
            $.post(
                '<?=$this->Url->build(["prefix" => false, "controller" => "GeneralActions", "action" => "updateQuantityAjax", $cart->id]);?>', {
                    'quantity': quantity,
                    'itemid': itemid,
                }).done(function (response) {
                // var response = JSON.parse(response);
                if (response.success) {
                    if (response.info) {
                        toastr.info(response.message);
                    } else {
                        toastr.success(response.message);
                    }
                } else {
                    toastr.error(response.message);
                }
                reloadCartTable();

            }).fail(function (e) {
                console.log(e);
            });;
        });

        $(document).on('click', '.remove_item_from_cart', function (e) {
            e.preventDefault();

            var itemid = $(this).attr("itemid");

            var r = confirm("Are you sure?");
            if (r == true) {
                $.post(
                    '<?=$this->Url->build(["prefix" => false, "controller" => "GeneralActions", "action" => "removeItemFromCart", $cart->id]);?>', {
                        "itemid": itemid,
                    }).done(function (response) {
                    console.log(response);
                    if (response.success) {
                        if (response.info) {
                            toastr.info(response.message);
                        } else {
                            toastr.success(response.message);
                        }
                    } else {
                        toastr.error(response.message);
                    }
                    reloadCartTable();
                }).fail(function () {

                });
            }





        });





        /**************************************
         *       Server-side processing        *
         **************************************/

        // $('.server-side').DataTable( {
        //     "processing": true,
        //     "serverSide": true,
        //     "buttons": [
        //             'copy', 'csv', 'excel', 'pdf', 'print'
        //         ],
        //     //"ajax": "../server_side/scripts/server_processing.php" NOTE: use serverside script to fatch the data
        //     //"ajax": "../app-assets/data/datatables/server-side.json"
        //     "ajax": "<?=$this->Url->build(['prefix' => false, 'controller' => 'Items', 'action' => 'getItemsAjaxDatatable']);?>"
        // } );



    });

</script>
